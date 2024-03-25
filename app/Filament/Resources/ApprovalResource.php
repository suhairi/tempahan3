<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApprovalResource\Pages;
use App\Filament\Resources\ApprovalResource\RelationManagers;
use App\Mail\BookingApproved;
use App\Mail\VehicleBooked;
use App\Models\Approval;
use App\Models\User;
use App\Models\Vehiclebooking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ApprovalResource extends Resource
{
    protected static ?string $model = Approval::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Forms Management';

    public static function getEloquentQuery(): Builder
    {
        if(Auth::user()->hasRole('Super Admin'))
            return parent::getEloquentQuery();
        
        return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Approver')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('vehiclebooking.name')
                    ->label('Applicant'),
                TextColumn::make('vehiclebooking.driver.name')
                    ->label('Driver'),
                TextColumn::make('vehiclebooking.start_date')
                    ->label('Start Date')
                    ->date('d-m-Y'),
                TextColumn::make('vehiclebooking.end_date')
                    ->label('End Date')
                    ->date('d-m-Y'),
                TextColumn::make('vehiclebooking.destination')
                    ->label('Destination'),
                ToggleColumn::make('status')
                    ->label('Approved')
                    ->beforeStateUpdated(function($record, $state) {
                        if($state == true)
                        {
                            Notification::make()
                                ->warning()
                                ->title('Message : ')
                                ->body('Approved Booking from approver cannot be reverse. The system is on the way to notify admin that
                                        this booking has been approved.')
                                ->send();
                            $vBooking = Vehiclebooking::where('approval_id', $record->id)->first();
                            $vBooking->progress = 'Approved';
                            $vBooking->save();
                        }
                    })->disabled(fn($record) => $record->status)
                    ->afterStateUpdated(function(Approval $record) {
                        // $admins = User::whereHas('roles', fn($q) => $q->where('name', 'Admin'))->get();
                        $admins = User::find(1);

                        Mail::to($admins)
                            ->queue(new BookingApproved($record->vehiclebooking));
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApprovals::route('/'),
            // 'create' => Pages\CreateApproval::route('/create'),
            'edit' => Pages\EditApproval::route('/{record}/edit'),
        ];
    }
}

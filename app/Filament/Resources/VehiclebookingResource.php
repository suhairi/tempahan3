<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehiclebookingResource\Pages;
use App\Filament\Resources\VehiclebookingResource\RelationManagers;
use App\Models\Staff;
use App\Models\User;
use App\Models\Vehiclebooking;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use PHPUnit\TestRunner\TestResult\Collector;

class VehiclebookingResource extends Resource
{
    protected static ?string $model = Vehiclebooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Vehicle Booking Form';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('1 - Applicant Info')
                ->description('')
                ->collapsible(true)
                ->schema([
                    Forms\Components\Select::make('name')
                        ->label('Applicant Name')
                        ->required()
                        ->options(Staff::query()->orderBy('nama', 'asc')->pluck('nama', 'nama'))
                        ->searchable()
                        ->preload()
                        ->live()
                        ->afterStateUpdated(function($state, $set){
                            if(!empty($state))
                            {
                                $staff = Staff::where('nama', $state)->first();
                                $set('staffid', $staff->staff_id);
                            } else
                                $set('staffid', '');
                        })->columnSpanFull(),
                ])->columns(2),

                Section::make('2 - Event Info')
                ->description('')
                ->collapsible(true)
                ->schema([
                    Section::make('Date and Time')
                        ->schema([
                            DateTimePicker::make('start_date')
                                ->minDate(now()->addDay()->subHour(2))
                                ->required(),
                        ])->columns(2),
                        Section::make('Event Date & Destination')
                        ->schema([
                            Select::make('destination')
                                ->options([
                                    'MADA' => 'Dalam Kawasan MADA',
                                    'Kuala Lumpur' => 'Kuala Lumpur',
                                    'Penang'    => 'Penang',
                                    'Perak'     => 'Perak',
                                    'Selangor'  => 'Selangor',
                                ])->columnSpanFull(),
                            DatePicker::make('start_event_date')
                                ->label('Event Start Date')
                                ->afterOrEqual('start_date')
                                ->required(),
                            DatePicker::make('end_date')
                                ->label('Event End Date')
                                ->afterOrEqual('start_event_date')
                                ->required(),
                            ])->columns(3),                    
                ])->columns(3),

                Section::make('3 - Supporting Document')
                ->description('Compulsory to upload for event outside of MADA')
                ->collapsible(true)
                ->schema([
                    FileUpload::make('attachment')
                        ->acceptedFileTypes(['application/pdf'])
                        ->downloadable(),
                ]),
                Section::make('4 - Vehicle and Driver Info')
                ->description('Prevent abuse by limiting the number of requests per period')
                ->collapsible()
                ->schema([
                    Select::make('approver_id')
                        ->label('Approver Name')
                        ->required()
                        ->options(
                            User::whereHas('roles', function($q){ $q->where('name', 'Approver');})->pluck('name', 'id')
                        )
                        ->searchable()
                        ->preload(),                    
                    Select::make('driver_id')
                        ->label('Requesting Driver...')
                        ->relationship('driver', 'name', fn(Builder $query) => $query->where('type', 'Bebas')->orderBy('name', 'asc'))
                        ->searchable()
                        ->preload()
                        ->required(),                 
                    Select::make('cartype_id')
                        ->label('Request Vehicle Type')
                        ->relationship('cartype', 'name', fn(Builder $query) => $query->orderBy('id', 'asc'))
                        ->required(),                   
                ])->columns(2),


                Section::make('5 - Passenger Info')
                    ->description('Prevent abuse by limiting the number of requests per period')
                    ->collapsible()
                    ->schema([
                        Repeater::make('passengers')
                            ->label('Passenger Info')
                            ->schema([
                                Select::make('passenger_name')
                                    ->options(
                                        fn(Get $get): Collection 
                                            => Staff::query()
                                                ->where('nama', '!=', $get('name'))
                                                ->where('status_code', 1)
                                                ->orderBy('nama', 'asc')
                                                ->pluck('nama', 'nama'))
                                    ->searchable()
                                    ->preload(),

                            ]),
                    ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                BadgeColumn::make('progress')
                    ->color(static function($state): string {
                        if($state == 'New')
                            return 'success';
                        else    
                            return 'primary';
                    })
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Applicant Name')
                    ->searchable(),
                TextColumn::make('staffid')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('start_date')
                    ->dateTime('d-m-Y H:i')
                    ->sortable(),
                TextColumn::make('start_event_date')
                    ->date('d-m-Y')
                    ->sortable(),
                TextColumn::make('end_date')
                    ->date('d-m-Y')
                    ->sortable(),
                TextColumn::make('attachment')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                TextColumn::make('user.name')
                    ->label('Clerk Name')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('cartype.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('approval name')
                    ->state(function(Vehiclebooking $record, User $user) {
                        $user = $user->find($record->approval->user_id);
                        return $user->name;
                    })
                    ->sortable(),
                TextColumn::make('driver.name')
                    ->sortable(),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListVehiclebookings::route('/'),
            'create' => Pages\CreateVehiclebooking::route('/create'),
            'edit' => Pages\EditVehiclebooking::route('/{record}/edit'),
        ];
    }
}

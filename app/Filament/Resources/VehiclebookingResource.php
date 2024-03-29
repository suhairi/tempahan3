<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehiclebookingResource\Pages;
use App\Filament\Resources\VehiclebookingResource\RelationManagers;
use App\Models\Staff;
use App\Models\User;
use App\Models\Vehiclebooking;
use Carbon\Carbon;
use Carbon\CarbonInterface;
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
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TestRunner\TestResult\Collector;

use Illuminate\Support\Str;

class VehiclebookingResource extends Resource
{
    protected static ?string $model = Vehiclebooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Vehicle Booking Form';
    protected static ?string $navigationGroup = 'Forms Management';

    protected static ?string $label = 'Vehicle Booking Form';

    public function getHeading(): string
    {
        return 'Vehicle Booking List';
    }

    public static function getEloquentQuery(): Builder
    {
        if(Auth::user()->hasRole('Clerk'))
            return parent::getEloquentQuery()->where('clerk_id', auth()->user()->id);

        return parent::getEloquentQuery();
    }

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
                        ->disabled(fn(Page $livewire) => $livewire instanceof EditRecord)
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
                    Section::make('Date and Time of Vehicle Required')
                        ->schema([
                            DateTimePicker::make('start_date')
                                ->minDate(now())
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
                                ])
                                ->required()
                                ->columnSpanFull(),
                            DateTimePicker::make('start_event_date')
                                ->label('Event Start Date')
                                ->minDate(now())
                                ->afterOrEqual('start_date')
                                ->required(),
                            DateTimePicker::make('end_date')
                                ->label('Event End Date')
                                ->minDate(now())
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
                        ->downloadable()
                        ->requiredIf('destination', 'Kuala Lumpur'),
                ]),

                Section::make('4 - Vehicle and Driver Info')
                ->description('Prevent abuse by limiting the number of requests per period')
                ->collapsible()
                ->schema([
                    Select::make('approver_id')
                        ->label('Approver Name')
                        ->required()
                        ->disabled(fn(Page $livewire) => $livewire instanceof EditRecord)
                        // ->relationship('approver', 'name')
                        ->options(function() {
                            return User::whereHas('roles', fn($q) => $q->where('name', 'Approver'))->pluck('name', 'id');
                        })
                        ->searchable()
                        ->preload(),                    
                    Select::make('driver_id')
                        ->label(fn(Page $livewire) => $livewire instanceof EditRecord ? '**Requesting Driver' : 'Requesting Driver')
                        ->relationship('driver', 'name', fn(Builder $query) => $query->where('type', 'Bebas')->orderBy('name', 'asc'))
                        ->searchable()
                        ->preload()
                        ->required(),                 
                    Select::make('cartype_id')
                        ->label(fn(Page $livewire) => $livewire instanceof EditRecord ? '**Requesting Vehicle Type' : 'Requesting Vehicle Type')
                        ->relationship('cartype', 'name', fn(Builder $query) => $query->orderBy('id', 'asc'))
                        ->default(1)
                        ->required(),                   
                ])->columns(2),

                Section::make('5 - Passenger Info')
                    ->description('Prevent abuse by limiting the number of requests per period')
                    ->collapsible()
                    ->schema([
                        Repeater::make('passengers')
                            ->label('Passenger Info')
                            ->schema([
                                Select::make('passengers')
                                    ->relationship('passengers.staff', 'nama')
                                    ->searchable()
                                    ->preload(),
                        ])->maxItems(3),
                    ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                BadgeColumn::make('progress')
                    ->color(function($state): string {
                        if($state == 'New')
                            return 'success';
                        else if($state == 'Approved')
                            return 'primary';
                        else
                            return 'gray';
                    })
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Applicant Name')
                    ->state(fn($record) => Str::of($record->name)->take(12)->append('...'))
                    ->searchable(),
                TextColumn::make('staffid')
                    ->label('Staff ID')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('start_date')
                    ->dateTime('d-m-Y H:i')
                    ->sortable(),
                TextColumn::make('start_event_date')
                    ->date('d-m-Y')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('end_date')
                    ->date('d-m-Y')
                    ->sortable(),
                TextColumn::make('attachment')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),                
                TextColumn::make('user.name')
                    ->label('Clerk Name')
                    ->state(fn($record) => Str::of($record->user->name)->take(12)->append('...'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('cartype.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('approval name')
                    ->label('Approval Name')
                    ->state(function(Vehiclebooking $record, User $user) {
                        $user = $user->find($record->approval->user_id);
                        return Str::of($user->name)->take(12)->append('...');
                    })
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('driver.name')
                    ->state(fn($record) => Str::of(strtoupper($record->driver->name))->take(15)->append('...'))
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
                // Tables\Actions\DeleteAction::make(),
                Action::make('PDF')
                    ->label('Download')
                    ->color('info')
                    ->icon('heroicon-o-document-arrow-down')
                    ->url(fn(Vehiclebooking $record) => route('pdf.bookings.vehicle.index', $record->id))
                    ->openUrlInNewTab(),
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

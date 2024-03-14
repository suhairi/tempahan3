<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehiclebookingResource\Pages;
use App\Filament\Resources\VehiclebookingResource\RelationManagers;
use App\Models\Role;
use App\Models\Staff;
use App\Models\User;
use App\Models\Vehiclebooking;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VehiclebookingResource extends Resource
{
    protected static ?string $model = Vehiclebooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Vehicle Form';
    protected static ?string $pluralModelLabel = 'Vehicle Form';

    protected static ?string $navigationGroup = 'Booking Forms';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Wizard::make([
                    Wizard\Step::make('Applicant Info')
                        ->schema([
                            Select::make('name')
                                ->options(Staff::all()->pluck('nama', 'nama'))
                                ->required()
                                ->searchable()
                                ->preload()
                                ->required()
                                ->live()
                                ->afterStateUpdated(function($state, $get, $set) {
                                    $staff = Staff::where('nama', '=', $state)->first();
                                    $set('staffid', $staff->staff_id);
                                }),
                            TextInput::make('staffid')
                                // ->hidden()
                                ->maxLength(8),
                            TextInput::make('user_id')
                                ->default(auth()->user()->id)
                                ->required()
                                ->hidden()
                                ->maxLength(8),
                             
                        ]),
                    Wizard\Step::make('Schedule Details')
                        ->schema([
                            Section::make('Event Document')
                                ->description('This document is compulsory to upload if the event take place outside of MADA territories.')
                                ->aside()
                                ->schema([
                                    FileUpload::make('attachment')
                                        ->downloadable()
                                        ->acceptedFileTypes(['application/pdf'])
                                        ->maxSize(1000)
                                        ->columnSpanFull(),
                                ]),
                            Section::make('Date And Time Request For The Vehicle')
                                ->description('The date and time to start using the vehicle.')
                                ->aside()
                                ->schema([
                                    DateTimePicker::make('start_date')
                                        ->label('Start Date')
                                        ->after('today')
                                        ->required()
                                        ->columnSpanFull(),
                                ]),
                            Section::make('Events Related Date')
                                ->description('The event start and end date.')
                                ->aside()
                                ->schema([
                                    DatePicker::make('start_event_date')                                        
                                        ->label('Event Start Date')
                                        ->after('start_date')
                                        ->required(),
                                    DatePicker::make('end_date')
                                        ->label('Event End Date')
                                        ->afterOrEqual('start_event_date')
                                        ->required(),
                                ]),                            
                        ])->columns(2),
                    Wizard\Step::make('Approval Info')
                        ->schema([
                            Select::make('approval name')
                                ->label('The Applicant Supervisor.')
                                ->relationship('approval.user', 'name')
                                ->live()
                                ->afterStateUpdated(function($state, $set, $get) {
                                    $set('approver_id', $state);
                                })
                                ->searchable()
                                ->preload()
                                ->required(),
                            TextInput::make('approver_id')
                                ->hidden(),
                        ]),
                    Wizard\Step::make('Vehicle And Driver')
                        ->schema([
                            Select::make('cartype_id')
                                ->label('Car Type Request')
                                ->relationship('cartype', 'name')
                                ->required(),
                            
                            Select::make('driver_id')
                                ->label('Driver to Request')
                                ->relationship('driver', 'name')
                                ->required()
                                ->searchable()
                                ->preload(),
                        ])->columns(2),
                ])->columnSpanFull(),               
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('staffid')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_event_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('attachment')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\EditAction::make(),
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

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleResource\Pages;
use App\Filament\Resources\VehicleResource\RelationManagers;
use App\Models\Carmodel;
use App\Models\Vehicle;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationGroup = 'Admin Management';
    protected static ?int $navigationSort = 3;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Section::make()
                //     ->schema([
                        Forms\Components\TextInput::make('plateno')
                            ->label('Plate No')
                            ->placeholder('KEE5656')
                            ->autofocus()
                            ->live()
                            ->afterStateUpdated(function($state, $set) {
                                $set('plateno', strtoupper($state));
                            })
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('location')
                            ->live()
                            ->afterStateUpdated(function($state, $set) {
                                $set('location', strtoupper($state));
                            })
                            ->placeholder('Example: Pengembangan')
                            ->maxLength(255),
                        Select::make('driver_id')
                            ->required()
                            ->relationship('driver', 'name')
                            ->searchable()
                            ->preload(),
                        Select::make('carmodel_id')
                            ->label('Car Model')
                            ->required()
                            ->options(Carmodel::all()->pluck('name', 'id'))
                            ->searchable()
                            ->preload(),
                    // ]
            ]);
                
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('plateno')
                    ->label('Plate No')
                    ->searchable(),
                Tables\Columns\TextColumn::make('driver.name')
                    ->searchable()
                    ->label('Driver\'s Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('carmodel.name')
                    ->label('Car Model')
                    ->searchable()
                    ->sortable(),                    
                Tables\Columns\TextColumn::make('location')
                    ->label('Penempatan')
                    ->searchable(),                
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
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
        ];
    }
}

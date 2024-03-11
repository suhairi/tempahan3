<?php

namespace App\Filament\Resources\DriverResource\RelationManagers;

use App\Models\Carmodel;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VehiclesRelationManager extends RelationManager
{
    protected static string $relationship = 'vehicles';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('plateno')
                    ->label('Plate No')
                    ->placeholder('KEE5656')
                    ->autofocus()
                    ->live()
                    ->afterStateUpdated(function($state, $set) {
                        $set('plateno', strtoupper($state));
                    })
                    ->required()
                    ->maxLength(255),
                TextInput::make('location')
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
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('plateno')
            ->columns([
                TextColumn::make('plateno')
                    ->label('Plate No')
                    ->searchable(),
                TextColumn::make('driver.name')
                    ->searchable()
                    ->label('Driver\'s Name')
                    ->sortable(),
                TextColumn::make('carmodel.name')
                    ->label('Car Model')
                    ->searchable()
                    ->sortable(),                    
                TextColumn::make('location')
                    ->label('Penempatan')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}

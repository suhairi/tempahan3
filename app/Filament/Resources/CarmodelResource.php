<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarmodelResource\Pages;
use App\Filament\Resources\CarmodelResource\RelationManagers;
use App\Models\Carbrand;
use App\Models\Carmodel;
use App\Models\Cartype;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarmodelResource extends Resource
{
    protected static ?string $model = Carmodel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Car Models';

    protected static ?string $navigationGroup = 'Admin Management';
    protected static ?int $navigationSort = 4;

    protected static ?string $pluralModelLabel = 'Car Models';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->placeholder('Example: Preve, Hiace, X-Trail')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Select::make('carbrand_id')
                    ->label('Car Brand')
                    ->options(Carbrand::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('cartype_id')
                    ->label('Car Type')
                    ->options(Cartype::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('carbrand.name')
                    ->label('Brand Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('cartype.name')
                    ->label('Car Type')
                    ->sortable(),
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
            'index' => Pages\ListCarmodels::route('/'),
            'create' => Pages\CreateCarmodel::route('/create'),
            'edit' => Pages\EditCarmodel::route('/{record}/edit'),
        ];
    }
}

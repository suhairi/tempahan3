<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DriverResource\Pages;
use App\Filament\Resources\DriverResource\RelationManagers;
use App\Filament\Resources\DriverResource\RelationManagers\VehiclesRelationManager;
use App\Models\Bahagian;
use App\Models\Driver;
use App\Models\Staff;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class DriverResource extends Resource
{
    protected static ?string $model = Driver::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Admin Management';
    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('name')
                    ->options(Staff::all()->pluck('nama', 'nama'))
                    ->searchable()
                    ->preload()
                    ->required()
                    ->live()
                    ->afterStateUpdated(function($state, $get, $set) {
                        $staff = Staff::where('nama', '=', $state)->first();
                        $set('staffid', $staff->staff_id);

                        // set slug
                        $patterns = ['/AHMAD/', '/MOHD/', '/MOHD /', '/MUHAMMAD/', '/MOHD./', '/MOHAMAD/', '/ABDUL/', '/BIN/', '/ABU/', '/NOR/'];
                        $state = explode(' ', Str::squish(Str::remove('. ', preg_replace($patterns, '', $state))));
                        $slug = $state[0];
                        $set('slug', strtolower($slug));
                    })
                    ,
                Forms\Components\TextInput::make('staffid')
                    ->label('Staff ID')
                    ->readOnly()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('Nama Panggilan')
                    ->required()
                    ->readOnly(),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                
                Select::make('bahagian_id')
                    ->label('Bahagian')
                    ->options(Bahagian::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->default(7),
                Select::make('type')
                    ->label('Jenis Pergerakan Pemandu')
                    ->options([
                            'VIP' => 'VIP',
                            'Bebas' => 'Bebas (Luar dan dalam MADA)',
                            'Dalam' => 'Dalam', 
                            'Sakit' => 'Sakit',
                        ])
                    ->default('Bebas'),
                // Select::make('vehicles')
                //     ->multiple()
                //     ->relationship('vehicles', 'plateno', fn(Builder $query) => $query->where('driver_id', NULL))
                //     ->searchable()
                //     ->preload(),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('staffid')
                    ->searchable(),
                BadgeColumn::make('slug')
                    ->color('success')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('bahagian.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
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
            VehiclesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDrivers::route('/'),
            'create' => Pages\CreateDriver::route('/create'),
            'edit' => Pages\EditDriver::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\VehicleResource\RelationManagers;

use App\Models\Bahagian;
use App\Models\Staff;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class DriverRelationManager extends RelationManager
{
    protected static string $relationship = 'driver';

    public function form(Form $form): Form
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
                TextInput::make('staffid')
                    ->label('Staff ID')
                    ->readOnly()
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->label('Nama Panggilan')
                    ->required()
                    ->readOnly(),
                TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
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
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('staffid')
                    ->searchable(),
                BadgeColumn::make('slug')
                    ->color('success')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                
                TextColumn::make('bahagian.name')
                    ->searchable(),
                TextColumn::make('type')
                    ->searchable(),
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

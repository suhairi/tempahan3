<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Filament\Resources\StaffResource\RelationManagers;
use App\Models\Bahagian;
use App\Models\Cawangan;
use App\Models\Gelaran;
use App\Models\Grade;
use App\Models\Jawatan;
use App\Models\Seksyen;
use App\Models\Staff;
use App\Models\Status;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Admin Management';
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('staff_id')
                    ->label('Staff ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kod_gelaran_semasa')
                    ->label('Gelaran')
                    ->getStateUsing(function(Model $record, Gelaran $gelaran) {
                        $glrn = $gelaran->where('id', '=', $record->kod_gelaran_semasa)->first();
                        if(empty($glrn))
                            return 'Encik/Puan/Cik';
                        return $glrn->name;
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_kp')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('no_tel')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kod_jantina')
                    ->label('Jantina')
                    ->getStateUsing(function(Model $record){
                        if($record->kod_jantina == 'L')
                            return 'LELAKI';
                        if($record->kod_jantina == 'P')
                            return 'PEREMPUAN';                       

                        return $record->kod_jantina;
                    })
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('kod_bangsa')
                    ->label('Bangsa')
                    ->getStateUsing(function(Model $record) {
                        if($record->kod_bangsa == 'M')
                            return 'MELAYU';
                        if($record->kod_bangsa == 'I')
                            return 'INDIA';
                        if($record->kod_bangsa == 'C')
                            return 'CINA';
                        if($record->kod_bangsa == 'S')
                            return 'SIAM';
                        if($record->kod_bangsa == 'L')
                            return 'LAIN-LAIN';
                    })
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('kod_agama')
                    ->label('Agama')
                    ->getStateUsing(function(Model $record) {
                        if($record->kod_agama == 'I')
                            return 'ISLAM';
                        if($record->kod_agama == 'H')
                            return 'HINDU';
                        if($record->kod_agama == 'B')
                            return 'BUDDHA';
                        if($record->kod_agama == 'K')
                            return 'KRISTIAN';
                        if($record->kod_agama == 'L')
                            return 'LAIN-LAIN';
                        
                    })
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tarikh_masuk')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('tarikh_sah')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('tarikh_gred_semasa')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('tarikh_penempatan_semasa')
                    ->getStateUsing(function(Model $record) {
                        if($record->tarikh_penempatan_semasa == '0000-00-00')
                            return Carbon::now()->subYears(1000)->format('d M Y');

                        return Carbon::parse($record->tarikh_penempatan_semasa)->format('d M Y');
                    })
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('kod_jawatan_semasa')
                    ->label('Jawatan')
                    ->getStateUsing(function(Model $record, Jawatan $jawatan) {
                        $jwtn = $jawatan->where('id', '=', $record->kod_jawatan_semasa)->first();
                        if(empty($jwtn))
                            return '**unknown**';
                        return $jwtn->name;
                        
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('kod_gred_semasa')
                    ->label('Grade')
                    ->getStateUsing(function(Model $record, Grade $grade) {
                        $gred = $grade->where('id', '=', $record->kod_gred_semasa)->first();
                        if(empty($gred))
                            return '**unknown**';
                        return $gred->name;
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('kod_bhgn_semasa')
                    ->label('Bahagian')
                    ->getStateUsing(function(Model $record, Bahagian $bahagian) {
                        $bhgn = $bahagian->where('id', '=', $record->kod_bhgn_semasa)->first();                        
                        if(empty($bhgn))
                            return '**unknown**';
                        return $bhgn->name;                        
                    })
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('kod_caw_semasa')
                    ->label('Cawangan')
                    ->getStateUsing(function(Model $record, Cawangan $cawangan){
                        $caw = $cawangan->where('id', '=', $record->kod_caw_semasa)->first();
                        if(empty($caw))
                            return '**unknown**';
                            return $caw->name;
                    })
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('kod_seksyen_semasa')
                    ->label('Seksyen')
                    ->getStateUsing(function(Model $record, Seksyen $seksyen){
                        $sek = $seksyen->where('id', '=', $record->kod_seksyen_semasa)->first();
                        if(empty($sek))
                            return '**unknown**';
                        return $sek->name;
                    })
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('umur_bersara')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('catatan')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('user_level')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('speed_dial')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('connection')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tarikh_lahir')
                    ->getStateUsing(function(Model $record) {
                        $dob = Carbon::parse($record->tarikh_lahir)->format('d M Y');
                        return $dob;
                    })
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('tarikh_dinaikkan_pangkat')
                    ->getStateUsing(function(Model $record) {
                        if($record->tarikh_dinaikkan_pangkat == '0000-00-00')
                            return Carbon::now()->subYears(1000)->format('d M Y');

                        return Carbon::parse($record->tarikh_penempatan_semasa)->format('d M Y');
                    })
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('tarikh_pencen')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('gaji_pokok')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bulan_naik_gaji')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('status_code')
                    ->getStateUsing(function(Model $record, Status $status) {
                        $stats = $status->where('id', '=', $record->status_code)->first();
                        if(empty($stats))
                            return '**unknnown**';
                        return $stats->name;
                    })
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('staff_location')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListStaff::route('/'),
            // 'create' => Pages\CreateStaff::route('/create'),
            // 'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Staff;
use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Notifications\Notification;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'System Management';
    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'green';
    }

    

    public static function form(Form $form): Form
    {
        return $form
        ->schema([

            Wizard::make([
                Wizard\Step::make('User Info')
                    ->description('Please fill in user information.')
                    ->icon('heroicon-o-users')
                    ->schema([
                        Select::make('name')
                            ->options(Staff::all()->pluck('nama', 'nama'))
                            ->live()
                            ->afterStateUpdated(function($state, $set, Staff $staff){
                                $stf = $staff->where('nama', '=', $state)->first();
                                $set('staffid', $stf->staff_id);
                            })
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('staffid')
                            ->placeholder('**auto')
                            ->readonly()
                            ->required(),                
                        TextInput::make('email')
                            ->required()
                            ->email()
                            ->unique()
                            ->maxLength(255),
                    ])
                    ->columns(3),
                Wizard\Step::make('Roles And Permission')
                    ->description('Permission and Roles for the user')
                    ->icon('heroicon-o-finger-print')       
                    ->schema([
                        TextInput::make('password')
                            ->password()
                            ->default('password')
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                            ->dehydrated(fn (?string $state): bool => filled($state))
                            ->maxLength(255),
                        Select::make('roles')
                            ->label('**Roles')
                            ->relationship(
                                name: 'roles',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn(Builder $query) => $query->where('name', '!=', 'Super Admin')    
                            )
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label('Role Name')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->multiple()
                            ->searchable()
                            ->preload(),
                        Select::make('permissions')
                            ->label('**Permissions')
                            ->relationship('permissions', 'name')
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->label('Permission Name')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->multiple()
                            ->searchable()
                            ->preload()
                    ]),
            ])->columnSpanFull(),            
            
            
        ])
        ->createAnother(false)
        ->columns(3);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('staffid')
                    ->label('Staff ID')
                    ->searchable(),                
                TextColumn::make('email')
                    ->searchable(),
                BadgeColumn::make('roles.name')
                    ->color('success')
                    ->searchable(),
                TextColumn::make('permissions.name')
                    ->searchable(),
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
                Tables\Actions\DeleteAction::make()
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('User deleted : ')
                            ->body('The user has been deleted successfully.')
                            ->sendToDatabase(auth()->user()),
                    ),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

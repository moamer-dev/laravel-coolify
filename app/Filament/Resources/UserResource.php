<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section as SectionComponent;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'Users';
    protected static ?int $navigationSort = 1;
    //protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                SectionComponent::make('User Information')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        DateTimePicker::make('email_verified_at'),
                        Select::make('learningPaths')
                            ->label('Learning Paths')
                            ->searchable()
                            ->preload()
                            ->multiple()
                            ->relationship('learningPaths', 'title'),
                        // Forms\Components\TextInput::make('password')
                        //     ->password()
                        //     ->maxLength(255),
                        Toggle::make('is_active')
                            ->required(),
                    ])->columns(2),
                SectionComponent::make('Profile Information')
                    ->relationship('profile')
                    ->schema([
                        TextInput::make('phone')
                            ->tel(),
                        TextInput::make('whatsapp')
                            ->tel(),
                        Select::make('country_id')
                            ->searchable()
                            ->preload()
                            ->relationship('country', 'name'),
                        FileUpload::make('avatar')
                            ->image(),
                        TextInput::make('bio'),
                        TextInput::make('facebook')
                            ->url()
                            ->suffixIcon('heroicon-m-globe-alt'),
                        TextInput::make('linkedin')
                            ->url()
                            ->suffixIcon('heroicon-m-globe-alt'),
                        TextInput::make('github')
                            ->url()
                            ->suffixIcon('heroicon-m-globe-alt'),
                        TextInput::make('instagram')
                            ->url()
                            ->suffixIcon('heroicon-m-globe-alt'),
                        Select::make('level_id')
                            ->searchable()
                            ->preload()
                            ->relationship('level', 'name'),
                        Toggle::make('is_public')
                            ->required(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->formatStateUsing(function ($state, $record) {
                        $iconUrl = $record->profile && $record->profile->avatar
                            ? asset('storage/' . $record->profile->avatar)
                            : 'https://via.placeholder.com/40';

                        return view('components.shared.icon-with-name', [
                            'iconUrl' => $iconUrl,
                            'name' => $state,
                        ])->render();
                    })
                    ->html(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Change Password')
                    ->label('Change Password')
                    ->action(function (User $record, array $data): void {
                        $record->update([
                            'password' => bcrypt($data['new_password']),
                        ]);
                    })
                    ->form([
                        Forms\Components\TextInput::make('new_password')
                            ->password()
                            ->required()
                            ->minLength(6)
                            ->label('New Password'),
                        Forms\Components\TextInput::make('new_password_confirmation')
                            ->password()
                            ->required()
                            ->same('new_password')
                            ->label('Confirm New Password'),
                    ])
                    ->modalHeading('Change Password'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}

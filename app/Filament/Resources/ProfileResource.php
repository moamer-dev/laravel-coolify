<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;
    protected static ?string $navigationGroup = 'Users';
    protected static ?int $navigationSort = 2;
    //protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make('User Information')
                        ->schema([
                            Section::make('Basic Information')
                                ->schema([
                                    Forms\Components\Select::make('user_id')
                                        ->required()
                                        ->searchable()
                                        ->preload()
                                        ->relationship('user', 'name'),
                                    Forms\Components\Select::make('country_id')
                                        ->required()
                                        ->searchable()
                                        ->preload()
                                        ->relationship('country', 'name'),
                                    Forms\Components\TextInput::make('phone')
                                        ->tel()
                                        ->maxLength(255)
                                        ->default(null),
                                    Forms\Components\Textarea::make('bio')
                                        ->columnSpanFull(),
                                ])->columns(2)->collapsible()->compact(),

                            // Social Media Section
                            Section::make('Social Media')
                                ->schema([
                                    Forms\Components\TextInput::make('whatsapp')
                                        ->maxLength(255)
                                        ->default(null),
                                    Forms\Components\TextInput::make('facebook')
                                        ->maxLength(255)
                                        ->default(null),
                                    Forms\Components\TextInput::make('instagram')
                                        ->maxLength(255)
                                        ->default(null),
                                    Forms\Components\TextInput::make('github')
                                        ->maxLength(255)
                                        ->default(null),
                                    Forms\Components\TextInput::make('linkedin')
                                        ->maxLength(255)
                                        ->default(null),
                                ])->columns(2)->collapsible()->compact(), // Optional: Adjust columns for layout
                        ]),

                    Section::make('Additional Information')
                        ->schema([
                            Forms\Components\Toggle::make('is_public')
                                ->required(),
                            Forms\Components\FileUpload::make('avatar')
                                ->image(),
                        ])->grow(false),
                ])->from('md')
            ])->columns(1);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Name')
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('country.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('facebook')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instagram')
                    ->searchable(),
                Tables\Columns\TextColumn::make('github')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_public')
                    ->boolean(),
                Tables\Columns\TextColumn::make('avatar')
                    ->searchable(),
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
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

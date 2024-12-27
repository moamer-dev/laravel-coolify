<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LearningPathResource\Pages;
use App\Filament\Resources\LearningPathResource\RelationManagers;
use App\Models\LearningPath;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section as Section_Model;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LearningPathResource extends Resource
{
    protected static ?string $model = LearningPath::class;
    protected static ?string $navigationGroup = 'Paths';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section_Model::make('Add Learning Path')
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->live()
                                ->debounce(500)
                                ->maxLength(255)
                                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                    $slug = Str::slug($state);
                                    $suffix = '';
                                    while (DB::table('courses')->where('slug', $slug . $suffix)->exists()) {
                                        $suffix = '-' . ((int) $suffix + 1);
                                    }
                                    $set('slug', $slug . $suffix);
                                }),
                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->maxLength(255)
                                ->readOnly(),
                            Forms\Components\Textarea::make('description')
                                ->columnSpanFull(),
                            Forms\Components\FileUpload::make('image')
                                ->image(),
                        ])->columns(2),
                    Section_Model::make('Options')
                        ->schema([
                            Forms\Components\Toggle::make('is_active')
                                ->required(),
                            Forms\Components\Select::make('learningStacks')
                                ->label('Learning Stacks')
                                ->searchable()
                                ->preload()
                                ->multiple()
                                ->columnSpanFull()
                                ->relationship('learningStacks', 'title'),
                        ])->grow(true),
                ])->from('md')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('learningStacks.title')
                    ->numeric()
                    ->searchable()
                    ->extraAttributes(['style' => 'white-space: normal; word-wrap: break-word;']),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-s-check')
                    ->sortable(),
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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListLearningPaths::route('/'),
            'create' => Pages\CreateLearningPath::route('/create'),
            'edit' => Pages\EditLearningPath::route('/{record}/edit'),
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

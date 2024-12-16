<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use App\Filament\Resources\QuestionResource\RelationManagers\QuestionOptionRelationManager;

class QuestionResource extends Resource
{
    protected static ?string $navigationGroup = 'Quizzes';
    protected static ?int $navigationSort = 2;
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make('Add Question')
                        ->schema([
                            TextInput::make('title')
                                ->label('Title')
                                ->required()
                                ->placeholder('Quiz Title'),
                            Select::make('type')
                                ->required()
                                ->options([
                                    'multiple_choice' => 'Multiple Choice',
                                    'true_false' => 'True or False',
                                    'single' => 'Single',
                                ]),
                            Select::make('level')
                                ->required()
                                ->options([
                                    'beginner' => 'Beginner',
                                    'intermediate' => 'Intermediate',
                                    'advanced' => 'Advanced',
                                ]),
                            Textarea::make('explanation')
                                ->label('Explanation')
                                ->placeholder('Quiz Explanation'),
                            TextInput::make('points')
                                ->label('Points')
                                ->numeric()
                                ->required()
                                ->placeholder('Quiz Points'),
                        ])->columns(2),
                    Section::make('Options')
                        ->schema([
                            Toggle::make('is_active')
                                ->default(false),
                            Select::make('quiz_id')
                                ->required()
                                ->relationship('quiz', 'title'),
                        ])->grow(false),
                ])->from('md')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('level'),
                Tables\Columns\TextColumn::make('points')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quiz.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
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
            'options' => QuestionOptionRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
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

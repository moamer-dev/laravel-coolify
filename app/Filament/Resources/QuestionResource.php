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
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use App\Filament\Resources\QuestionResource\RelationManagers\QuestionOptionRelationManager;
use Filament\Forms\Get;

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
                            RichEditor::make('title')
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
                            TextInput::make('points')
                                ->label('Points')
                                ->numeric()
                                ->required()
                                ->placeholder('Quiz Points'),
                            RichEditor::make('explanation')
                                ->label('Explanation')
                                ->placeholder('Quiz Explanation')
                                ->columnSpanFull(),
                            Toggle::make('has_image')
                                ->live()
                                ->default(false),
                            FileUpload::make('question_image')
                                ->image()
                                ->visible(fn(Get $get): bool => $get('has_image') === true),
                            Toggle::make('has_video')
                                ->required()
                                ->live()
                                ->default(false)
                                ->afterStateUpdated(function (callable $set, $state) {
                                    if ($state === false) {
                                        $set('video_source', null);
                                        $set('youtube_url', null);
                                        $set('vimeo_url', null);
                                        $set('file_path', null);
                                    }
                                }),
                            Select::make('video_source')
                                ->required()
                                ->options([
                                    'youtube' => 'YouTube',
                                    'vimeo' => 'Vimeo',
                                    'file' => 'File',
                                ])
                                ->label('Video Source')
                                ->live()
                                ->visible(fn(Get $get): bool => $get('has_video') === true),
                            TextInput::make('youtube_url')
                                ->maxLength(255)
                                ->default(null)
                                ->label('YouTube URL')
                                ->visible(fn(Get $get): bool => $get('video_source') === 'youtube'),
                            TextInput::make('vimeo_url')
                                ->maxLength(255)
                                ->default(null)
                                ->label('Vimeo URL')
                                ->visible(fn(Get $get): bool => $get('video_source') === 'vimeo'),
                            TextInput::make('file_path')
                                ->maxLength(255)
                                ->default(null)
                                ->label('File Path')
                                ->visible(fn(Get $get): bool => $get('video_source') === 'file'),
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

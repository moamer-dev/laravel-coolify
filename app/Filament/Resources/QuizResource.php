<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuizResource\Pages;
use App\Filament\Resources\QuizResource\RelationManagers;
use App\Models\Quiz;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section as Section_Model;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use App\Models\Course;
use App\Models\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Filament\Resources\QuizResource\RelationManagers\QuestionRelationManager;

class QuizResource extends Resource
{
    protected static ?string $navigationGroup = 'Quizzes';
    protected static ?int $navigationSort = 1;
    protected static ?string $model = Quiz::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section_Model::make('Add Quiz')
                        ->schema([
                            TextInput::make('title')
                                ->debounce(500)
                                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                    $slug = Str::slug($state);
                                    $suffix = '';
                                    while (DB::table('quizzes')->where('slug', $slug . $suffix)->exists()) {
                                        $suffix = '-' . ((int) $suffix + 1);
                                    }
                                    $set('slug', $slug . $suffix);
                                })
                                ->label('Title')
                                ->required()
                                ->placeholder('Quiz Title'),
                            TextInput::make('slug')
                                ->label('Slug')
                                ->required()
                                ->readOnly(),
                            Textarea::make('description')
                                ->label('Description')
                                ->placeholder('Description'),
                            TextInput::make('retake_attempts')
                                ->label('Retake Attempts')
                                ->placeholder('Retake Attempts')
                                ->numeric(),
                            TextInput::make('passing_score')
                                ->label('Passing Score')
                                ->placeholder('Passing Score')
                                ->numeric(),
                                 Toggle::make('is_timed')
                                ->live()
                                ->label('Has Timer?')
                                ->default(false)
                                ->afterStateUpdated(function (callable $set, $state) {
                                    if ($state == false) {
                                        $set('duration', null);
                                        $set('duration_unit', null);
                                    }
                                }),
                            TextInput::make('duration')
                                ->label('Duration')
                                ->placeholder('Duration')
                                ->numeric()
                                ->visible(fn(Get $get): bool => $get('is_timed') == true),
                            Select::make('duration_unit')
                                ->label('Duration Unit')
                                ->options([
                                    'minutes' => 'Minutes',
                                    'hours' => 'Hours',
                                ])
                                ->visible(fn(Get $get): bool => $get('is_timed') == true),
                        ])->columns(2),
                    Section_Model::make('Options')
                        ->schema([
                            Toggle::make('is_active')
                                ->default(false),
                            Toggle::make('is_reviewable')
                                ->default(false),
                            Select::make('type')
                                ->live()
                                ->label('Quiz Type')
                                ->options([
                                    'assessment' => 'Assessment',
                                    'interview' => 'Interview',
                                    'course' => 'Course',
                                    'challenge' => 'Challenge',
                                ]),
                            Select::make('course_id')
                                ->live()
                                ->label('Course')
                                ->searchable()
                                ->options(fn() => Course::pluck('name', 'id'))
                                ->preload()
                                ->reactive()
                                ->afterStateUpdated(fn(Set $set) => $set('section_id', null))
                                ->visible(fn(Get $get): bool => $get('type') === 'course'),
                            Select::make('section_id')
                                ->label('Section')
                                ->searchable()
                                ->options(fn(Get $get) => Section::where('sectionable_type', Course::class)
                                    ->where('sectionable_id', $get('course_id'))
                                    ->pluck('name', 'id'))
                                ->visible(fn(Get $get): bool => $get('type') == 'course'),
                            Select::make('category_id')
                                ->label('Category')
                                ->relationship('category', 'name'),
                        ])->grow(false),
                ])->from('md')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type'),
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
            'questions' => QuestionRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuizzes::route('/'),
            'create' => Pages\CreateQuiz::route('/create'),
            'edit' => Pages\EditQuiz::route('/{record}/edit'),
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
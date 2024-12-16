<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionOptionResource\Pages;
use App\Filament\Resources\QuestionOptionResource\RelationManagers;
use App\Models\QuestionOption;
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
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class QuestionOptionResource extends Resource
{
    protected static ?string $navigationGroup = 'Quizzes';
    protected static ?int $navigationSort = 3;
    protected static ?string $model = QuestionOption::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make('Add Question Answers')
                        ->schema([
                            TextInput::make('option_text')
                                ->label('Answer Text')
                                ->required()
                                ->placeholder('Answer Text'),
                        ])->columns(2),
                    Section::make('Options')
                        ->schema([
                            Toggle::make('is_correct')
                                ->default(false),
                            Select::make('question_id')
                                ->required()
                                ->relationship('question', 'title'),
                        ])->grow(false),
                ])->from('md')
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('option_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('is_correct')
                    ->numeric()
                    ->getStateUsing(function ($record) {
                        return $record->is_correct == true ? 'Yes' : 'No';
                    })
                    ->badge(fn(string $state): bool => $state === 'Yes' || $state === 'No')
                    ->color(fn(string $state): string => $state === 'Yes' ? 'success' : 'danger'),
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
            'index' => Pages\ListQuestionOptions::route('/'),
            'create' => Pages\CreateQuestionOption::route('/create'),
            'edit' => Pages\EditQuestionOption::route('/{record}/edit'),
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

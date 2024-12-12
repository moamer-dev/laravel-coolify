<?php

namespace App\Filament\Resources\SectionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;

class LessonsRelationManager extends RelationManager
{
    protected static string $relationship = 'lessons';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\select::make('section_id')
                //     ->required()
                //     ->searchable()
                //     ->preload()
                //     ->default(null)
                //     ->relationship('section', 'name'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                // Forms\Components\TextInput::make('slug')
                //     ->required()
                //     ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_preview')
                    ->required(),
                Forms\Components\Toggle::make('has_video')
                    ->required()
                    ->live()
                    ->default(false)
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state === false) {
                            $set('video_source', null);
                            $set('youtube_url', null);
                            $set('vimeo_url', null);
                            $set('file_path', null);
                            $set('video_duration', null);
                        }
                    }),
                Forms\Components\Select::make('video_source')
                    ->required()
                    ->options([
                        'youtube' => 'YouTube',
                        'vimeo' => 'Vimeo',
                        'file' => 'File',
                    ])
                    ->default('free')
                    ->label('Video Source')
                    ->live()
                    ->visible(fn(Get $get): bool => $get('has_video') === true),
                Forms\Components\TextInput::make('youtube_url')
                    ->maxLength(255)
                    ->default(null)
                    ->label('YouTube URL')
                    ->visible(fn(Get $get): bool => $get('video_source') === 'youtube'),
                Forms\Components\TextInput::make('vimeo_url')
                    ->maxLength(255)
                    ->default(null)
                    ->label('Vimeo URL')
                    ->visible(fn(Get $get): bool => $get('video_source') === 'vimeo'),
                Forms\Components\TextInput::make('file_path')
                    ->maxLength(255)
                    ->default(null)
                    ->label('File Path')
                    ->visible(fn(Get $get): bool => $get('video_source') === 'file'),
                Forms\Components\TextInput::make('video_duration')
                    ->maxLength(255)
                    ->default(null)
                    ->label('Duration')
                    ->visible(fn(Get $get): bool => $get('has_video') === true),
                Forms\Components\Textarea::make('content')
                    ->columnSpanFull(),
                // Forms\Components\TextInput::make('order')
                //     ->required()
                //     ->numeric()
                //     ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\IconColumn::make('is_preview')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_video')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(fn(Builder $query) => $query->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]));
    }
}

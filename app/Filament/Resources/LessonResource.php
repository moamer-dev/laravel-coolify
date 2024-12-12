<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LessonResource\Pages;
use App\Filament\Resources\LessonResource\RelationManagers;
use App\Models\Lesson;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Tables\Actions\EditAction;


class LessonResource extends Resource
{
    protected static ?string $model = Lesson::class;
    protected static ?string $navigationGroup = 'Courses';
    protected static ?int $navigationSort = 4;
    //protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Lesson Name')
                    ->live(onBlur: true)
                    ->required()
                    ->maxLength(255),
                // Forms\Components\TextInput::make('slug')
                //     ->label('Slug')
                //     ->maxLength(255)
                //     ->helperText('Leave empty to auto-generate from the name'),
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
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('slug')
                //     ->searchable(),
                Tables\Columns\IconColumn::make('is_preview')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_video')
                    ->boolean(),
                Tables\Columns\TextColumn::make('video_duration')
                    ->searchable(),
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
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                EditAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        if (isset($data['has_video']) && $data['has_video'] === false) {
                            $data['video_source'] = null;
                            $data['youtube_url'] = null;
                            $data['vimeo_url'] = null;
                            $data['file_path'] = null;
                            $data['video_duration'] = null;
                        }
                        if (isset($data['video_source'])) {
                            if ($data['video_source'] === 'youtube') {
                                $data['vimeo_url'] = null;
                                $data['file_path'] = null;
                            } elseif ($data['video_source'] === 'vimeo') {
                                $data['youtube_url'] = null;
                                $data['file_path'] = null;
                            } elseif ($data['video_source'] === 'file') {
                                $data['youtube_url'] = null;
                                $data['vimeo_url'] = null;
                            }
                        }

                        return $data;
                    })
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageLessons::route('/'),
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

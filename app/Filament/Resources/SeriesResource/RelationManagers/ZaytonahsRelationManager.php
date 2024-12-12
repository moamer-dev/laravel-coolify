<?php

namespace App\Filament\Resources\SeriesResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ZaytonahsRelationManager extends RelationManager
{
    protected static string $relationship = 'zaytonahs';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        $slug = Str::slug($state);
                        $suffix = '';
                        while (DB::table('zaytonahs')->where('slug', $slug . $suffix)->exists()) {
                            $suffix = '-' . ((int) $suffix + 1);
                        }
                        $set('slug', $slug . $suffix);
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->readOnly()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('content')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_free')
                    ->required(),
                Forms\Components\Toggle::make('has_video')
                    ->required()
                    ->live()
                    ->default(false)
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state === true) {
                            $set('video_source', null);
                            $set('youtube_url', null);
                            $set('vimeo_url', null);
                            $set('file_path', null);
                            $set('video_duration', null);
                        }
                    }),
                Forms\Components\Select::make('video_source')
                    ->required()
                    ->live()
                    ->options([
                        'youtube' => 'YouTube',
                        'vimeo' => 'Vimeo',
                        'file' => 'File',
                    ])
                    ->visible(fn(Get $get): bool => $get('has_video') === true),
                Forms\Components\TextInput::make('youtube_url')
                    ->maxLength(255)
                    ->visible(fn(Get $get): bool => $get('has_video') === true && $get('video_source') === 'youtube'),
                Forms\Components\TextInput::make('vimeo_url')
                    ->maxLength(255)
                    ->visible(fn(Get $get): bool => $get('has_video') === true && $get('video_source') === 'vimeo'),
                Forms\Components\TextInput::make('file_path')
                    ->maxLength(255)
                    ->visible(fn(Get $get): bool => $get('has_video') === true && $get('video_source') === 'file'),
                Forms\Components\TextInput::make('video_duration')
                    ->maxLength(255)
                    ->visible(fn(Get $get): bool => $get('has_video') === true),
                // Forms\Components\TextInput::make('order')
                //     ->required()
                //     ->numeric()
                //     ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->required(),

                Forms\Components\FileUpload::make('image')
                    ->image(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
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

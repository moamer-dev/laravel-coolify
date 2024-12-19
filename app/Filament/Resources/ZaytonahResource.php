<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZaytonahResource\Pages;
use App\Filament\Resources\ZaytonahResource\RelationManagers;
use App\Models\Zaytonah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Filament\Forms\Components\Section;

class ZaytonahResource extends Resource
{
    protected static ?string $model = Zaytonah::class;
    protected static ?string $navigationGroup = 'Series';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Section::make('Zaytonah Information')
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
                        Forms\Components\RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Select::make('series')
                            ->label('Series')
                            ->searchable()
                            ->preload()
                            ->multiple()
                            ->columnSpanFull()
                            ->relationship('series', 'name'),
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
                        $avatarUrl = $record->avatar ? asset('storage/' . $record->avatar) : 'https://via.placeholder.com/40';
                        return view('components.avatar-with-name', [
                            'avatarUrl' => $avatarUrl,
                            'name' => $state,
                        ])->render();
                    })
                    ->html(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('is_free')
                    ->boolean(),
                Tables\Columns\IconColumn::make('has_video')
                    ->boolean(),
                Tables\Columns\TextColumn::make('video_source'),
                Tables\Columns\TextColumn::make('youtube_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vimeo_url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('video_duration')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListZaytonahs::route('/'),
            'create' => Pages\CreateZaytonah::route('/create'),
            'edit' => Pages\EditZaytonah::route('/{record}/edit'),
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

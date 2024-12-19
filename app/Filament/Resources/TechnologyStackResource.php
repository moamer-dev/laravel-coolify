<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechnologyStackResource\Pages;
use App\Filament\Resources\TechnologyStackResource\RelationManagers;
use App\Models\TechnologyStack;
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

class TechnologyStackResource extends Resource
{
    protected static ?string $model = TechnologyStack::class;
    protected static ?string $navigationGroup = 'Paths';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live()
                    ->debounce(500)
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
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image(),
                Forms\Components\TextInput::make('url')
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->required()
                    ->options(
                        [
                            'language' => 'Language',
                            'framework' => 'Framework',
                            'tool' => 'Tool',
                            'library' => 'Library',
                            'database' => 'Database',
                        ]
                    ),
                Forms\Components\Select::make('learningStacks')
                    ->searchable()
                    ->preload()
                    ->multiple()
                    ->relationship('learningStacks', 'title'),
                Forms\Components\Select::make('courses')
                    ->label('Courses')
                    ->searchable()
                    ->preload()
                    ->multiple()
                    ->columnSpanFull()
                    ->relationship('courses', 'name'),
                Forms\Components\Select::make('quizzes')
                    ->label('Quizzes')
                    ->searchable()
                    ->preload()
                    ->multiple()
                    ->columnSpanFull()
                    ->relationship('quizzes', 'title'),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('learningStacks.title')
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->extraAttributes(['style' => 'white-space: normal; word-wrap: break-word;']),
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTechnologyStacks::route('/'),
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

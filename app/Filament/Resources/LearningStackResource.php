<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LearningStackResource\Pages;
use App\Filament\Resources\LearningStackResource\RelationManagers;
use App\Models\LearningStack;
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

class LearningStackResource extends Resource
{
    protected static ?string $model = LearningStack::class;
    protected static ?string $navigationGroup = 'Paths';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
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
                Forms\Components\Select::make('learningPaths')
                    ->label('learning Paths')
                    ->searchable()
                    ->preload()
                    ->multiple()
                    ->columnSpanFull()
                    ->relationship('learningPaths', 'title'),
                Forms\Components\Select::make('technologyStacks')
                    ->label('Technology Stacks')
                    ->searchable()
                    ->preload()
                    ->multiple()
                    ->columnSpanFull()
                    ->relationship('technologyStacks', 'name'),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('learningPaths.title')
                    ->numeric()
                    ->searchable()
                    ->extraAttributes(['style' => 'white-space: normal; word-wrap: break-word;']),
                Tables\Columns\TextColumn::make('technologyStacks.name')
                    ->numeric()
                    ->searchable()
                    ->extraAttributes(['style' => 'white-space: normal; word-wrap: break-word;']),
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
            'index' => Pages\ManageLearningStacks::route('/'),
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

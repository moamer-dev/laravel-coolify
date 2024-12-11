<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
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
use Filament\Forms\Components\Wizard;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Components\Section;




class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Wizard::make([
            Wizard\Step::make('Details')
                ->description('Create a new course.')
                ->schema([
                    Section::make('Basic Information')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('Name')
                                ->placeholder('Course Name')
                                ->required()
                                ->maxLength(255)
                                ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                    $slug = Str::slug($state);
                                    $suffix = '';

                                    // Check if the generated slug already exists in the database
                                    while (DB::table('courses')->where('slug', $slug . $suffix)->exists()) {
                                        // If it exists, append a numeric suffix
                                        $suffix = '-' . ((int) $suffix + 1);
                                    }

                                    $set('slug', $slug . $suffix);
                                }),
                            Forms\Components\TextInput::make('slug')
                                ->required()
                                ->maxLength(255)
                                ->readOnly(),
                            Forms\Components\TextInput::make('short_title')
                                ->columnSpanFull()
                                ->default(null),
                            Forms\Components\Textarea::make('description')
                                ->required()
                                ->rows(10)
                                ->minLength(2)
                                ->autosize()
                                ->columnSpanFull(),
                            Forms\Components\Toggle::make('is_featured')
                                ->required(),
                            Forms\Components\Toggle::make('is_best_seller')
                                ->required(),
                                ])->columnSpan(1)->columns(2)->collapsible()->persistCollapsed(),
                            
                    Section::make('Metadata')
                        ->schema([
                            Forms\Components\Select::make('projects')
                                ->label('Connected Projects')
                                ->searchable()
                                ->preload()
                                ->multiple()
                                ->columnSpanFull()
                                ->relationship('projects', 'name'),
                            Forms\Components\Select::make('creator_id')
                                ->required()
                                ->searchable()
                                ->preload()
                                ->relationship('creator', 'id'),
                            Forms\Components\Select::make('level_id')
                                ->required()
                                ->searchable()
                                ->preload()
                                ->relationship('level', 'name'),
                            Forms\Components\Select::make('categories')
                                ->label('Categories')
                                ->required()
                                ->searchable()
                                ->preload()
                                ->multiple()
                                ->columnSpanFull()
                                ->relationship('categories', 'name'),
                           
                            Forms\Components\TagsInput::make('tags')
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('duration')
                                ->maxLength(255)
                                ->default(null),
                            Forms\Components\Select::make('status')
                                ->required()
                                ->options([
                                    'draft' => 'Draft',
                                    'published' => 'Published',
                                    'unpublished' => 'Unpublished',
                                ])
                                ->default('draft')
                                ->label('Status')
                                ->reactive(),
                            Forms\Components\FileUpload::make('feature_image')
                                ->image()
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('promo_video')
                                ->maxLength(255)
                                ->columnSpanFull()
                                ->default(null),
                        ])->columnSpan(1)->columns(2)->collapsible()->collapsible()
                ])->columns(2),
                Wizard\Step::make('Pricing')
                    ->description('Set the pricing details for the course.')
                    ->schema([
                            Forms\Components\Select::make('price_type')
                                ->live()
                                ->required()
                                ->options([
                                    'free' => 'Free',
                                    'paid' => 'Paid',
                                ])
                                ->default('free')
                                ->label('Price Type')
                                ->reactive()
                                ->afterStateUpdated(function (callable $set, $state) {
                                    if ($state === 'free') {
                                        $set('price', null);
                                        $set('currency_id', null);
                                        $set('discount_type', null);
                                        $set('discount_price', null);
                                        $set('discount_percentage', null);
                                        $set('tax', null);
                                        $set('vat', null);
                                    }
                                }),
                            Forms\Components\TextInput::make('price')
                                ->numeric()
                                ->default(null)
                                ->prefix('$')
                                ->visible(fn (Get $get): bool => $get('price_type') === 'paid'),
                            Forms\Components\Select::make('currency_id')
                                ->searchable()
                                ->preload()
                                ->relationship('currency', 'name')
                                ->visible(fn (Get $get): bool => $get('price_type') === 'paid'),
                            Forms\Components\Select::make('discount_type')
                                ->live()
                                ->options([
                                    'fixed_amount' => 'Fixed Amount',
                                    'percentage' => 'Percentage',
                                ])
                                ->default(null)
                                ->label('Discount Type')
                                ->reactive()
                                ->visible(fn (Get $get): bool => $get('price_type') === 'paid'),
                            Forms\Components\TextInput::make('discount_price')
                                ->numeric()
                                ->default(null)
                            ->visible(fn (Get $get): bool => $get('price_type') === 'paid' && $get('discount_type') === 'fixed_amount'),
                            Forms\Components\TextInput::make('discount_percentage')
                                ->numeric()
                                ->default(null)
                                ->visible(fn (Get $get): bool => $get('price_type') === 'paid' && $get('discount_type') === 'percentage'),
                            Forms\Components\TextInput::make('tax')
                                ->numeric()
                                ->default(null)
                                ->visible(fn (Get $get): bool => $get('price_type') === 'paid'),
                            Forms\Components\TextInput::make('vat')
                                ->numeric()
                                ->default(null)
                                ->visible(fn (Get $get): bool => $get('price_type') === 'paid'),
                          ])->columns(2),  
                
            ])->persistStepInQueryString()->submitAction(new HtmlString(Blade::render(<<<BLADE
                <x-filament::button
                    type="submit"
                    size="sm"
                >
                    Submit
                </x-filament::button>
            BLADE))),
                    ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('categories.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('level.name')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('price_type'),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_best_seller')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
             ->filters([
                Tables\Filters\TrashedFilter::make(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
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
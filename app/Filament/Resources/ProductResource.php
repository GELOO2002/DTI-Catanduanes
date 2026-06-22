<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                // ── SECTION 1: Basic Info ──────────────────────────────────
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\Select::make('business_id')
                            ->relationship('business', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->label('Business Owner'),

                        Forms\Components\TextInput::make('name')
                            ->label('Product Name')
                            ->placeholder('cocoashtray')
                            ->required(),
                            
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->label('Main Description')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                // ── SECTION 2: Main Image ──────────────────────────────────
                Forms\Components\Section::make('Main Image')
                    ->schema([
                        Forms\Components\TextInput::make('image')
                            ->label('Cover Image Path')
                            ->placeholder('images/cocoashtray.png')
                            ->columnSpanFull(),
                    ]),
            
                // ── SECTION 3: Gallery ──────────────────────────────────────
                Forms\Components\Section::make('Gallery Slides')
                    ->description('Add additional images with their own name and description.')
                    ->schema([
                        Forms\Components\Repeater::make('gallery')
                            ->label('Slides')
                            ->schema([
                                Forms\Components\TextInput::make('image')
                                    ->label('Slide Image Path')
                                    ->placeholder('images/cocopineapplelamp.png')
                                    ->required(),

                                Forms\Components\TextInput::make('name')
                                    ->label('Slide Title')
                                    ->required(),

                                Forms\Components\Textarea::make('description')
                                    ->label('Slide Description')
                                    ->rows(2)
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->addActionLabel('+ Add Gallery Slide')
                            ->collapsible()
                            ->columnSpanFull(),
                    ]),

                // ── SECTION 4: History ─────────────────────────────────────
                Forms\Components\Section::make('MSME History')
                    ->schema([
                        Forms\Components\Textarea::make('history')
                            ->rows(8)
                            ->label('Business Milestones / History')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Photo')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('business.name')
                    ->label('Business')
                    ->searchable()
                    ->sortable()
                    ->color('danger'),

                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->label('Description'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit'   => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
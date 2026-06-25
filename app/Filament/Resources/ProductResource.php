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
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Product Details')
                    ->schema([
                        Forms\Components\Select::make('business_id')
                            ->relationship('business', 'name')
                            ->required()
                            ->label('Business'),
                        
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Product Name'),
                        
                        Forms\Components\Textarea::make('description')
                            ->columnSpanFull()
                            ->rows(3),
                    ]),

                Forms\Components\Section::make('Gallery')
                    ->schema([
                        Forms\Components\Textarea::make('gallery')
                            ->label('Image Paths (JSON)')
                            ->placeholder('["images/cocoashtray.png", "images/lamp2.png"]')
                            ->helperText('Paste image paths as a JSON array')
                            ->columnSpanFull()
                            ->rows(4)
                            ->required(),
                        
                        Forms\Components\Textarea::make('gallery_names')
                            ->label('Image Names (JSON)')
                            ->placeholder('["Coconut Ashtray", "Lamp 2"]')
                            ->helperText('Must match the number of images above')
                            ->columnSpanFull()
                            ->rows(4),
                        
                        Forms\Components\Textarea::make('gallery_descriptions')
                            ->label('Image Descriptions (JSON)')
                            ->placeholder('["Handmade coconut shell", "Wooden lamp"]')
                            ->helperText('Must match the number of images above')
                            ->columnSpanFull()
                            ->rows(4),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('business.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
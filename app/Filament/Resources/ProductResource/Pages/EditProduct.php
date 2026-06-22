<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
{
    $slides = $data['gallery'] ?? [];

    $data['gallery_names']        = array_values(array_column($slides, 'name'));
    $data['gallery_descriptions'] = array_values(array_column($slides, 'description'));
    $data['gallery']              = array_values(array_column($slides, 'image'));

    return $data;
}
}
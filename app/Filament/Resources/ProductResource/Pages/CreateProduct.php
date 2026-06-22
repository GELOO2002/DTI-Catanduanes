<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    $slides = $data['gallery'] ?? [];

    $data['gallery_names']        = array_values(array_column($slides, 'name'));
    $data['gallery_descriptions'] = array_values(array_column($slides, 'description'));
    $data['gallery']              = array_values(array_column($slides, 'image'));

    return $data;
}
}
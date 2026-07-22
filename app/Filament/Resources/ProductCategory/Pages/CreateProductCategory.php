<?php

namespace App\Filament\Resources\ProductCategory\Pages;

use App\Filament\Resources\ProductCategory\ProductCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateProductCategory extends CreateRecord
{
    protected static string $resource = ProductCategoryResource::class;
}

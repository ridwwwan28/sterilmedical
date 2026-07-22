<?php

namespace App\Filament\Resources\ProductCategory\Pages;

use App\Filament\Resources\ProductCategory\ProductCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListProductCategories extends ListRecords
{
    protected static string $resource = ProductCategoryResource::class;

    protected function getHeaderActions(): array
    {
        $user = Auth::user();

        if ($user?->role === 'superadmin') {
            return [
                CreateAction::make(),
            ];
        }

        return [];
    }
}

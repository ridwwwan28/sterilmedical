<?php

namespace App\Filament\Resources\Product\Pages;

use App\Filament\Resources\Product\ProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

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

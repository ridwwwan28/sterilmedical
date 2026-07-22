<?php

namespace App\Filament\Resources\ProductGroup\Pages;

use App\Filament\Resources\ProductGroup\ProductGroupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListProductGroups extends ListRecords
{
    protected static string $resource = ProductGroupResource::class;

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

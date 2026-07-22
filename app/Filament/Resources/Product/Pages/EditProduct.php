<?php

namespace App\Filament\Resources\Product\Pages;

use App\Filament\Resources\Product\ProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        $user = Auth::user();

        if ($user?->role === 'superadmin') {
            return [
                DeleteAction::make(),
            ];
        }

        return [];
    }
}

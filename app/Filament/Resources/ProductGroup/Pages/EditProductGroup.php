<?php

namespace App\Filament\Resources\ProductGroup\Pages;

use App\Filament\Resources\ProductGroup\ProductGroupResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditProductGroup extends EditRecord
{
    protected static string $resource = ProductGroupResource::class;

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

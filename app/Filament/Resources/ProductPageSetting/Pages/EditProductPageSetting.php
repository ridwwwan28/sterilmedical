<?php

namespace App\Filament\Resources\ProductPageSetting\Pages;

use App\Filament\Resources\ProductPageSetting\ProductPageSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditProductPageSetting extends EditRecord
{
    protected static string $resource = ProductPageSettingResource::class;

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

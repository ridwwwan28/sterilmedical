<?php

namespace App\Filament\Resources\ProductPageSetting\Pages;

use App\Filament\Resources\ProductPageSetting\ProductPageSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListProductPageSettings extends ListRecords
{
    protected static string $resource = ProductPageSettingResource::class;

    protected function getHeaderActions(): array
    {
        $user = Auth::user();

        if ($user?->role === 'superadmin' && \App\Models\ProductPageSetting::count() === 0) {
            return [
                CreateAction::make(),
            ];
        }

        return [];
    }
}

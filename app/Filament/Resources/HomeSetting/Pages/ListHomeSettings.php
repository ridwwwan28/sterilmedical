<?php

namespace App\Filament\Resources\HomeSetting\Pages;

use App\Filament\Resources\HomeSetting\HomeSettingResource;
use App\Models\HomeSetting;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListHomeSettings extends ListRecords
{
    protected static string $resource = HomeSettingResource::class;

    protected function getHeaderActions(): array
    {
        $user = Auth::user();

        if ($user?->role === 'superadmin' && HomeSetting::count() === 0) {
            return [
                CreateAction::make(),
            ];
        }

        return [];
    }
}

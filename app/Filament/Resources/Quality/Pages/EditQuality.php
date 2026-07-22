<?php

namespace App\Filament\Resources\Quality\Pages;

use App\Filament\Resources\Quality\QualityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditQuality extends EditRecord
{
    protected static string $resource = QualityResource::class;

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

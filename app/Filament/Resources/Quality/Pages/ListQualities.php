<?php

namespace App\Filament\Resources\Quality\Pages;

use App\Filament\Resources\Quality\QualityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListQualities extends ListRecords
{
    protected static string $resource = QualityResource::class;

    protected function getHeaderActions(): array
    {
        $user = Auth::user();

        // Check if there is already a Quality record. If yes, hide Create button (Singleton behavior).
        if ($user?->role === 'superadmin' && \App\Models\Quality::count() === 0) {
            return [
                CreateAction::make(),
            ];
        }

        return [];
    }
}

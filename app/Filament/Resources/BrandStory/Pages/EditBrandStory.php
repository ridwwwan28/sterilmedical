<?php

namespace App\Filament\Resources\BrandStory\Pages;

use App\Filament\Resources\BrandStory\BrandStoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditBrandStory extends EditRecord
{
    protected static string $resource = BrandStoryResource::class;

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

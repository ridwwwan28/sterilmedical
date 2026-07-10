<?php

namespace App\Filament\Resources\BrandStory\Pages;

use App\Filament\Resources\BrandStory\BrandStoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListBrandStories extends ListRecords
{
    protected static string $resource = BrandStoryResource::class;

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

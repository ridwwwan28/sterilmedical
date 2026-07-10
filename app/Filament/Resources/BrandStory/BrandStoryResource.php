<?php

namespace App\Filament\Resources\BrandStory;

use App\Filament\Resources\BrandStory\Pages\CreateBrandStory;
use App\Filament\Resources\BrandStory\Pages\EditBrandStory;
use App\Filament\Resources\BrandStory\Pages\ListBrandStories;
use App\Filament\Resources\BrandStory\Schemas\BrandStoryForm;
use App\Filament\Resources\BrandStory\Tables\BrandStoriesTable;
use App\Models\BrandStory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class BrandStoryResource extends Resource
{
    protected static ?string $model = BrandStory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBookOpen;

    protected static ?string $recordTitleAttribute = 'Brand Story';

    public static function form(Schema $schema): Schema
    {
        return BrandStoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BrandStoriesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        $user = Auth::user();

        return $user?->role === 'superadmin';
    }

    public static function canDelete($record): bool
    {
        $user = Auth::user();

        return $user?->role === 'superadmin';
    }

    public static function canDeleteAny(): bool
    {
        $user = Auth::user();

        return $user?->role === 'superadmin';
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBrandStories::route('/'),
            'create' => CreateBrandStory::route('/create'),
            'edit' => EditBrandStory::route('/{record}/edit'),
        ];
    }
}

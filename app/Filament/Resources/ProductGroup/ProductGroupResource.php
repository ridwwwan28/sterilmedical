<?php

namespace App\Filament\Resources\ProductGroup;

use App\Filament\Resources\ProductGroup\Pages\CreateProductGroup;
use App\Filament\Resources\ProductGroup\Pages\EditProductGroup;
use App\Filament\Resources\ProductGroup\Pages\ListProductGroups;
use App\Filament\Resources\ProductGroup\Schemas\ProductGroupForm;
use App\Filament\Resources\ProductGroup\Tables\ProductGroupTable;
use App\Models\ProductGroup;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class ProductGroupResource extends Resource
{
    protected static ?string $model = ProductGroup::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolder;

    protected static ?string $recordTitleAttribute = 'Filter Utama Produk';

    protected static ?string $navigationLabel = 'Filter Utama Produk';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return ProductGroupForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductGroupTable::configure($table);
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
            'index' => ListProductGroups::route('/'),
            'create' => CreateProductGroup::route('/create'),
            'edit' => EditProductGroup::route('/{record}/edit'),
        ];
    }
}

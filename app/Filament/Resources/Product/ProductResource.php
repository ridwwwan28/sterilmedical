<?php

namespace App\Filament\Resources\Product;

use App\Filament\Resources\Product\Pages\CreateProduct;
use App\Filament\Resources\Product\Pages\EditProduct;
use App\Filament\Resources\Product\Pages\ListProducts;
use App\Filament\Resources\Product\Schemas\ProductForm;
use App\Filament\Resources\Product\Tables\ProductTable;
use App\Models\Product;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShoppingBag;

    protected static ?string $recordTitleAttribute = 'Produk';

    protected static ?string $navigationLabel = 'Produk';

    public static function form(Schema $schema): Schema
    {
        return ProductForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductTable::configure($table);
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
            'index' => ListProducts::route('/'),
            'create' => CreateProduct::route('/create'),
            'edit' => EditProduct::route('/{record}/edit'),
        ];
    }
}

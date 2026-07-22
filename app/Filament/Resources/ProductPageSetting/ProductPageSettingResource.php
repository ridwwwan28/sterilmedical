<?php

namespace App\Filament\Resources\ProductPageSetting;

use App\Filament\Resources\ProductPageSetting\Pages\CreateProductPageSetting;
use App\Filament\Resources\ProductPageSetting\Pages\EditProductPageSetting;
use App\Filament\Resources\ProductPageSetting\Pages\ListProductPageSettings;
use App\Filament\Resources\ProductPageSetting\Schemas\ProductPageSettingForm;
use App\Filament\Resources\ProductPageSetting\Tables\ProductPageSettingTable;
use App\Models\ProductPageSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class ProductPageSettingResource extends Resource
{
    protected static ?string $model = ProductPageSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'Pengaturan Halaman Produk';

    protected static ?string $navigationLabel = 'Pengaturan Hal. Produk';

    public static function form(Schema $schema): Schema
    {
        return ProductPageSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductPageSettingTable::configure($table);
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

        // Singleton: check if setting exists
        return $user?->role === 'superadmin' && ProductPageSetting::count() === 0;
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
            'index' => ListProductPageSettings::route('/'),
            'create' => CreateProductPageSetting::route('/create'),
            'edit' => EditProductPageSetting::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\HomeSetting;

use App\Filament\Resources\HomeSetting\Pages\CreateHomeSetting;
use App\Filament\Resources\HomeSetting\Pages\EditHomeSetting;
use App\Filament\Resources\HomeSetting\Pages\ListHomeSettings;
use App\Filament\Resources\HomeSetting\Schemas\HomeSettingForm;
use App\Filament\Resources\HomeSetting\Tables\HomeSettingTable;
use App\Models\HomeSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class HomeSettingResource extends Resource
{
    protected static ?string $model = HomeSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleGroup;

    protected static ?string $recordTitleAttribute = 'Banner Sekunder Beranda';

    protected static ?string $navigationLabel = 'Banner Sekunder Beranda';

    public static function form(Schema $schema): Schema
    {
        return HomeSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomeSettingTable::configure($table);
    }

    public static function canCreate(): bool
    {
        $user = Auth::user();

        return $user?->role === 'superadmin' && HomeSetting::count() === 0;
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHomeSettings::route('/'),
            'create' => CreateHomeSetting::route('/create'),
            'edit' => EditHomeSetting::route('/{record}/edit'),
        ];
    }
}

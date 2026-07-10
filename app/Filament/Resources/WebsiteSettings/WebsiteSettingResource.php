<?php

namespace App\Filament\Resources\WebsiteSettings;

use App\Filament\Resources\WebsiteSettings\Pages\CreateWebsiteSetting;
use App\Filament\Resources\WebsiteSettings\Pages\EditWebsiteSetting;
use App\Filament\Resources\WebsiteSettings\Pages\ListWebsiteSettings;
use App\Filament\Resources\WebsiteSettings\Schemas\WebsiteSettingForm;
use App\Filament\Resources\WebsiteSettings\Tables\WebsiteSettingsTable;
use App\Models\WebsiteSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class WebsiteSettingResource extends Resource
{
    protected static ?string $model = WebsiteSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $recordTitleAttribute = 'Website Setting';

    public static function form(Schema $schema): Schema
    {
        return WebsiteSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WebsiteSettingsTable::configure($table);
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
            'index' => ListWebsiteSettings::route('/'),
            'create' => CreateWebsiteSetting::route('/create'),
            'edit' => EditWebsiteSetting::route('/{record}/edit'),
        ];
    }
}

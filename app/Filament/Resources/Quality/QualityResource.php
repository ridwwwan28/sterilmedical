<?php

namespace App\Filament\Resources\Quality;

use App\Filament\Resources\Quality\Pages\CreateQuality;
use App\Filament\Resources\Quality\Pages\EditQuality;
use App\Filament\Resources\Quality\Pages\ListQualities;
use App\Filament\Resources\Quality\Schemas\QualityForm;
use App\Filament\Resources\Quality\Tables\QualityTable;
use App\Models\Quality;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class QualityResource extends Resource
{
    protected static ?string $model = Quality::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $recordTitleAttribute = 'Kualitas';

    public static function form(Schema $schema): Schema
    {
        return QualityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QualityTable::configure($table);
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

        // Limit to superadmin and ensure only 1 record exists (Singleton)
        return $user?->role === 'superadmin' && Quality::count() === 0;
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
            'index' => ListQualities::route('/'),
            'create' => CreateQuality::route('/create'),
            'edit' => EditQuality::route('/{record}/edit'),
        ];
    }
}

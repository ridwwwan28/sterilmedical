<?php

namespace App\Filament\Resources\HeroSlide;

use App\Filament\Resources\HeroSlide\Pages\CreateHeroSlide;
use App\Filament\Resources\HeroSlide\Pages\EditHeroSlide;
use App\Filament\Resources\HeroSlide\Pages\ListHeroSlides;
use App\Filament\Resources\HeroSlide\Schemas\HeroSlideForm;
use App\Filament\Resources\HeroSlide\Tables\HeroSlideTable;
use App\Models\HeroSlide;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HeroSlideResource extends Resource
{
    protected static ?string $model = HeroSlide::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationLabel = 'Hero Slide Beranda';

    public static function form(Schema $schema): Schema
    {
        return HeroSlideForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeroSlideTable::configure($table);
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
            'index' => ListHeroSlides::route('/'),
            'create' => CreateHeroSlide::route('/create'),
            'edit' => EditHeroSlide::route('/{record}/edit'),
        ];
    }
}

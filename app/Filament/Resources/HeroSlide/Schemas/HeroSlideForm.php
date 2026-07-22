<?php

namespace App\Filament\Resources\HeroSlide\Schemas;

use Filament\Forms\Components\FileUpload;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeroSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero Slide Banner')
                    ->description('Kelola gambar slider, judul, deskripsi, dan urutan untuk Hero Section beranda.')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gambar Slide')
                            ->image()
                            ->directory('hero-slides')
                            ->required(),
                        TextInput::make('sort_order')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(0)
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Aktif Tampil')
                            ->default(true),
                    ]),
            ]);
    }
}

<?php

namespace App\Filament\Resources\ProductPageSetting\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductPageSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Header Halaman Produk')
                    ->description('Kelola teks judul dan deskripsi yang tampil di bagian atas halaman katalog produk.')
                    ->schema([
                        TextInput::make('header_title')
                            ->label('Judul Header')
                            ->required(),
                        Textarea::make('header_description')
                            ->label('Deskripsi Header')
                            ->rows(3)
                            ->required(),
                    ]),
            ]);
    }
}

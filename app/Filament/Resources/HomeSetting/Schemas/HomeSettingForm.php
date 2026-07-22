<?php

namespace App\Filament\Resources\HomeSetting\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HomeSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Secondary Banner Beranda')
                    ->description('Kelola gambar banner sekunder berukuran penuh yang tampil di bawah Hero Section.')
                    ->schema([
                        FileUpload::make('secondary_banner_image')
                            ->label('Gambar Banner Sekunder')
                            ->image()
                            ->directory('home-settings')
                            ->required(),
                    ]),
            ]);
    }
}

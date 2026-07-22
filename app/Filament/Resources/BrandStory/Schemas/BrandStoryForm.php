<?php

namespace App\Filament\Resources\BrandStory\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BrandStoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Header Section')
                    ->schema([
                        TextInput::make('header_title')
                            ->label('Judul Header')
                            ->required(),
                        Textarea::make('header_description')
                            ->label('Deskripsi Header')
                            ->rows(3)
                            ->required(),
                    ]),

                Section::make('Visi (Brand Vision)')
                    ->schema([
                        FileUpload::make('vision_image')
                            ->label('Gambar Visi')
                            ->disk('public')
                            ->directory('brand-story')
                            ->visibility('public')
                            ->image()
                            ->imagePreviewHeight(80)
                            ->nullable(),
                        TextInput::make('vision_title')
                            ->label('Judul Visi')
                            ->required(),
                        Textarea::make('vision_description')
                            ->label('Deskripsi Visi')
                            ->rows(3)
                            ->required(),
                    ]),

                Section::make('Misi (Brand Mission)')
                    ->schema([
                        FileUpload::make('mission_image')
                            ->label('Gambar Misi')
                            ->disk('public')
                            ->directory('brand-story')
                            ->visibility('public')
                            ->image()
                            ->imagePreviewHeight(80)
                            ->nullable(),
                        TextInput::make('mission_title')
                            ->label('Judul Misi')
                            ->required(),
                        Textarea::make('mission_description')
                            ->label('Deskripsi Misi')
                            ->rows(3)
                            ->required(),
                    ]),

                Section::make('Timeline Perjalanan')
                    ->schema([
                        TextInput::make('timeline_title')
                            ->label('Judul Timeline')
                            ->required(),
                        TextInput::make('timeline_subtitle')
                            ->label('Sub-judul Timeline')
                            ->required(),
                        Repeater::make('timeline_items')
                            ->label('Item Perjalanan')
                            ->schema([
                                TextInput::make('year')
                                    ->label('Tahun')
                                    ->required(),
                                Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->rows(2)
                                    ->required(),
                            ])
                            ->columns(1)
                            ->defaultItems(1)
                            ->reorderable()
                            ->collapsible()
                            ->addActionLabel('Tambah Tahun'),
                    ]),

                Section::make('Persebaran Produk')
                    ->description('Kelola daftar kota beserta titik koordinatnya')
                    ->schema([
                        Repeater::make('product_cities')
                            ->label('Daftar Kota')
                            ->schema([
                                TextInput::make('city')
                                    ->label('Nama Kota')
                                    ->placeholder('Contoh: Jakarta')
                                    ->required(),
                                TextInput::make('latitude')
                                    ->label('Latitude (Garis Lintang)')
                                    ->numeric()
                                    ->placeholder('Contoh: -6.2088')
                                    ->required(),
                                TextInput::make('longitude')
                                    ->label('Longitude (Garis Bujur)')
                                    ->numeric()
                                    ->placeholder('Contoh: 106.8456')
                                    ->required(),
                            ])
                            ->columns(3)
                            ->defaultItems(0)
                            ->reorderable()
                            ->collapsible()
                            ->addActionLabel('Tambah Kota'),
                    ]),
            ]);
    }
}

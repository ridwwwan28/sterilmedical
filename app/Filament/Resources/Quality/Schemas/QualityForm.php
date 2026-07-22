<?php

namespace App\Filament\Resources\Quality\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class QualityForm
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
                        TextInput::make('header_subtitle')
                            ->label('Sub-judul Header')
                            ->required(),
                        Textarea::make('header_description')
                            ->label('Deskripsi Header')
                            ->rows(3)
                            ->required(),
                    ]),

                Section::make('Piagam / Sertifikat')
                    ->schema([
                        FileUpload::make('certificate_image')
                            ->label('Gambar Piagam / Sertifikat')
                            ->disk('public')
                            ->directory('quality')
                            ->visibility('public')
                            ->image()
                            ->imagePreviewHeight(100)
                            ->nullable(),
                    ]),

                Section::make('Statistik Pencapaian')
                    ->description('Kelola data statistik angka pencapaian perusahaan (misal: Berdiri sejak tahun 1998, dll.)')
                    ->schema([
                        Repeater::make('achievements')
                            ->label('Daftar Pencapaian')
                            ->schema([
                                TextInput::make('value')
                                    ->label('Angka / Nilai (Contoh: 1998, 10, 100%)')
                                    ->required(),
                                TextInput::make('label')
                                    ->label('Deskripsi (Contoh: Berdiri sejak tahun, Kota Penyebaran)')
                                    ->required(),
                            ])
                            ->columns(2)
                            ->defaultItems(0)
                            ->reorderable()
                            ->collapsible()
                            ->addActionLabel('Tambah Statistik'),
                    ]),

                Section::make('Info Komunitas')
                    ->schema([
                        TextInput::make('info_title')
                            ->label('Judul Info Komunitas')
                            ->required(),
                        Textarea::make('info_description')
                            ->label('Deskripsi Info Komunitas')
                            ->rows(3)
                            ->required(),
                        FileUpload::make('info_images')
                            ->label('Foto Galeri Grid (Maksimal 4 Foto)')
                            ->disk('public')
                            ->directory('quality/gallery')
                            ->visibility('public')
                            ->image()
                            ->multiple()
                            ->maxFiles(4)
                            ->nullable(),
                    ]),

                Section::make('Partner & Brand (Marquee)')
                    ->description('Kelola daftar logo brand/partner yang berjalan (marquee)')
                    ->schema([
                        Repeater::make('trusted_logos')
                            ->label('Logo Partner')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Gambar Logo')
                                    ->disk('public')
                                    ->directory('quality/logos')
                                    ->visibility('public')
                                    ->image()
                                    ->required(),
                                TextInput::make('alt_text')
                                    ->label('Nama Brand / Alt Text')
                                    ->required(),
                            ])
                            ->columns(2)
                            ->defaultItems(0)
                            ->reorderable()
                            ->collapsible()
                            ->addActionLabel('Tambah Logo'),
                    ]),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Product\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Utama Produk')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Produk')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        TextInput::make('slug')
                            ->label('Slug URL')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Select::make('product_category_id')
                            ->label('Kategori Produk')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->required(),

                        Toggle::make('is_featured')
                            ->label('Produk Unggulan')
                            ->default(false),
                    ])
                    ->columns(2),

                Section::make('Konten & Media')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gambar Produk')
                            ->disk('public')
                            ->directory('products')
                            ->visibility('public')
                            ->image()
                            ->imagePreviewHeight(100)
                            ->required(),

                        Textarea::make('description')
                            ->label('Deskripsi Lengkap')
                            ->rows(5)
                            ->required(),
                    ]),

                Section::make('Spesifikasi Teknis')
                    ->description('Tambahkan daftar spesifikasi teknis produk (misalnya: Tipe, Bahan, Kapasitas, dll.)')
                    ->schema([
                        KeyValue::make('specifications')
                            ->label('Spesifikasi')
                            ->keyLabel('Spesifikasi')
                            ->valueLabel('Detail')
                            ->nullable(),
                    ]),
            ]);
    }
}

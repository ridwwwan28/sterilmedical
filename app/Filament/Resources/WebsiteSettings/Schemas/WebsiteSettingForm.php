<?php

namespace App\Filament\Resources\WebsiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WebsiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('meta_title')
                    ->label('Judul Meta'),

                TextInput::make('copyright')
                    ->label('Copyright'),

                TextInput::make('company_name')
                    ->label('Nama PT')
                    ->nullable(),

                Textarea::make('phone_numbers')
                    ->label('Nomor Telepon (bisa lebih dari satu, pisah dengan baris baru)')
                    ->rows(4)
                    ->nullable(),

                Textarea::make('address')
                    ->label('Alamat')
                    ->rows(5)
                    ->nullable(),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->nullable(),

                TextInput::make('google_map_embed')
                    ->label('Tag Embed Google Map')
                    ->placeholder('https://www.google.com/maps/embed?...')
                    ->nullable(),

                TextInput::make('facebook_url')
                    ->label('Facebook URL')
                    ->nullable(),

                TextInput::make('instagram_url')
                    ->label('Instagram URL')
                    ->nullable(),

                TextInput::make('youtube_url')
                    ->label('YouTube URL')
                    ->nullable(),

                FileUpload::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->directory('logos')
                    ->visibility('public')
                    ->image()
                    ->imagePreviewHeight(80)
                    ->preserveFilenames()
                    ->nullable(),
            ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'header_title',
    'header_subtitle',
    'header_description',
    'certificate_image',
    'achievements',
    'info_title',
    'info_description',
    'info_images',
    'trusted_title',
    'trusted_logos',
])]
class Quality extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'achievements' => 'array',
            'info_images' => 'array',
            'trusted_logos' => 'array',
        ];
    }
}

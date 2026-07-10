<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'header_title',
    'header_description',
    'vision_image',
    'vision_title',
    'vision_description',
    'mission_image',
    'mission_title',
    'mission_description',
    'timeline_title',
    'timeline_subtitle',
    'timeline_items',
])]
class BrandStory extends Model
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'timeline_items' => 'array',
        ];
    }
}

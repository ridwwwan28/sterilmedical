<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'meta_title',
    'copyright',
    'address',
    'logo',
    'company_name',
    'phone_numbers',
    'email',
    'google_map_embed',
    'facebook_url',
    'instagram_url',
    'youtube_url',
])]
class WebsiteSetting extends Model
{
    //
}

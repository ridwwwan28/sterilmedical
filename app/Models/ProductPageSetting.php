<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'header_title',
    'header_description',
])]
class ProductPageSetting extends Model
{
    //
}

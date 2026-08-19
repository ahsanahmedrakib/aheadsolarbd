<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'description', 'service_details', 'image', 'alt', 'icon_name', 'slug', 'images'])]
#[Hidden([])]
class Service extends Model
{
    protected function casts(): array
    {
        return [
            'images' => 'array',
        ];
    }
}
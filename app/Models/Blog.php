<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'category', 'image_url', 'slug', 'content', 'tags', 'date', 'blog_details', 'images'])]
#[Hidden([])]
class Blog extends Model
{
    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'images' => 'array',
        ];
    }
}
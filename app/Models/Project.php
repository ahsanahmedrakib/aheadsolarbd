<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'image_url', 'slug', 'category', 'is_featured', 'client', 'location', 'description', 'project_details', 'images'])]
#[Hidden([])]
class Project extends Model
{
    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'images' => 'array',
        ];
    }
}
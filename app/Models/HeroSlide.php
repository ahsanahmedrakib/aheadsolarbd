<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['tagline', 'title', 'title_accent', 'description', 'background_video', 'site', 'video_url', 'show_video_button', 'is_active', 'order'])]
#[Hidden([])]
class HeroSlide extends Model
{
    protected function casts(): array
    {
        return [
            'show_video_button' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }
}
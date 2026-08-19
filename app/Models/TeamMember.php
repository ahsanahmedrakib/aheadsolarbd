<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'role', 'image', 'bio', 'social_links'])]
#[Hidden([])]
class TeamMember extends Model
{
    protected function casts(): array
    {
        return [
            'social_links' => 'array',
        ];
    }
}
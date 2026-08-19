<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'role', 'rating', 'quote'])]
#[Hidden([])]
class Review extends Model
{
    public const UPDATED_AT = null;

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
        ];
    }
}
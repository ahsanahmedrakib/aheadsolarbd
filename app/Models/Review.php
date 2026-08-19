<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'role', 'rating', 'quote', 'status'])]
#[Hidden([])]
class Review extends Model
{
    public const UPDATED_AT = null;

    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
        ];
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['sections'])]
#[Hidden([])]
class Setting extends Model
{
    protected function casts(): array
    {
        return [
            'sections' => 'array',
        ];
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'email', 'phone', 'subject', 'message', 'status', 'notes'])]
#[Hidden([])]
class ContactQuery extends Model
{
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    public function isPalash(): bool
    {
        return str_contains($this->subject, 'Palash Charging Station');
    }
}
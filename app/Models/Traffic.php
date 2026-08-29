<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

#[Fillable(['date', 'views'])]
#[Hidden([])]
class Traffic extends Model
{
    protected function casts(): array
    {
        return [
            'date' => 'date',
            'views' => 'integer',
        ];
    }

    public static function track(): void
    {
        $today = now()->toDateString();

        \DB::table((new static)->getTable())->upsert(
            ['date' => $today, 'views' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['date'],
            ['views' => \DB::raw('views + 1'), 'updated_at' => now()],
        );
    }

    public static function today(): int
    {
        return self::whereDate('date', today())->value('views') ?? 0;
    }

    public static function total(): int
    {
        return (int) self::sum('views');
    }
}

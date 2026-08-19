<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['full_name', 'business_name', 'mobile', 'whatsapp', 'email', 'district', 'thana', 'address', 'services', 'has_business', 'experience_years', 'space', 'comments', 'status', 'notes', 'raw_message'])]
#[Hidden([])]
class PalashApplication extends Model
{
    protected function casts(): array
    {
        return [
            'services' => 'array',
        ];
    }

    public const SPACE_LABELS = [
        'own' => 'Own Space',
        'rented' => 'Rented Space',
        'looking' => 'Looking for Space',
    ];

    public const SERVICE_LABELS = [
        'charging' => 'Charging Station Network Partner',
        'battery' => 'Lithium Battery Dealership',
        'both' => 'Both',
    ];

    public function spaceLabel(): string
    {
        return self::SPACE_LABELS[$this->space] ?? $this->space;
    }

    public function serviceLabel(string $value): string
    {
        return self::SERVICE_LABELS[$value] ?? $value;
    }

    public function expandedServices(): array
    {
        $expanded = [];
        foreach ((array) $this->services as $value) {
            if ($value === 'both') {
                $expanded[] = 'charging';
                $expanded[] = 'battery';
            } else {
                $expanded[] = $value;
            }
        }
        return array_values(array_unique($expanded));
    }
}
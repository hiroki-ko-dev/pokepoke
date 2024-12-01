<?php

namespace App\Enums;

enum PackType: int
{
    case NORMAL = 1;
    case PROMO = 2;

    public function label(): string
    {
        return match ($this) {
            self::NORMAL => '通常パック',
            self::PROMO => 'プロモパック',
        };
    }
}

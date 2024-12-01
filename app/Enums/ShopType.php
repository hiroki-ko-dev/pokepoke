<?php

declare(strict_types=1);

namespace App\Enums;

enum PackType: int
{
    case Free = 1;
    case Paid = 2;

    public function label(): string
    {
        return match ($this) {
            self::Free => '無料',
            self::Paid => '有料',
        };
    }
}

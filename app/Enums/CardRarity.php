<?php

namespace App\Enums;

enum CardRarity: int
{
    case Diamond1 = 1;
    case Diamond2 = 2;
    case Diamond3 = 3;
    case Diamond4 = 4;
    case Star1 = 5;
    case Star2 = 6;
    case Star3 = 7;
    case Crown = 8;
    case Promo = 9;

    public function label(): string
    {
        return match ($this) {
            self::Diamond1 => 'ダイヤ1',
            self::Diamond2 => 'ダイヤ2',
            self::Diamond3 => 'ダイヤ3',
            self::Diamond4 => 'ダイヤ4',
            self::Star1 => '星1',
            self::Star2 => '星2',
            self::Star3 => '星3',
            self::Crown => 'プロモ',
        };
    }
}

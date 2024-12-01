<?php

namespace App\Enums;

enum CardAcquisitionMethod: int
{
    case PACK = 1;
    case SHOP_EXCHANGE = 2;
    case GET_CHALLENGE = 3;

    public function label(): string
    {
        return match ($this) {
            self::PACK => 'パック開封',
            self::SHOP_EXCHANGE => 'ショップ交換',
            self::GET_CHALLENGE => 'ゲットチャレンジ',
        };
    }
}

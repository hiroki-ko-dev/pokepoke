<?php

namespace App\Enums;

enum CardAcquisitionMethod: int
{
    case PACK_OPENING = 1;
    case PACK_OPENING_POINTS = 2;
    case GET_CHALLENGE = 3;
    case SHOP_EXCHANGE = 4;
    case EVENT_REWARDS = 5;
    case PREMIUM_MISSION = 6;

    public function label(): string
    {
        return match ($this) {
            self::PACK_OPENING => 'パック開封',
            self::PACK_OPENING_POINTS => 'パック開封ポイント交換',
            self::GET_CHALLENGE => 'ゲットチャレンジ',
            self::SHOP_EXCHANGE => 'ショップ交換',
            self::EVENT_REWARDS => 'イベント報酬',
            self::PREMIUM_MISSION => 'プレミアムミッション',
        };
    }
}

<?php

declare(strict_types=1);

namespace App\Enums;

enum CardType: int
{
    case Basic = 1; // たねポケモン
    case Stage1 = 2; // 1進化ポケモン
    case Stage2 = 3; // 2進化ポケモン
    case Supporter = 4;
    case Item = 5;
    case Stadium = 6;

    public function label(): string
    {
        return match ($this) {
            self::Basic => 'たねポケモン',
            self::Stage1 => '1進化ポケモン',
            self::Stage2 => '2進化ポケモン',
            self::Supporter => 'サポート',
            self::Item => 'グッズ',
            self::Stadium => 'スタジアム',
            self::Energy => 'エネルギー',
        };
    }
}

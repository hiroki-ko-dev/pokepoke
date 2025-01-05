<?php

declare(strict_types=1);

namespace App\Enums;

enum PokemonType: int
{
    case Grass = 1;
    case Fire = 2;
    case Water = 3;
    case Lightning = 4;
    case Psychic = 5;
    case Fighting = 6;
    case Dark = 7;
    case Steel = 8;
    case Dragon = 9;
    case Colorless = 10;

    public function label(): string
    {
        return match ($this) {
            self::Grass => '草',
            self::Fire => '炎',
            self::Water => '水',
            self::Lightning => '雷',
            self::Psychic => '超',
            self::Fighting => '闘',
            self::Dark => '悪',
            self::Steel => '鋼',
            self::Dragon => 'ドラゴン',
            self::Colorless => '無色',
        };
    }

    public static function toArray(): array
    {
        return array_reduce(self::cases(), function ($result, $case) {
            $result[$case->value] = $case->label();
            return $result;
        }, []);
    }
}

<?php

declare(strict_types=1);

namespace App\Enums;

enum CardRule: int
{
    case Normal = 1;
    case ex = 2;

    public function label(): string
    {
        return match ($this) {
            self::Normal => '通常',
            self::ex => 'ex',
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

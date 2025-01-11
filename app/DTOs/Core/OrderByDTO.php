<?php

declare(strict_types=1);

namespace App\DTOs\Core;

final class OrderByDTO
{
    public function __construct(
        public ?string $columnName = 'id',
        public bool $isDescending = false,
    ) {
    }

    public function getOrderDirection(): string
    {
        return $this->isDescending ? 'desc' : 'asc';
    }
}

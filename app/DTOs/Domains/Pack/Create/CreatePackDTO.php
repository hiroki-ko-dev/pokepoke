<?php

declare(strict_types=1);

namespace App\DTOs\Domains\Pack\Create;

final class CreatePackDTO
{
    public function __construct(
        public string $name,
        public string $symbol,
        public int $type,
        public string $imageUrl,
    ) {
    }
}

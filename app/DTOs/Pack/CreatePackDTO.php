<?php

namespace App\DTOs\Pack;

class CreatePackDTO
{
    public function __construct(
        public string $name,
        public string $symbol,
        public int $type,
        public string $imageUrl,
    ) {
    }
}

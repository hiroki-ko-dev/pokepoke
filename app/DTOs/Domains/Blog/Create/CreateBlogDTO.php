<?php

declare(strict_types=1);

namespace App\DTOs\Domains\Blog\Create;

final class CreateBlogDTO
{
    public function __construct(
        public string $name,
        public int $packId,
        public int $number,
        public int $cardTypeId,
        public int $cardRarityId,
        public int $cardRuleId,
        public int $cardAcquisitionMethodId,
        public string $imageUrl,
        public int $pokemonTypeId,
    ) {
    }
}

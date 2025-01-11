<?php

declare(strict_types=1);

namespace App\DTOs\Domains\Blog\Criteria;

use App\DTOs\Core\OrderByDTO;

final class CriteriaBlogsDTO
{
    public function __construct(
        public ?string $name = null,
        public ?int $packId = null,
        public ?int $cardTypeId = null,
        public ?int $cardRarityId = null,
        public ?int $cardRuleId = null,
        public ?int $cardAcquisitionMethodId = null,
        public ?string $imageUrl = null,
        public ?int $pokemonTypeId = null,
        public ?OrderByDTO $orderByDTO = null,
    ) {
    }
}

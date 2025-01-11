<?php

declare(strict_types=1);

namespace App\DTOs\Domains\Pack\Criteria;

use App\DTOs\Core\OrderByDTO;

final class CriteriaPacksDTO
{
    public function __construct(
        public ?OrderByDTO $orderByDTO = null,
    ) {
    }
}

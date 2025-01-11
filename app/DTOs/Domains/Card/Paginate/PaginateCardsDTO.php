<?php

declare(strict_types=1);

namespace App\DTOs\Domains\Card\Paginate;

use App\DTOs\Domains\Card\Criteria\CriteriaCardsDTO;

final class PaginateCardsDTO
{
    public function __construct(
        public CriteriaCardsDTO $criteriaCardsDTO,
        public int $page, //現在のページ
        public int $perPage, //1ページ当たりの件数
    ) {
    }
}

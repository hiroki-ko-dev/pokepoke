<?php

declare(strict_types=1);

namespace App\DTOs\Domains\Blog\Paginate;

use App\DTOs\Domains\Blog\Criteria\CriteriaBlogsDTO;

final class PaginateBlogsDTO
{
    public function __construct(
        public CriteriaBlogsDTO $criteriaBlogsDTO,
        public int $page, //現在のページ
        public int $perPage, //1ページ当たりの件数
    ) {
    }
}

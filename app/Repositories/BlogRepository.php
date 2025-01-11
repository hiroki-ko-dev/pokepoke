<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Blog;
use App\DTOs\Domains\blog\Criteria\CriteriaBlogsDTO;
use App\DTOs\Domains\blog\Create\CreateBlogDTO;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

final class BlogRepository
{
    public function create(CreateBlogDTO $dto): Blog
    {
        $blog = new Blog();
        $blog->name = $dto->name;
        $blog->symbol = $dto->symbol;
        $blog->type = $dto->type;
        $blog->image_url = $dto->imageUrl;
        $blog->save();
        return $blog;
    }

    public function findAll(): Collection
    {
        return Blog::get();
    }

    public function buildWhereClause(CriteriaBlogsDTO $dto): Builder
    {
        $blog = Blog::query();
        if ($dto->orderByDTO) {
            $blog->orderBy(
                $dto->orderByDTO->columnName,
                $dto->orderByDTO->getOrderDirection(),
            );
        }
        return $blog;
    }

    public function findByCriteria(CriteriaBlogsDTO $dto): Collection
    {
        $blog = $this->buildWhereClause($dto);
        return $blog->get();
    }
}

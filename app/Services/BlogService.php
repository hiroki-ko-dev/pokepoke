<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Blog;
use App\Repositories\BlogRepository;
use App\DTOs\Domains\Blog\Criteria\CriteriaBlogsDTO;
use App\DTOs\Domains\Blog\Create\CreateBlogDTO;
use Illuminate\Support\Collection;

final class BlogService
{
    public function __construct(
        public readonly BlogRepository $blogRepository
    ) {
    }

    public function getBlogs(CriteriaBlogsDTO $dto): Collection
    {
        return $this->blogRepository->findByCriteria($dto);
    }

    public function createBlog(CreateBlogDTO $dto): Blog
    {
        return $this->blogRepository->create($dto);
    }
}

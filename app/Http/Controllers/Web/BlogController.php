<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\BlogService;
use App\DTOs\Core\OrderByDTO;
use App\DTOs\Domains\Blog\Criteria\CriteriaBlogsDTO;
use App\DTOs\Domains\Blog\Create\CreateBlogDTO;
use Illuminate\Http\Request;

final class BlogController extends Controller
{
    public function __construct(
        public readonly BlogService $blogService
    ) {
    }

    public function index()
    {
        $packs = $this->blogService->getBlogs(
            new CriteriaBlogsDTO(
                orderByDTO: new OrderByDTO(
                    isDescending: true,
                )
            )
        );
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $this->packService->createPack(
            new CreateBlogDTO(
                name: $request->input('name'),
                symbol: $request->input('symbol'),
                type: (int)$request->input('type'),
                imageUrl: $request->input('imageUrl'),
            )
        );
        return view('packs.create');
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\PackService;
use App\DTOs\Pack\CreatePackDTO;
use Illuminate\Http\Request;

final class PackController extends Controller
{
    public function __construct(
        public readonly PackService $packService
    ) {
    }

    public function index()
    {
        $packs = $this->packService->getPacks();
        return view('packs.index', compact('packs'));
    }

    public function create()
    {
        return view('packs.create');
    }

    public function store(Request $request)
    {
        $this->packService->createPack(
            new CreatePackDTO(
                name: $request->input('name'),
                symbol: $request->input('symbol'),
                type: (int)$request->input('type'),
                imageUrl: $request->input('imageUrl'),
            )
        );
        return view('packs.create');
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Pack\PackService;

final class PackController extends Controller
{
    public function __construct(
        public readonly PackService $packService
    ) {
    }

    public function index()
    {
        return view('packs.create');
    }

    public function create()
    {
        return view('packs.create');
    }

    public function store()
    {
        return view('packs.create');
    }
}

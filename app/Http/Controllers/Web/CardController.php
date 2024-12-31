<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\CardService;
use Exception;

final class CardController extends Controller
{
    public function __construct(
        public readonly CardService $cardService
    ) {
    }

    public function index()
    {
        try {
            $images = $this->cardService->getAllJpgImages();
            return view('images.index', [
                'images' => $images,
            ]);
        } catch (Exception $e) {
            return view('images.error', [
                'message' => 'Failed to retrieve images.',
                'error' => $e->getMessage(),
            ]);
        }
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Exception;

final class ImageController extends Controller
{
    public function __construct(
        public readonly ImageService $imageService
    ) {
    }

    public function index()
    {
        try {
            $images = $this->imageService->getAllJpgImages();

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

<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Card;
use App\Repositories\CardRepository;

final class CardService
{
    public function __construct(
        public readonly CardRepository $cardRepository
    ) {
    }

    public function getAllJpgImages(): array
    {
        $directory = public_path('assets/images/cards');
        return $this->getFilesRecursively($directory);
    }

    public function getNotRegisteredImages(): array
    {
        $directory = public_path('assets/images/cards');
        $images = $this->getFilesRecursively($directory);
        $registeredImages = $this->cardRepository->findAll()->pluck('image_url')->toArray();
        $notRegisteredImages = array_filter($images, function ($image) use ($registeredImages) {
            return !in_array(basename($image), $registeredImages);
        });

        return $notRegisteredImages;
    }

    private function getFilesRecursively(string $directory): array
    {
        $jpgFiles = [];

        if (is_dir($directory)) {
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($directory));
            foreach ($files as $file) {
                if ($file->isFile() && preg_match('/\.jpg$/i', $file->getFilename())) {
                    // public_pathを削除してURL形式に変換
                    $jpgFiles[] = str_replace(public_path(), '', $file->getPathname());
                }
            }
        }

        return $jpgFiles;
    }
}

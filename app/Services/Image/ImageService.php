<?php

declare(strict_types=1);

namespace App\Services\Image;

final class ImageService
{
    public function getAllJpgImages(): array
    {
        $directory = public_path('assets/images/cards');
        return $this->getFilesRecursively($directory);
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

<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\CardRepository;
use App\Repositories\PackRepository;
use App\Enums\CardRarity;
use App\Enums\CardType;
use App\Enums\CardRule;
use App\Enums\PokemonType;
use App\DTOs\Card\Create\CreateCardDTO;
use App\Models\Card;

final class CardService
{
    public function __construct(
        public readonly CardRepository $cardRepository,
        public readonly PackRepository $packRepository
    ) {
    }

    public function createCard(CreateCardDTO $dto): Card
    {
        $dto->imageUrl = config('app.url') . $dto->imageUrl;
        $dto->number = (function ($imageUrl) {
            $parts = explode('/', $imageUrl); // スラッシュで分割して配列化
            $filename = array_pop($parts); // 最後の要素（ファイル名）を取得
            $numberParts = explode('-', $filename, 3); // 最初の2つのハイフンで分割
            return (int)$numberParts[1]; // 2番目の部分を返す
        })($dto->imageUrl);
        return $this->cardRepository->create($dto);
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

    public function getCreateConditions(): array
    {
        $conditions['packs'] = $this->packRepository->findAllOrderByDesc()->pluck('name', 'id');
        $conditions['cardRarities'] = CardRarity::toArray();
        $conditions['cardTypes'] = CardType::toArray();
        $conditions['cardRules'] = CardRule::toArray();
        $conditions['pokemonTypes'] = PokemonType::toArray();

        return $conditions;
    }
}

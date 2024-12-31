<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Pack;
use App\Repositories\PackRepository;
use App\DTOs\Pack\CreatePackDTO;
use Illuminate\Support\Collection;

final class PackService
{
    public function __construct(
        public readonly PackRepository $packRepository
    ) {
    }

    public function getPacks(): Collection
    {
        return $this->packRepository->findAll();
    }

    public function createPack(CreatePackDTO $dto): Pack
    {
        return $this->packRepository->create($dto);
    }
}

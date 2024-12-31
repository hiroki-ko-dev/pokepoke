<?php

declare(strict_types=1);

namespace App\Services\Pack;

use App\Repositories\PackRepository;

final class PackService
{
    public function __construct(
        public readonly PackRepository $packRepository
    ) {
    }

    public function createPack(): array
    {
        return $this->packRepository->create();
    }
}

<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Pack;
use App\Repositories\PackRepository;
use App\DTOs\Domains\Pack\Criteria\CriteriaPacksDTO;
use App\DTOs\Domains\Pack\Create\CreatePackDTO;
use Illuminate\Support\Collection;

final class PackService
{
    public function __construct(
        public readonly PackRepository $packRepository
    ) {
    }

    public function getPacks(CriteriaPacksDTO $dto): Collection
    {
        return $this->packRepository->findByCriteria($dto);
    }

    public function createPack(CreatePackDTO $dto): Pack
    {
        return $this->packRepository->create($dto);
    }
}

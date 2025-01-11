<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Pack;
use App\DTOs\Domains\Pack\Criteria\CriteriaPacksDTO;
use App\DTOs\Domains\Pack\Create\CreatePackDTO;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

final class PackRepository
{
    public function create(CreatePackDTO $dto): Pack
    {
        $pack = new Pack();
        $pack->name = $dto->name;
        $pack->symbol = $dto->symbol;
        $pack->type = $dto->type;
        $pack->image_url = $dto->imageUrl;
        $pack->save();
        return $pack;
    }

    public function findAll(): Collection
    {
        return Pack::get();
    }

    public function buildWhereClause(CriteriaPacksDTO $dto): Builder
    {
        $pack = Pack::query();
        if ($dto->orderByDTO) {
            $pack->orderBy(
                $dto->orderByDTO->columnName,
                $dto->orderByDTO->getOrderDirection(),
            );
        }
        return $pack;
    }

    public function findByCriteria(CriteriaPacksDTO $dto): Collection
    {
        $pack = $this->buildWhereClause($dto);
        return $pack->get();
    }
}

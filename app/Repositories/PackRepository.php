<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Pack;
use App\DTOs\Pack\CreatePackDTO;
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

    public function buildWhereClause(): Builder
    {
        $pack = Pack::query();
        return $pack；
    }

    public function findAll(): Collection
    {
        $pack = $this->buildWhereClause();
        return $pack->get();
    }

    public function findAllOrderByDesc(): Collection
    {
        $pack = $this->buildWhereClause();
        $pack->orderBy('created_at', 'desc');
        return $pack->get();
    }
}

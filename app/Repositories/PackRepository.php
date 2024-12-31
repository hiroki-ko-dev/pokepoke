<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Pack;
use App\DTOs\Pack\CreatePackDTO;
use Illuminate\Support\Collection;

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
        $pack = Pack::query();
        return $pack->get();
    }
}

<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Card;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;

final class CardRepository
{
    public function buildWhereClause(): Builder
    {
        $card = Card::query();
        return $card;
    }

    public function findAll(): Collection
    {
        $card = $this->buildWhereClause();
        return $card->get();
    }

    public function findAllOrderByDesc(): Collection
    {
        $card = $this->buildWhereClause();
        $card->orderByDesc('id');
        return $card->get();
    }
}

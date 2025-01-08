<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Card;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\DTOs\Card\Create\CreateCardDTO;

final class CardRepository
{
    public function buildSaveClause(Card $card, CreateCardDTO $dto): Card
    {
        $card->name = $dto->name;
        $card->pack_id = $dto->packId;
        $card->number = $dto->number;
        $card->pokemon_type_id = $dto->pokemonTypeId;
        $card->card_type_id = $dto->cardTypeId;
        $card->card_rarity_id = $dto->cardRarityId;
        $card->card_rule_id = $dto->cardRuleId;
        $card->card_acquisition_method_id = $dto->cardAcquisitionMethodId;
        $card->image_url = $dto->imageUrl;
        $card->save();
        return $card;
    }

    public function create(CreateCardDTO $dto): Card
    {
        $card = new Card();
        return $this->buildSaveClause($card, $dto);
    }

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

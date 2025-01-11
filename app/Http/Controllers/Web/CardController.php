<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\CardService;
use Exception;
use App\DTOs\Domains\Card\Paginate\PaginateCardsDTO;
use App\DTOs\Domains\Card\Criteria\CriteriaCardsDTO;

final class CardController extends Controller
{
    public function __construct(
        public readonly CardService $cardService
    ) {
    }

    public function index()
    {
        try {
            $cards = $this->cardService->paginateCards(
                new PaginateCardsDTO(
                    criteriaCardsDTO: new CriteriaCardsDTO(),
                    page: 1,
                    perPage: 100,
                )
            );
            return view('cards.index', [
                'cards' => $cards,
            ]);
        } catch (Exception $e) {
            return view('cards.error', [
                'message' => 'Failed to retrieve cards.',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function create()
    {
        try {
            $cards = $this->cardService->getNotRegisteredImages();
            $conditions = $this->cardService->getCreateConditions();
            return view('cards.create', [
                'cards' => $cards,
                'conditions' => $conditions,
            ]);
        } catch (Exception $e) {
            return view('cards.error', [
                'message' => 'Failed to retrieve cards.',
                'error' => $e->getMessage(),
            ]);
        }
    }
}

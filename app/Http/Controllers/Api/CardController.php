<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CardService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use App\DTOs\Domains\Card\Create\CreateCardDTO;
use App\Enums\CardAcquisitionMethod;

final class CardController extends Controller
{
    public function __construct(
        public readonly CardService $cardService,
        private readonly Logger $logger // DIでLoggerを取得
    ) {
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $cards = $this->cardService->createCard(
                new CreateCardDTO(
                    name: $request->input('name'),
                    packId: (int) $request->input('packId'),
                    number: (int) $request->input('number'),
                    pokemonTypeId: (int) $request->input('pokemonTypeId'),
                    cardTypeId: (int) $request->input('cardTypeId'),
                    cardRarityId: (int) $request->input('cardRarityId'),
                    cardRuleId: (int) $request->input('cardRuleId'),
                    cardAcquisitionMethodId: CardAcquisitionMethod::PACK->value,
                    imageUrl: (string) $request->input('imageUrl')
                )
            );

            return response()->json([
                'success' => true,
                'message' => 'Card created successfully.',
                'data' => $cards,
            ], 201); // 201 Created
        } catch (Exception $e) {
            $this->logger->error('Error creating card: ' . $e->getMessage(), [
                'exception' => $e,
                'request_data' => $request->all(),
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to create card.',
                'error' => $e->getMessage(),
            ], 500); // 500 Internal Server Error
        }
    }
}

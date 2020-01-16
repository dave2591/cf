<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\CurrencyFair\Service\CreateTransactionService;
use App\Http\Requests\CreateTransactionRequest;
use Illuminate\Http\Response;

class CreateTransactionAction extends BaseAction
{
    /** @var CreateTransactionService */
    private CreateTransactionService $service;

    /**
     * @param CreateTransactionService $service
     */
    public function __construct(CreateTransactionService $service)
    {
        $this->service = $service;
    }

    /**
     * @param CreateTransactionRequest $request
     * @return Response
     */
    public function __invoke(CreateTransactionRequest $request): Response
    {
        $transaction = $this->service->execute($request->all());

        return $this->createdResponse($transaction->transform());
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Actions;

use App\CurrencyFair\Repositories\Interfaces\TransactionRepositoryInterface;
use Illuminate\Http\Request;

class GetTransactionsAction extends BaseAction
{
    /** @var TransactionRepositoryInterface */
    private TransactionRepositoryInterface $transactionRepository;

    /**
     * @param TransactionRepositoryInterface $transactionRepository
     */
    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return $this->collectionResponse($this->transactionRepository->all());
    }
}
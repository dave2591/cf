<?php

declare(strict_types=1);

namespace App\CurrencyFair\Service;

use App\CurrencyFair\DomainObjects\DomainObjectInterface;
use App\CurrencyFair\DomainObjects\TransactionDomainObject;
use App\CurrencyFair\Repositories\Interfaces\TransactionRepositoryInterface;

class CreateTransactionService
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
     * @param array $transactionData
     * @return TransactionDomainObject|DomainObjectInterface
     */
    public function execute(array $transactionData): DomainObjectInterface
    {
        /**
         * In a real app do some data manipulation, publish to a MQ etc.
         */

        return $this->transactionRepository->create([
            'user_id' => $transactionData['userId'],
            'currency_from' => $transactionData['currencyFrom'],
            'currency_to' => $transactionData['currencyTo'],
            'rate' => $transactionData['rate'],
            'originating_country' => $transactionData['originatingCountry'],
            'time_placed' => $transactionData['timePlaced'],
            'amount_sell' => $transactionData['amountSell'],
            'amount_buy' => $transactionData['amountBuy']
        ]);
    }
}

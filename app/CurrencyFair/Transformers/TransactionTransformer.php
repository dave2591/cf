<?php

declare(strict_types=1);

namespace App\CurrencyFair\Transformers;

use App\CurrencyFair\DomainObjects\DomainObjectInterface;
use App\CurrencyFair\DomainObjects\TransactionDomainObject;
use Carbon\Carbon;
use Exception;

class TransactionTransformer implements TransformerInterface
{
    /**
     * @param DomainObjectInterface|TransactionDomainObject $domainObject
     * @return array
     *
     * @throws Exception
     */
    public function transform(DomainObjectInterface $domainObject): array
    {
        return [
            'id' => $domainObject->getId(),
            'user_id' => $domainObject->getUserId(),
            'currency_to' => $domainObject->getCurrencyTo(),
            'currency_from' => $domainObject->getCurrencyFrom(),
            'rate' => $domainObject->getRate(),
            'amount_sell' => $domainObject->getAmountSell(),
            'amount_buy' => $domainObject->getAmountBuy(),
            'time_placed' => (new Carbon($domainObject->getTimePlaced()))->toDateTimeString(),
            'originating_country' => $domainObject->getOriginatingCountry()
        ];
    }
}

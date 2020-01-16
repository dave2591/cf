<?php

declare(strict_types=1);

namespace App\CurrencyFair\Repositories\Interfaces;

use App\CurrencyFair\DomainObjects\DomainObjectInterface;
use DateTime;

interface TransactionRepositoryInterface extends RepositoryInterface
{

    /**
     * example repo method
     *
     * @param DateTime $dateTime
     * @return DomainObjectInterface|null
     */
    public function findByDate(DateTime $dateTime): ?DomainObjectInterface;
}

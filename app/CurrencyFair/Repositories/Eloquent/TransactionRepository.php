<?php

declare(strict_types=1);

namespace App\CurrencyFair\Repositories\Eloquent;

use App\CurrencyFair\DomainObjects\DomainObjectInterface;
use App\CurrencyFair\DomainObjects\TransactionDomainObject;
use App\CurrencyFair\Models\Transaction;
use App\CurrencyFair\Repositories\Interfaces\TransactionRepositoryInterface;
use DateTime;

class TransactionRepository extends BaseRepository implements TransactionRepositoryInterface
{
    /**
     * Return the FQCL of the domain object associated with this repository
     *
     * @return string
     */
    public function getDomainObject(): string
    {
        return TransactionDomainObject::class;
    }

    /**
     * Example repo method
     *
     * @param DateTime $dateTime
     * @return DomainObjectInterface|null
     */
    public function findByDate(DateTime $dateTime): ?DomainObjectInterface
    {
        return new TransactionDomainObject();
    }

    /**
     * Returns a FQCL of the model
     *
     * @return string
     */
    protected function getModel(): string
    {
        return Transaction::class;
    }
}

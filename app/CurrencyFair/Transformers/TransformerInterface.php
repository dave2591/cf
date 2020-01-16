<?php

namespace App\CurrencyFair\Transformers;

use App\CurrencyFair\DomainObjects\DomainObjectInterface;

interface TransformerInterface
{
    /**
     * @param DomainObjectInterface $domainObject
     * @return array
     */
    public function transform(DomainObjectInterface $domainObject): array;
}

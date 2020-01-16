<?php

namespace App\CurrencyFair\DomainObjects;

use App\CurrencyFair\Transformers\TransformerInterface;

interface DomainObjectInterface
{
    /**
     * @return TransformerInterface
     */
    public function getTransformer(): TransformerInterface;
}

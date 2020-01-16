<?php

declare(strict_types=1);

namespace App\CurrencyFair\DomainObjects;

abstract class BaseDomainObject implements DomainObjectInterface
{
    /**
     * @return array
     */
    public function transform(): array
    {
        return $this->getTransformer()->transform($this);
    }
}

<?php

declare(strict_types=1);

namespace App\CurrencyFair\Transformers;

use Illuminate\Support\Collection;

class Transformer
{
    /**
     * @param Collection $collection
     * @return array
     */
    public static function transformCollection(Collection $collection)
    {
        return [
            'data' => $collection->map(fn ($domainObject) => $domainObject->transform())
        ];
    }
}
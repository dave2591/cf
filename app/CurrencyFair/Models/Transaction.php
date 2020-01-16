<?php

declare(strict_types=1);

namespace App\CurrencyFair\Models;

class Transaction extends BaseModel
{
    /**
     * Set fillable model properties in order to prevent
     * mass assignment vulnerabilities
     *
     * @return array
     */
    protected function getFillableProperites(): array
    {
        return [
            'user_id',
            'currency_from',
            'currency_to',
            'amount_sell',
            'amount_buy',
            'rate',
            'time_placed',
            'originating_country'
        ];
    }

    /**
     * Get array of what properties should be cast to types
     *
     * @return array
     */
    protected function getCastsMap(): array
    {
        return [
            'user_id' => 'integer',
            'amount_sell' => 'float',
            'amount_buy' => 'float',
            'rate' => 'float'
        ];
    }
}

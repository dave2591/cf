<?php

declare(strict_types=1);

namespace App\CurrencyFair\Validators;

class TransactionValidator extends BaseValidator
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'userId' => 'required',
            'currencyFrom' => 'required',
            'currencyTo' => 'required',
            'amountSell' => 'required',
            'amountBuy' => 'required',
            'rate' => 'required',
            'timePlaced' => 'required',
            'originatingCountry' => 'required'
        ];
    }
}

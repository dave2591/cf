<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\CurrencyFair\Validators\TransactionValidator;
use Illuminate\Foundation\Http\FormRequest;

class CreateTransactionRequest extends FormRequest
{
    /**
     * @param TransactionValidator $validator
     * @return array
     */
    public function rules(TransactionValidator $validator)
    {
        return $validator->rules();
    }
}

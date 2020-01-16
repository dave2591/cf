<?php

declare(strict_types=1);

namespace App\CurrencyFair\Validators;

use Illuminate\Validation\Factory;

abstract class BaseValidator implements ValidatorInterface
{
    /** @var Factory */
    protected Factory $validator;

    /**
     * @param Factory $validator
     */
    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }
}

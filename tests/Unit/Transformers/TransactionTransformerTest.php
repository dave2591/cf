<?php

namespace Tests\Unit\Transformers;

use App\CurrencyFair\DomainObjects\TransactionDomainObject;
use App\CurrencyFair\Transformers\TransactionTransformer;
use Tests\TestCase;
use TypeError;

class TransactionTransformerTest extends TestCase
{
    /** @var TransactionTransformer */
    private TransactionTransformer $transformer;

    /** @var TransactionDomainObject|\Mockery\LegacyMockInterface|\Mockery\MockInterface */
    private TransactionDomainObject $transactionDomainObject;

    public function setUp(): void
    {
        parent::setUp();

        $this->transformer = new TransactionTransformer();
        $this->transactionDomainObject = \Mockery::mock(TransactionDomainObject::class);
    }

    public function testTransformerCallsDomainObject()
    {
        $methods = [
            'getId',
            'getUserId',
            'getCurrencyTo',
            'getCurrencyFrom',
            'getRate',
            'getAmountBuy',
            'getAmountSell',
            'getOriginatingCountry',
            'getTimePlaced'
        ];

        foreach ($methods as $method) {
            $this->transactionDomainObject->shouldReceive($method);
        }

        $this->transformer->transform($this->transactionDomainObject);
    }

    public function testTransformerFailsWithIncorrectInput()
    {
        $this->expectException(TypeError::class);
        $this->transformer->transform('bad input');
    }
}
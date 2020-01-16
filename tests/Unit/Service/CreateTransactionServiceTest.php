<?php

declare(strict_types=1);

namespace Tests\Unit\Service;

use App\CurrencyFair\DomainObjects\DomainObjectInterface;
use App\CurrencyFair\DomainObjects\TransactionDomainObject;
use App\CurrencyFair\Repositories\Interfaces\TransactionRepositoryInterface;
use App\CurrencyFair\Service\CreateTransactionService;
use ErrorException;
use Mockery;
use Mockery\LegacyMockInterface;
use Mockery\MockInterface;
use Tests\TestCase;

class CreateTransactionServiceTest extends TestCase
{
    /** @var TransactionRepositoryInterface|LegacyMockInterface|MockInterface */
    private TransactionRepositoryInterface $transactionRepository;

    /** @var CreateTransactionService */
    private CreateTransactionService $service;

    /** @var array */
    private array $testInput = [
        'userId' => 123,
        'currencyFrom' => 'EUR',
        'currencyTo' => 'USD',
        'rate' => 1.5,
        'originatingCountry' => 'IE',
        'timePlaced' => '2018-01-24 10:27:44',
        'amountSell' => 100,
        'amountBuy' => 50
    ];

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->transactionRepository = Mockery::mock(TransactionRepositoryInterface::class);
        $this->service = new CreateTransactionService($this->transactionRepository);
    }

    public function testTransactionRepositoryIsCalled(): void
    {
        $this->transactionRepository
            ->shouldReceive('create', $this->testInput);

        $this->service->execute($this->testInput);
    }

    public function testServiceReturnsCorrectData(): void
    {
        $outputData = (new TransactionDomainObject())->setUserId(123);

        $this->transactionRepository
            ->shouldReceive('create', $this->testInput)
            ->andReturn($outputData);

        $actualResponse = $this->service->execute($this->testInput);

        $this->assertTrue($actualResponse instanceof DomainObjectInterface);
        $this->assertSame($actualResponse, $outputData);
    }

    public function testServiceFailsWithInvalidData(): void
    {
        $this->expectException(ErrorException::class);
        $this->service->execute(['not' => 'valid']);
    }
}
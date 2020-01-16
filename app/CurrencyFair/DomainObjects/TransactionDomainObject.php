<?php

declare(strict_types=1);

namespace App\CurrencyFair\DomainObjects;

use App\CurrencyFair\Transformers\TransactionTransformer;
use App\CurrencyFair\Transformers\TransformerInterface;

class TransactionDomainObject extends BaseDomainObject
{
    /** @var int */
    private int $id;

    /** @var int */
    private int $userId;

    /** @var string */
    private string $currencyFrom;

    /** @var string */
    private string $currencyTo;

    /** @var float */
    private float $amountSell;

    /** @var float */
    private float $amountBuy;

    /** @var float */
    private float $rate;

    /** @var string */
    private string $timePlaced;

    /** @var string */
    private string $originatingCountry;

    /**
     * @return TransformerInterface
     */
    public function getTransformer(): TransformerInterface
    {
        return new TransactionTransformer();
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return TransactionDomainObject
     */
    public function setUserId(int $userId): TransactionDomainObject
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyFrom(): string
    {
        return $this->currencyFrom;
    }

    /**
     * @param string $currencyFrom
     * @return TransactionDomainObject
     */
    public function setCurrencyFrom(string $currencyFrom): TransactionDomainObject
    {
        $this->currencyFrom = $currencyFrom;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyTo(): string
    {
        return $this->currencyTo;
    }

    /**
     * @param string $currencyTo
     * @return TransactionDomainObject
     */
    public function setCurrencyTo(string $currencyTo): TransactionDomainObject
    {
        $this->currencyTo = $currencyTo;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountSell(): float
    {
        return $this->amountSell;
    }

    /**
     * @param float $amountSell
     * @return TransactionDomainObject
     */
    public function setAmountSell(float $amountSell): TransactionDomainObject
    {
        $this->amountSell = $amountSell;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountBuy(): float
    {
        return $this->amountBuy;
    }

    /**
     * @param float $amountBuy
     * @return TransactionDomainObject
     */
    public function setAmountBuy(float $amountBuy): TransactionDomainObject
    {
        $this->amountBuy = $amountBuy;
        return $this;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     * @return TransactionDomainObject
     */
    public function setRate(float $rate): TransactionDomainObject
    {
        $this->rate = $rate;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimePlaced(): string
    {
        return $this->timePlaced;
    }

    /**
     * @param string $timePlaced
     * @return TransactionDomainObject
     */
    public function setTimePlaced(string $timePlaced): TransactionDomainObject
    {
        $this->timePlaced = $timePlaced;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginatingCountry(): string
    {
        return $this->originatingCountry;
    }

    /**
     * @param string $originatingCountry
     * @return TransactionDomainObject
     */
    public function setOriginatingCountry(string $originatingCountry): TransactionDomainObject
    {
        $this->originatingCountry = $originatingCountry;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return TransactionDomainObject
     */
    public function setId(int $id): TransactionDomainObject
    {
        $this->id = $id;
        return $this;
    }
}

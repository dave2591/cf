<?php

namespace App\CurrencyFair\Repositories\Interfaces;

use App\CurrencyFair\DomainObjects\DomainObjectInterface;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    /** @var array */
    public const DEFAULT_COLUMNS = ['*'];

    /**
     * Return the FQCL of the domain object associated with this repository
     *
     * @return string
     */
    public function getDomainObject(): string;

    /**
     * @param array $attributes
     * @return DomainObjectInterface
     */
    public function create(array $attributes): DomainObjectInterface;

    /**
     * Return all rows from DB
     *
     * @param array $columns
     * @return Collection
     */
    public function all(array $columns = self::DEFAULT_COLUMNS): Collection;
}

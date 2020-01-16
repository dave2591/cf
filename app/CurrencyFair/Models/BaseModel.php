<?php

declare(strict_types=1);

namespace App\CurrencyFair\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->fillable = $this->getFillableProperites();
        $this->casts = $this->getCastsMap();

        parent::__construct($attributes);
    }

    /**
     * Force child models to set fillable model properties in order to prevent
     * mass assignment vulnerabilities
     *
     * @return array
     */
    abstract protected function getFillableProperites(): array;

    /**
     * Get array of what properties should be cast
     *
     * @return array
     */
    abstract protected function getCastsMap(): array;
}

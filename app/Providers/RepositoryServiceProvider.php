<?php

declare(strict_types=1);

namespace App\Providers;

use App\CurrencyFair\Repositories\Eloquent\TransactionRepository;
use App\CurrencyFair\Repositories\Interfaces\TransactionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @reuturn void
     */
    public function register()
    {
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
    }
}

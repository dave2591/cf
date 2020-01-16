<?php

use App\Http\Actions\CreateTransactionAction;
use App\Http\Actions\GetTransactionsAction;
use Illuminate\Routing\Router;

/** @var Router|Router $router */
$router = app()->get('router');

$router->get('/transactions', GetTransactionsAction::class);
$router->post('/transactions', CreateTransactionAction::class);

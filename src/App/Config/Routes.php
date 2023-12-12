<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{
  HomeController,
  AboutController,
  RegisterController,
  TransactionController
};
use App\Middleware\{
  AuthRequiredMiddleware,
  GuestOnlyMiddleware
};

function registerRoutes(App $app)
{
  $app->get('/', [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class);
  $app->get('/about', [AboutController::class, 'about']);
  $app->get('/register', [RegisterController::class, 'register'])->add(GuestOnlyMiddleware::class);
  $app->post('/register', [RegisterController::class, 'registerPost'])->add(GuestOnlyMiddleware::class);
  $app->get('/login', [RegisterController::class, 'loginView'])->add(GuestOnlyMiddleware::class);
  $app->post('/login', [RegisterController::class, 'loginPost'])->add(GuestOnlyMiddleware::class);
  $app->get('/logout', [RegisterController::class, 'logout'])->add(AuthRequiredMiddleware::class);
  $app->get('/transaction', [TransactionController::class, 'createView'])->add(AuthRequiredMiddleware::class);
  $app->post('/transaction', [TransactionController::class, 'create'])->add(AuthRequiredMiddleware::class);
}

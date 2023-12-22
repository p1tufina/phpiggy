<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{
  HomeController,
  AboutController,
  RegisterController,
  TransactionController,
  ReceiptController,
  ErrorController
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
  $app->get('/transaction/{transaction}', [TransactionController::class, 'editView'])->add(AuthRequiredMiddleware::class);
  $app->post('/transaction/{transaction}', [TransactionController::class, 'edit'])->add(AuthRequiredMiddleware::class);
  $app->delete('/transaction/{transaction}', [TransactionController::class, 'delete'])->add(AuthRequiredMiddleware::class);
  $app->get('/transaction/{transaction}/receipt', [ReceiptController::class, 'uploadView'])->add(AuthRequiredMiddleware::class);
  $app->post('/transaction/{transaction}/receipt', [ReceiptController::class, 'upload'])->add(AuthRequiredMiddleware::class);
  $app->get('/transaction/{transaction}/receipt/{receipt}', [ReceiptController::class, 'download'])->add(AuthRequiredMiddleware::class);
  $app->delete('/transaction/{transaction}/receipt/{receipt}', [ReceiptController::class, 'delete'])->add(AuthRequiredMiddleware::class);
  $app->setErrorHandler([ErrorController::class, 'notFound']);
}

<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;

class CsrfGuardMiddleware implements MiddlewareInterface
{
  public function process(callable $next)
  {

    $requestMethod = strtoupper($_SERVER['REQUEST_METHOD']);
    $validMethods = ['POST', 'PATCH', 'DELETE'];

    if (!in_array($requestMethod, $validMethods)) {
      $next();
      return;
    }

    if ($_SESSION['token'] !== $_POST['token']) {
      redirectTo('/');
      // optional, creat custom exception for invalid csrf token
    }

    unset($_SESSION['token']);

    $next();
  }
}

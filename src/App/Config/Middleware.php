<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Middleware\{
  TemplateDataMiddleware,
  ValidationExceptionMiddleware,
  SessionMiddleware,
  FlashMiddleware,
  CsrfMiddleware,
  CsrfGuardMiddleware
};

function registerMiddleware(App $app)
{
  $app->addMiddleware(CsrfGuardMiddleware::class);
  $app->addMiddleware(CsrfMiddleware::class);
  $app->addMiddleware(TemplateDataMiddleware::class);
  $app->addMiddleware(ValidationExceptionMiddleware::class);
  $app->addMiddleware(FlashMiddleware::class);
  // order of registration is important - item registered last
  // is executed first - SessionMiddleware should be last
  // to be available for everything else
  $app->addMiddleware(SessionMiddleware::class);
}

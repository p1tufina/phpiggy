<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\ValidatorService;

class RegisterController
{
  public function __construct(
    private TemplateEngine $view,
    private ValidatorService $validatorService
  ) {
    //$this->view = new TemplateEngine(Paths::VIEW);
  }
  public function register()
  {
    echo $this->view->render("register.php", ['title' => 'Registration Form']);
  }

  public function registerPost()
  {
    $this->validatorService->validateRegister($_POST);
  }
}

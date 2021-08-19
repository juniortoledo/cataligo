<?php

namespace App\Utils;

use App\Models\CrudModel;
use League\Plates\Engine;

class View
{
  public $view;

  public function __construct()
  {
    $this->view = new Engine(__DIR__ . '/../views');
  }
}

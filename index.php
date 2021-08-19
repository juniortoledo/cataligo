<?php

ini_set("display_errors", 1);

session_start();
use App\Routes\Routing;

require __DIR__ . "/vendor/autoload.php";

use App\Routes;

$router = new Routing();

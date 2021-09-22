<?php

use Pecee\SimpleRouter\SimpleRouter;

session_start();

require '../vendor/autoload.php';
require '../bootstrap/helpers.php';
require_once '../routes/web.php';

SimpleRouter::start();
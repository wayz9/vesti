<?php

namespace App\Controllers;

class Controller
{
    protected static function view($path,  array $data = []): void
    {
        if (file_exists("../resources/views/{$path}.php")) {
            require_once("../resources/views/layouts/master.php");
        } else {
            die("View doesn't exist");
        }
    }

    protected static function guestLayout($path,  array $data = []): void
    {
        if (file_exists("../resources/views/{$path}.php")) {
            require_once("../resources/views/layouts/guest.php");
        } else {
            die("View doesn't exist");
        }
    }
}
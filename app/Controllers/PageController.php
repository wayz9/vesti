<?php

namespace App\Controllers;

class PageController extends Controller
{
    public function notFound()
    {
        return parent::view('errors/404');
    }

    public function forbidden()
    {
        return parent::view('errors/403');
    }
}
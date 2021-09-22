<?php

use App\Controllers\LoginController;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/login', [LoginController::class, 'index'])->name('login');
SimpleRouter::post('/login', [LoginController::class, 'login'])->name('login');
SimpleRouter::get('/logout', [LoginController::class, 'logout'])->name('logout');
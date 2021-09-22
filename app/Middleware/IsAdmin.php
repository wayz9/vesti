<?php

namespace App\Middleware;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\HttpException;

class IsAdmin implements IMiddleware
{
    public function handle(Request $request): void
    {
        if(!session()->exists('is_admin')) {
            throw new HttpException("You are not authorized", 403);
        }
    }
}
<?php

use App\Controllers\CategoryController;
use App\Controllers\PageController;
use App\Controllers\PostsController;
use App\Controllers\SearchController;
use App\Controllers\SubscriptionController;
use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter;

include 'auth.php';
include 'admin.php';


SimpleRouter::get('/', [PostsController::class, 'index'])->name('post.index');
SimpleRouter::get('/post/{id}', [PostsController::class, 'show'])->name('post.show');
SimpleRouter::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
SimpleRouter::post('/post/subscribe', [SubscriptionController::class, 'subscribeToPost'])->name('subscribeToPost');
SimpleRouter::post('/category/subscribe', [SubscriptionController::class, 'subscribeToCategory'])->name('subscribeToCategory');
SimpleRouter::get('/search', [SearchController::class, '__invoke'])->name('search');




SimpleRouter::get('/not-found', [PageController::class, 'notFound']);
SimpleRouter::get('/forbidden', [PageController::class, 'forbidden']);

SimpleRouter::error(function(Request $request, \Exception $exception) {

    switch($exception->getCode()) {
        case 404:
            response()->redirect('/not-found');
        case 403:
            response()->redirect('/forbidden');
    }
    
});
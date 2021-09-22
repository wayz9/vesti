<?php

use App\Controllers\AdminController;
use App\Controllers\CategoryController;
use App\Controllers\PostsController;
use App\Controllers\SubscriptionController;
use App\Middleware\IsAdmin;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group(['middleware' => IsAdmin::class], function() {
    SimpleRouter::get('/admin/posts', [AdminController::class, '__invoke'])->name('posts.index');
    SimpleRouter::get('/admin/post/create', [PostsController::class, 'create'])->name('post.create');
    SimpleRouter::post('/admin/post/create', [PostsController::class, 'store'])->name('post.store');
    SimpleRouter::get('/admin/post/edit/{id}', [PostsController::class, 'edit'])->name('post.edit');
    SimpleRouter::post('/admin/post/edit/{id}', [PostsController::class, 'update'])->name('post.update');
    
    SimpleRouter::get('/admin/subscribers', [SubscriptionController::class, 'index'])->name('subscribers.index');

    SimpleRouter::get('/admin/category/create', [CategoryController::class, 'create'])->name('category.create');
    SimpleRouter::post('/admin/category/create', [CategoryController::class, 'store'])->name('category.store');
});
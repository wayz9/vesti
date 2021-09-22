<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;

class AdminController extends Controller
{
    public function __invoke()
    {
        $posts = (new Post)->all();
        $categories = (new Category)->all();

        return parent::view('admin/posts', ['posts' => $posts, 'categories' => $categories]);
    }
}
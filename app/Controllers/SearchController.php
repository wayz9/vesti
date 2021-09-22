<?php

namespace App\Controllers;

use App\Models\Post;
use App\Services\Validator;

class SearchController extends Controller
{
    public function __invoke()
    {
        $rules = ['keyword' => 'required'];
        
        $validator = new Validator;
        if(!$validator->validate($_GET, $rules)) {
            return redirect('/');
        }

        $validated = $validator->validated();

        $posts = (new Post)->where('title', 'LIKE', "%{$validated['keyword']}%");

        return parent::view('posts/search', ['posts' => $posts]);
    }
}
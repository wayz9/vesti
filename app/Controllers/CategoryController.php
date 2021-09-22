<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Services\Validator;

class CategoryController extends Controller
{
    public Category $category;
    public Post $post;

    public function __construct()
    {
        $this->category = new Category();
        $this->post = new Post();
    }

    public function show($id)
    {
        $category = $this->category->find($id);
        $posts = $this->post->where('category_id', '=', $id);

        return parent::view('categories/show', ['posts' => $posts, 'category' => $category]);
    }

    public function create()
    {
        return parent::view('categories/create');
    }

    public function store()
    {
        $rules = ['name' => 'required'];

        $validator = new Validator;

        var_dump($validator->validate($_POST, $rules));

        if(!$validator->validate($_POST, $rules)){
            return redirect('/admin/category/create');
        }

        $validated = $validator->validated();

        (new Category)->create($validated);

        return redirect('/');

    }
}

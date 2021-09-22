<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Services\Validator;
use App\Traits\Notifiable;

class PostsController extends Controller
{
    use Notifiable;

    public Post $post;
    public Category $category;

    public function __construct() {
        $this->post = new Post();
        $this->category = new Category();
    }

    public function index()
    {
        $categories = $this->category->all();
        (input()->get('order_by') == 'asc') 
            ? $posts = $this->post->all('ASC')
            : $posts = $this->post->all();

        return parent::view('posts/index', ['posts' => $posts, 'categories' => $categories]);
    }

    public function show($id)
    {
        $post = $this->post->find($id);

        return parent::view('posts/show', ['post' => $post]);
    }

    public function create()
    {
        $categories = $this->category->all();

        return parent::view('posts/create', ['categories' => $categories]);
    }

    public function store()
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ];

        $validator = new Validator;

        if(!$validator->validate($_POST, $rules)){
            return redirect('/admin/post/create');
        }

        $validated = $validator->validated();

        $this->post->create($validated);

        $category = $this->category->find($validated['category_id']);
        $emails = $this->post->getRelated('subscription', $category['category_id']);
        $this->notify($emails, 'We have added a new post', "1 New post has been added to {$category['name']}");

        return redirect('/');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        $categories = $this->category->all();

        return parent::view('posts/edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update($id)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ];

        $validator = new Validator;

        if(!$validator->validate($_POST, $rules)) {
            return redirect('admin/post/edit');
        }

        $validated = $validator->validated();
        $this->post->update($validated, $id);

        $post = $this->post->find($id);
        $emails = $this->post->getRelated('subscription', $post['id']);
        $this->notify($emails, "{$post['title']} is updated", 'Post is updated!');

        return redirect('/');
    }
}
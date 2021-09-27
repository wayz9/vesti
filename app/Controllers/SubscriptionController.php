<?php

namespace App\Controllers;

use App\Interfaces\Subscribe;
use App\Models\Category;
use App\Models\Post;
use App\Services\Subscription\SubscribeToCategory;
use App\Services\Subscription\SubscribeToPost;
use App\Services\Validator;

class SubscriptionController extends Controller
{
    public Post $post;
    public Category $category;

    public function __construct() {
        $this->post = new Post();
        $this->category = new Category();
    }

    public function index()
    {
        $posts = $this->post->all();
        $categories = $this->category->all();

        $postSubscribers = $this->post->getAllRelated('subscription');
        $categorySubscribers = $this->category->getAllRelated('subscription');

        return parent::view('admin/subscribers', 
            [
                'postSubscribers' => $postSubscribers, 
                'categorySubscribers' => $categorySubscribers,
                'posts' => $posts,
                'categories' => $categories
            ]
        );
    }

    public function subscribeToCategory()
    {
        $rules = [
            'email' => 'required|email',
            'category_id' => 'required'
        ];

        $validator = new Validator;
        if(!$validator->validate($_POST, $rules)) {
            return redirect('/');
        }

        $validated = $validator->validated();
        $this->subscribe(new SubscribeToCategory, $validated['email'], $validated['category_id']);

        return redirect('/');
    }
    
    public function subscribeToPost()
    {
        $rules = [
            'email' => 'required|email',
            'post_id' => 'required'
        ];

        $validator = new Validator;
        if(!$validator->validate($_POST, $rules)) {
            return redirect('/');
        }

        $validated = $validator->validated();
        $this->subscribe(new SubscribeToPost, $validated['email'], $validated['post_id']);

        return redirect('/');
    }

    public function subscribe(Subscribe $subscription, $email, $id): void
    {
        $subscription->subscribe($email, $id);
    }
}
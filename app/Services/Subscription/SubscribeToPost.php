<?php

namespace App\Services\Subscription;

use App\Interfaces\Subscribe;
use App\Models\Post;

class SubscribeToPost implements Subscribe
{
    public function subscribe($email, $id)
    {
        return (new Post)->attach('subscription', $email, $id);
    }
}
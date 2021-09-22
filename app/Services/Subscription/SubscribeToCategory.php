<?php

namespace App\Services\Subscription;

use App\Interfaces\Subscribe;
use App\Models\Category;

class SubscribeToCategory implements Subscribe
{
    public function subscribe($email, $id)
    {
        return (new Category)->attach('subscription', $email, $id);
    }
}
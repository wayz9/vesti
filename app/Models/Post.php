<?php

namespace App\Models;

class Post extends Model
{
   protected $table = 'posts';
   
   protected $fields = ['title', 'description', 'category_id'];
}

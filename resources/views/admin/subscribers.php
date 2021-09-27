<div class="grid grid-cols-2 gap-20">
    <div>
        <h1 class="text-3xl text-28 font-bold">Post Subscribers</h1>
        <div class="mt-6 flex flex-col gap-y-6">
            <?php  
                foreach($data['posts'] as $post) {
                    echo '<div>';
                    printf('<a href="/post/%d" class="font-semibold text-lg hover:text-indigo-600">%s</a>', $post['id'], $post['title']);

                    if(filter($data['postSubscribers'], 'posts_id', $post['id'])){
                        echo '<ul class="flex flex-col gap-y-2 list-disc">';

                        foreach(filter($data['postSubscribers'], 'posts_id', $post['id']) as $postSubscriber)
                        {
                            printf('<li class="font-medium text-gray-600">
                                        <a href="mailto:%s" class="text-sm hover:text-indigo-600">%s</a>
                                    </li>', 
                                    $postSubscriber['email'], $postSubscriber['email']);
                        }

                        echo '</ul>';
                    }else{
                        echo '<div class="text-sm">No subscribers found for this post</div>';
                    }

                    echo '</div>';
                }
            ?>
        </div>
    </div>
    <div>
        <h1 class="text-3xl text-28 font-bold">Category Subscribers</h1>
        <div class="mt-6 flex flex-col gap-y-6">
            <?php  
                foreach($data['categories'] as $category) {
                    echo '<div>';
                    printf('<a href="/category/%d" class="font-semibold text-lg hover:text-indigo-600">%s</a>', $category['id'], $category['name']);

                    if(filter($data['categorySubscribers'], 'categories_id', $category['id'])){
                        echo '<ul class="flex flex-col gap-y-2 list-disc">';

                        foreach(filter($data['categorySubscribers'], 'categories_id', $category['id']) as $categorySubscriber)
                        {
                            printf('<li class="font-medium text-gray-600">
                                        <a href="mailto:%s" class="text-sm hover:text-indigo-600">%s</a>
                                    </li>', 
                                    $categorySubscriber['email'], $categorySubscriber['email']);
                        }

                        echo '</ul>';
                    }else{
                        echo '<div class="text-sm">No subscribers found for this category</div>';
                    }

                    echo '</div>';
                }
            ?>
        </div>
    </div>
</div>
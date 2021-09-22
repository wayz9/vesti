<div class="grid grid-cols-2 gap-20">
    <div>
        <h1 class="text-3xl text-28 font-bold">Post Subscribers</h1>
        <ol class="mt-6 flex flex-col gap-y-2.5 list-decimal">
            <?php  
                if(!empty($data['postSubscribers']))
                {
                    foreach($data['postSubscribers'] as $postSubscriber)
                    {
                        printf('<li class="font-medium text-gray-600">
                                    <a href="mailto:%s" class="hover:text-indigo-600">%s</a>
                                </li>', 
                                $postSubscriber['email'], $postSubscriber['email']);
                    }
                }else {
                    echo 'No subscribers found.';
                }
            ?>
        </ol>
    </div>
    <div>
        <h1 class="text-3xl text-28 font-bold">Category Subscribers</h1>
        <ol class="mt-6 flex flex-col gap-y-2.5 list-decimal">
            <?php  
                if(!empty($data['categorySubscribers']))
                {
                    foreach($data['categorySubscribers'] as $categorySubscriber)
                    {
                        printf('<li class="font-medium text-gray-600">
                                    <a href="mailto:%s" class="hover:text-indigo-600">%s</a>
                                </li>', 
                                $categorySubscriber['email'], $categorySubscriber['email']);
                    }
                }else{
                    echo 'No subscribers found.';
                }
            ?>
        </ol>
    </div>
</div>
<div class="grid grid-cols-3 gap-14">
    <div class="col-span-2">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl text-28 font-bold">Recent News</h1>
            <div class="flex items-center gap-x-2 font-medium">
                <a href="/" class="hover:text-indigo-600">Newest First</a>
                <span>|</span>
                <a href="?order_by=asc" class="hover:text-indigo-600">Oldest First</a>
            </div>
        </div>
        <div class="mt-4 flex flex-col gap-y-4">
            <?php 
                foreach($data['posts'] as $post){
                printf('<div class="py-3.5 px-4 bg-gray-50 rounded-xl">
                    <a href="/post/%d" class="font-semibold text-lg hover:text-indigo-600">%s</a>
                    <p class="mt-1.5 line-clamp-2 text-gray-600">%s</p>
                    <div class="mt-2.5 flex items-center justify-end">
                        <span class="text-sm italic text-gray-500">%s</span>
                    </div>
                    </div>', $post['id'], $post['title'], $post['description'], date('d M Y', strtotime($post['created_at'])));
                }
            ?>
        </div>
    </div>
    <div class="flex flex-col gap-y-10">
        <div>
            <h1 class="text-3xl text-28 font-bold">Search</h1>
            <form action="<?php echo url('search') ?>" method="GET" class="mt-4">
                <div class="relative">
                    <input type="text" name="keyword" class="block max-w-xs w-full pl-50px py-2.5 rounded-lg bg-gray-100 focus:outline-none focus:bg-gray-200 placeholder-gray-500" placeholder="Search">
                    <span class="absolute inset-y-0 ml-3.5 inline-flex justify-center items-center text-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>  
                    </span>
                </div>
            </form>
            <?php 
                if(session()->exists('errors')){
                    echo '<ul class="mt-4 flex flex-col gap-y-1 list-disc text-sm text-red-500">';
                    foreach(session()->get('errors') as $error){
                        echo "<li>{$error}</li>";
                    }
                    echo '</ul>';

                    session()->delete('errors');
                }
            ?>
        </div>
        <div>
            <h1 class="text-3xl text-28 font-bold">Categories</h1>
            <ul class="mt-4 flex flex-col gap-y-2.5 font-medium text-gray-600">
                <?php 
                    foreach($data['categories'] as $category){
                        printf('<li>
                        <a href="/category/%d" class="hover:text-indigo-600">%s</a>
                        </li>', $category['id'], ucfirst($category['name']));
                    }
                ?>
            </ul>
        </div>
        <div>
            <h1 class="text-3xl text-28 font-bold">Tags</h1>
            <div class="mt-4 flex items-center flex-wrap gap-2">
                <span class="py-1.5 px-3 rounded-full bg-indigo-50 text-indigo-800 text-sm">
                    Football
                </span>
                <span class="py-1.5 px-3 rounded-full bg-indigo-50 text-indigo-800 text-sm">
                    Fashion
                </span>
                <span class="py-1.5 px-3 rounded-full bg-indigo-50 text-indigo-800 text-sm">
                    Nature
                </span>
                <span class="py-1.5 px-3 rounded-full bg-indigo-50 text-indigo-800 text-sm">
                    Toys & Kids
                </span>
                <span class="py-1.5 px-3 rounded-full bg-indigo-50 text-indigo-800 text-sm">
                    Bitcoin
                </span>
                <span class="py-1.5 px-3 rounded-full bg-indigo-50 text-indigo-800 text-sm">
                    Food
                </span>
                <span class="py-1.5 px-3 rounded-full bg-indigo-50 text-indigo-800 text-sm">
                    Programming
                </span>
            </div>
        </div>
    </div>
</div>

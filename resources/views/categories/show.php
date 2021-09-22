<div class="grid grid-cols-3 gap-14">
    <div class="col-span-2">
        <h1 class="text-3xl text-28 font-bold">Posts</h1>
        <div class="mt-4 flex flex-col gap-y-4">
        <?php
            if($data['posts']){
                foreach ($data['posts'] as $post) {
                    printf('<div class="py-3.5 px-4 bg-gray-50 rounded-xl">
                            <a href="/post/%d" class="font-semibold text-lg hover:text-indigo-600">%s</a>
                            <p class="mt-1.5 line-clamp-2 text-gray-600">%s</p>
                            <div class="mt-2.5 flex items-center justify-end">
                                <span class="text-sm italic text-gray-500">%s</span>
                            </div>
                            </div>', $post['id'], $post['title'], $post['description'], date('d M Y', strtotime($post['created_at'])));
                }
            }else {
                echo 'No posts found for this category';
            }
        ?>
        </div>
    </div>

    <div>
        <h1 class="text-2xl font-bold">Subscribe to this category</h1>
        <form action="<?php echo url('subscribeToCategory') ?>" method="POST" class="mt-4 flex items-center gap-4">
            <div class="relative">
                <input type="hidden" name="category_id" value="<?php echo $data['category']['id'] ?>">
                <input type="email" name="email" class="block max-w-xs w-full pl-50px py-2.5 rounded-lg bg-gray-100 focus:outline-none focus:bg-gray-200 placeholder-gray-500" placeholder="Your email address">
                <span class="absolute inset-y-0 ml-3.5 inline-flex justify-center items-center text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </span>
            </div>
            <button type="submit" class="block py-2.5 px-6 rounded-md bg-indigo-600 text-white font-medium focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-indigo-600">
                Enter
            </button>
        </form>
        <div class="flex items-start gap-2 mt-4">
            <span class="inline-flex text-gray-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </span>
            <p class="text-gray-600 text-sm">We will send you an email whenever a new post is added to this category.</p>
        </div>
    </div>
</div>
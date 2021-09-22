<div class="grid grid-cols-3 gap-14">
    <div class="col-span-2">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl text-28 font-bold">All Posts</h1>
        </div>
        <div class="mt-4 flex flex-col gap-y-4">
            <?php
            foreach ($data['posts'] as $post) {
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
            <h1 class="text-3xl text-28 font-bold">Categories</h1>
            <ul class="mt-4 flex flex-col gap-y-2.5 font-medium text-gray-600">
                <?php
                foreach ($data['categories'] as $category) {
                    printf('<li>
                        <a href="/category/%d" class="hover:text-indigo-600">%s</a>
                        </li>', $category['id'], ucfirst($category['name']));
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="max-w-screen-md mx-auto">
    <h1 class="text-3xl font-bold text-center">Create New Post</h1>
    <form action="" method="POST" class="mt-10 flex flex-col gap-y-10">
        <div class="flex flex-col gap-y-2">
            <label for="title" class="text-gray-600">Title <span class="text-red-500">*</span></label>
            <input name="title" id="title" type="text" class="px-4 block w-full py-2.5 placeholder-gray-500 rounded-lg focus:outline-none bg-gray-100 focus:bg-gray-200" placeholder="Post title" required autofocus>
        </div>
        <div class="flex flex-col gap-y-2">
            <label for="description" class="text-gray-600">Description <span class="text-red-500">*</span></label>
            <textarea name="description" id="description" type="text" rows="4" class="px-4 block w-full py-2.5 placeholder-gray-500 rounded-lg focus:outline-none bg-gray-100 focus:bg-gray-200" required></textarea>
        </div>
        <div class="flex flex-col gap-y-2">
            <label for="categories" class="text-gray-600">Categories <span class="text-red-500">*</span></label>
            <select name="category_id" id="categories" class="px-4 block w-full py-2.5 placeholder-gray-500 rounded-lg focus:outline-none bg-gray-100 focus:bg-gray-200" required>
                <option value="" selected disabled>Select a category</option>
                <?php 
                    if($data['categories']){
                        foreach($data['categories'] as $category){
                            echo sprintf('<option value="%d">%s</option>', $category['id'], $category['name']);
                        }
                    }
                ?>
            </select>
        </div>
        <div class="flex items-center justify-end gap-4">
            <button type="reset" class="py-2 px-4 rounded-md focus:ring-2 focus:ring-offset-1 focus:ring-indigo-600 font-medium">Reset</button>
            <button type="submit" class="py-2 px-6 bg-indigo-600 text-white rounded-md focus:ring-2 focus:ring-offset-1 focus:ring-indigo-600 font-medium">Submit</button>
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
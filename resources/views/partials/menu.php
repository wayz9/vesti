<div x-data="{open : false}" class="relative inline-block text-left z-20">
    <button @click="open = !open" type="button" class="ml-12 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-indigo-600">
        <img src="https://eu.ui-avatars.com/api/?background=4F46E5&color=fff" alt="JD" class="rounded-full w-10 h-10">
    </button>
    <div x-show="open" @click.away="open = false" x-cloak x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none" x-description="Dropdown menu, show/hide based on menu state." @keydown.tab="open = false">
        <div class="py-2" role="none">
            <a href="<?php echo url('posts.index') ?>" class="block px-4 py-2 font-medium text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Dashboard</a>
            <a href="#" class="block px-4 py-2 font-medium text-gray-400 cursor-not-allowed" role="menuitem" tabindex="-1">Account Settings</a>
        </div>
        <div class="py-2" role="none">
            <a href="<?php echo url('subscribers.index') ?>" class="block px-4 py-2 font-medium text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">View subscribers</a>
            <a href="<?php echo url('post.create') ?>" class="block px-4 py-2 font-medium text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">New post</a>
            <a href="<?php echo url('category.create') ?>" class="block px-4 py-2 font-medium text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">New category</a>
        </div>
        <div class="py-2" role="none">
            <a href="/logout" class="block px-4 py-2 font-medium text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1">Log out</a>
        </div>
    </div>
</div>
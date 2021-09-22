<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSS & Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo url('/') ?>css/app.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="antialiased text-gray-800">
    <div class="flex flex-col justify-between min-h-screen">
        <div class="max-w-screen-xl w-full mx-auto px-8 py-6">
            <nav class="flex items-center justify-between">
                <a href="/">
                    <img src="/logo.svg" alt="Logo" class="h-10">
                </a>

                <div class="flex items-center">
                    <div class="flex items-center gap-11">
                        <a href="/" class="font-medium hover:text-indigo-600">Home</a>
                        <a href="#" class="font-medium hover:text-indigo-600">Recent News</a>
                        <a href="#" class="font-medium hover:text-indigo-600">About Us</a>
                    </div>
                    <?php 
                        if(!session()->exists('is_admin') && !session()->exists('authenticated_user')){
                            echo '<a href="/login" class="ml-12 block py-2 px-8 rounded-md bg-indigo-600 text-white font-medium focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-indigo-600">
                                Login
                            </a>';
                        }
                    ?>
                    <?php 
                        if(session()->exists('is_admin') && session()->exists('authenticated_user')){
                            partials('menu');
                        }
                    ?>
                </div>
            </nav>
            <main class="mt-20">
                <?php include "../resources/views/{$path}.php"; ?>
            </main>
        </div>
        <footer class="bg-gray-100">
            <div class="max-w-screen-xl mx-auto w-full py-10 px-8">
                <div class="flex items-start justify-between">
                    <a href="/" class="block">
                        <img src="/logo.svg" alt="Logo" class="h-8">
                    </a>
                    <div class="grid grid-cols-4 gap-12">
                        <div>
                            <div class="font-semibold">Follow Us</div>
                            <ul class="mt-3 flex flex-col gap-y-2 text-gray-600 font-medium">
                                <li>
                                    <a href="#" class="hover:text-indigo-600">Twitter</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:text-indigo-600">Facebook</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:text-indigo-600">Instagram</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="font-semibold">Legal</div>
                            <ul class="mt-3 flex flex-col gap-y-2 text-gray-600 font-medium">
                                <li>
                                    <a href="#" class="hover:text-indigo-600">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:text-indigo-600">Terms & Conditions</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:text-indigo-600">Cookies</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="font-semibold">Get in touch</div>
                            <ul class="mt-3 flex flex-col gap-y-2 text-gray-600 font-medium">
                                <li>Tel: (123) 345-6789</li>
                                <li>Email: mail@mail.com</li>
                            </ul>
                        </div>
                        <div>
                            <div class="font-semibold">Technology</div>
                            <ul class="mt-3 flex flex-col gap-y-2 text-gray-600 font-medium">
                                <li>
                                    <a href="#" class="hover:text-indigo-600">Explore</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:text-indigo-600">Categories</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:text-indigo-600">News</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
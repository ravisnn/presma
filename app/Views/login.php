<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/Img/BSI.png" type="image/png">
    <title>Login</title>
    <!-- Include the Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
    .login {
        margin-top: 20px;
    }
</style>

<body
    class="bg-gradient-to-r from-blue-500 via-blue-700 to-blue-900 dark:from-blue-900 dark:via-blue-700 dark:to-blue-500">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div
            class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1
                    class="text-4xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    LOGIN
                </h1>
                <form class="space-y-4 md:space-y-6" action="<?= site_url('login_action') ?>" method="POST">
                    <div>
                        <label for="user"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="user" id="user"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Masukkan username">
                        <?php if (isset(session('errors')['user'])): ?>
                            <span class="text-red-500 text-sm"><?= session('errors')['user'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <button type="button" onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-600 dark:text-gray-400">
                                <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-.274.76-.624 1.466-1.042 2.105M15 12a3 3 0 11-6 0 3 3 0 016 0zm6.042 2.105A10.042 10.042 0 0112 19c-4.478 0-8.268-2.943-9.542-7 .274-.76.624-1.466 1.042-2.105">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <?php if (isset(session('errors')['password'])): ?>
                            <span class="text-red-500 text-sm"><?= session('errors')['password'] ?></span>
                        <?php endif; ?>
                    </div>
                    <button type="submit"
                        class="login w-full text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Sign in
                    </button>
                    <?php if (session()->has('error')): ?>
                        <div class="text-red-500 text-sm"><?= session('error') ?></div>
                    <?php endif; ?>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Lupa password? 
                        <a href="<?= site_url('forgot_password') ?>" class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                            Klik di sini
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Toggle Password JS -->
    <script>
        function togglePassword() {
            var passwordField = document.getElementById('password');
            var eyeIcon = document.getElementById('eyeIcon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-.274.76-.624 1.466-1.042 2.105M15 12a3 3 0 11-6 0 3 3 0 016 0zm6.042 2.105A10.042 10.042 0 0112 19c-4.478 0-8.268-2.943-9.542-7 .274-.76.624-1.466 1.042-2.105"></path>';
            } else {
                passwordField.type = 'password';
                eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.522 5 12 5c4.478 0 8.268 2.943 9.542 7-.274.76-.624 1.466-1.042 2.105"></path>';
            }
        }
    </script>
    <!-- End Toggle Password JS -->

</body>

</html>
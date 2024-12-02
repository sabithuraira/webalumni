<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <nav class="bg-[#343C6A]">
        <div class="mx-auto flex justify-between items-center py-2">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="ml-9 my-2">
                    <a href="/">
                        <img src="{{ asset('img/haisstis.png') }}" width="50" height="50" alt="Logo">
                    </a>
                </div>
                <div class="text-white">
                    <a href="/" class="text-white no-underline text-[25px] font-bold ml-3">
                        HAISSTIS SUMSEL
                    </a>
                </div>
            </div>
            <!-- Menu -->
            <div class="flex items-center space-x-4 md:space-x-10 mr-10">
                <a href="/dashboard"
                    class="text-white no-underline font-bold text-[15px] {{ request()->is('dashboard') ? 'border-b-2 border-white' : '' }}">
                    DASHBOARD
                </a>
                <a href="/admin"
                    class="text-white no-underline font-bold text-[15px] {{ request()->is('admin') ? 'border-b-2 border-white' : '' }}">
                    ADMIN
                </a>
                <a href="/keuangan"
                    class="text-white no-underline font-bold text-[15px] {{ request()->is('keuangan') ? 'border-b-2 border-white' : '' }}">
                    KEUANGAN
                </a>
                <a href="/alumni"
                    class="text-white no-underline font-bold text-[15px] {{ request()->is('alumni*') ? 'border-b-2 border-white' : '' }}">
                    ALUMNI
                </a>
                <!-- Dropdown Menu for Profil and Logout -->
                <div class="relative inline-block text-left">
                    <button id="dropdownButton" class="text-white font-bold text-[15px]">
                        <svg class="inline ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Dropdown Content -->
                    <div id="dropdownMenu"
                        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                        <a href="/profil" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- JavaScript for Dropdown -->
    <script>
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Optional: Close dropdown when clicking outside
        window.addEventListener('click', (e) => {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>

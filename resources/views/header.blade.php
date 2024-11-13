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
                <button id="loginButton"
                    class="text-white font-bold border-white border-2 rounded-full text-[15px] px-3 py-2">
                    LOGIN
                </button>
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div id="loginModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg w-[90%] max-w-md p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Login</h2>
                <button id="closeModal" class="text-gray-500">&times;</button>
            </div>
    
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="text-red-500 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST" class="mt-4">
                @csrf
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
    
                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
    
                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-[#343C6A] text-white font-bold py-1 px-3 rounded-lg hover:bg-[#343C6A]">Login</button>
                </div>
            </form>
        </div>
    </div>    

    <!-- JavaScript for Modal -->
    <script>
        const loginButton = document.getElementById('loginButton');
        const loginModal = document.getElementById('loginModal');
        const closeModal = document.getElementById('closeModal');

        // Show the modal when login button is clicked
        loginButton.addEventListener('click', () => {
            loginModal.classList.remove('hidden');
        });

        // Hide the modal when the close button is clicked
        closeModal.addEventListener('click', () => {
            loginModal.classList.add('hidden');
        });

        // Hide the modal when clicking outside of the modal content
        window.addEventListener('click', (e) => {
            if (e.target === loginModal) {
                loginModal.classList.add('hidden');
            }
        });
    </script>
</body>

</html>

<nav class="bg-white shadow-md py-4">
    <div class="container mx-auto flex justify-between items-center px-6 md:px-8">
        <div class="flex items-center">
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('images/phcm_logo.png') }}" alt="PHCM Logo" class="h-9 w-9">
                <span class="text-2xl font-bold text-red-600">PHCM</span>
            </a>
        </div>
        <div class="hidden md:flex items-center space-x-7">
            <a href="/" class="text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out">Home</a>
            <a href="/resep" class="text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out">Resep</a>
            <a href="/artikel" class="text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out">Artikel</a>
            <a href="/forum" class="text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out">Forum</a>
            <a href="/rekomendasi" class="text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out">Rekomendasi</a>
            <a href="/chatbot" class="text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out">Chatbot</a>

            @auth {{-- Jika pengguna sudah login --}}
                <a href="/dashboard" class="bg-red-600 text-white px-5 py-2 rounded-full font-semibold hover:bg-red-700 transition duration-300 ease-in-out shadow-lg">Profil Saya</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out">Logout</button>
                </form>
            @else {{-- Jika pengguna belum login --}}
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out">Login</a>
                <a href="{{ route('register') }}" class="bg-red-600 text-white px-5 py-2 rounded-full font-semibold hover:bg-red-700 transition duration-300 ease-in-out shadow-lg">Register</a>
            @endauth
        </div>
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg py-4">
        <ul class="flex flex-col items-center space-y-4">
            <li><a href="/" class="block text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out py-2">Home</a></li>
            <li><a href="/resep" class="block text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out py-2">Resep</a></li>
            <li><a href="/artikel" class="block text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out py-2">Artikel</a></li>
            <li><a href="/forum" class="block text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out py-2">Forum</a></li>
            <li><a href="/rekomendasi" class="block text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out py-2">Rekomendasi</a></li>
            <li><a href="/chatbot" class="block text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out py-2">Chatbot</a></li>
            @auth
                <li><a href="/dashboard" class="block bg-red-600 text-white px-5 py-2 rounded-full font-semibold hover:bg-red-700 transition duration-300 ease-in-out shadow-lg">Profil Saya</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out py-2">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="block text-gray-700 hover:text-red-600 font-medium transition duration-300 ease-in-out py-2">Login</a></li>
                <li><a href="{{ route('register') }}" class="block bg-red-600 text-white px-5 py-2 rounded-full font-semibold hover:bg-red-700 transition duration-300 ease-in-out shadow-lg">Register</a></li>
            @endauth
        </ul>
    </div>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</nav>
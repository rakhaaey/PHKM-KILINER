<nav id="main-navbar" class="bg-white shadow-lg py-4 px-6 md:px-8 sticky top-0 z-50 transition-all duration-300">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="flex items-center space-x-2">
            {{-- <img src="{{ asset('images/logo.png') }}" alt="PHCM Logo" class="h-10"> --}}
            <span class="text-3xl font-extrabold text-primary font-heading">PHCM</span>
        </a>

        <div class="hidden md:flex space-x-8 items-center">
            <a href="{{ route('home') }}" class="text-dark-gray hover:text-primary transition duration-200 text-lg font-medium group relative">Beranda <span class="block h-0.5 bg-primary absolute bottom-0 left-0 w-0 group-hover:w-full transition-all duration-300"></span></a>
            <a href="{{ route('resep.index') }}" class="text-dark-gray hover:text-primary transition duration-200 text-lg font-medium group relative">Resep <span class="block h-0.5 bg-primary absolute bottom-0 left-0 w-0 group-hover:w-full transition-all duration-300"></span></a>
            <a href="{{ route('artikel.index') }}" class="text-dark-gray hover:text-primary transition duration-200 text-lg font-medium group relative">Artikel <span class="block h-0.5 bg-primary absolute bottom-0 left-0 w-0 group-hover:w-full transition-all duration-300"></span></a>
            <a href="{{ route('forum.index') }}" class="text-dark-gray hover:text-primary transition duration-200 text-lg font-medium group relative">Forum <span class="block h-0.5 bg-primary absolute bottom-0 left-0 w-0 group-hover:w-full transition-all duration-300"></span></a>
            <a href="{{ route('nutrition.calculator') }}" class="text-dark-gray hover:text-primary transition duration-200 text-lg font-medium group relative">Kalkulator Gizi <span class="block h-0.5 bg-primary absolute bottom-0 left-0 w-0 group-hover:w-full transition-all duration-300"></span></a>
            <a href="{{ route('chatbot.index') }}" class="text-dark-gray hover:text-primary transition duration-200 text-lg font-medium group relative">Chatbot <span class="block h-0.5 bg-primary absolute bottom-0 left-0 w-0 group-hover:w-full transition-all duration-300"></span></a>
            <a href="{{ route('recommendations.index') }}" class="text-dark-gray hover:text-primary transition duration-200 text-lg font-medium group relative">Rekomendasi <span class="block h-0.5 bg-primary absolute bottom-0 left-0 w-0 group-hover:w-full transition-all duration-300"></span></a>

            @guest
                <a href="{{ route('login') }}" class="bg-primary text-white px-6 py-2 rounded-full font-semibold hover:bg-red-500 transition duration-300 shadow-md transform hover:scale-105">Masuk</a>
                <a href="{{ route('register') }}" class="text-primary border-2 border-primary px-6 py-2 rounded-full font-semibold hover:bg-primary hover:text-white transition duration-300 transform hover:scale-105">Daftar</a>
            @else
                <div class="relative group">
                    <button class="flex items-center text-dark-gray hover:text-primary transition duration-200 text-lg font-medium focus:outline-none py-2 px-4 rounded-full bg-light-gray hover:bg-gray-200">
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4 ml-2 transform group-hover:rotate-180 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden group-hover:block transition-all duration-300 ease-out transform origin-top-right scale-95 opacity-0 group-hover:scale-100 group-hover:opacity-100">
                        <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-dark-gray hover:bg-light-gray transition duration-200">Profil Saya</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-dark-gray hover:bg-light-gray transition duration-200">Keluar</button>
                        </form>
                    </div>
                </div>
            @endguest
        </div>

        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-dark-gray focus:outline-none p-2 rounded-md hover:bg-gray-100">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white py-2 shadow-md mt-2 rounded-md transition-all duration-300 ease-in-out">
        <a href="{{ route('home') }}" class="block px-4 py-3 text-dark-gray hover:bg-light-gray text-lg font-medium transition duration-200">Beranda</a>
        <a href="{{ route('resep.index') }}" class="block px-4 py-3 text-dark-gray hover:bg-light-gray text-lg font-medium transition duration-200">Resep</a>
        <a href="{{ route('artikel.index') }}" class="block px-4 py-3 text-dark-gray hover:bg-light-gray text-lg font-medium transition duration-200">Artikel</a>
        <a href="{{ route('forum.index') }}" class="block px-4 py-3 text-dark-gray hover:bg-light-gray text-lg font-medium transition duration-200">Forum</a>
        <a href="{{ route('nutrition.calculator') }}" class="block px-4 py-3 text-dark-gray hover:bg-light-gray text-lg font-medium transition duration-200">Kalkulator Gizi</a>
        <a href="{{ route('chatbot.index') }}" class="block px-4 py-3 text-dark-gray hover:bg-light-gray text-lg font-medium transition duration-200">Chatbot</a>
        <a href="{{ route('recommendations.index') }}" class="block px-4 py-3 text-dark-gray hover:bg-light-gray text-lg font-medium transition duration-200">Rekomendasi</a>

        @guest
            <div class="px-4 py-3 mt-2 border-t border-gray-200">
                <a href="{{ route('login') }}" class="block bg-primary text-white px-5 py-2 rounded-full font-semibold hover:bg-red-500 transition duration-300 text-center mb-2">Masuk</a>
                <a href="{{ route('register') }}" class="block text-primary border-2 border-primary px-5 py-2 rounded-full font-semibold hover:bg-primary hover:text-white transition duration-300 text-center">Daftar</a>
            </div>
        @else
            <div class="px-4 py-3 mt-2 border-t border-gray-200">
                <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-dark-gray hover:bg-light-gray">Profil Saya</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-dark-gray hover:bg-light-gray">Keluar</button>
                </form>
            </div>
        @endguest
    </div>
</nav>

{{-- Script untuk toggle menu mobile (sudah ada, pastikan di dalam <body> atau setelah navbar) --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const navbar = document.getElementById('main-navbar'); // Get the navbar element

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Optional: Add shadow on scroll
        window.addEventListener('scroll', function() {
            if (window.scrollY > 0) {
                navbar.classList.add('shadow-xl'); // Stronger shadow on scroll
            } else {
                navbar.classList.remove('shadow-xl');
            }
        });
    });
</script>
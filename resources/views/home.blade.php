@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-r from-orange-500 to-red-500 text-white py-16 md:py-24 overflow-hidden relative">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-6 md:px-8">
            <div class="mb-10 md:mb-0 md:w-1/2 flex justify-center order-2 md:order-1">
                <img src="{{ asset('images/chef.png') }}" alt="Chef preparing food" class="max-h-96 w-auto object-contain animate-float">
            </div>
            <div class="md:w-1/2 text-center md:text-left order-1 md:order-2">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 drop-shadow-md">Selamat Datang di <br><span class="text-yellow-200">PHCM</span></h1>
                <p class="text-lg md:text-xl mb-8 opacity-90">Jelajahi dunia kuliner sehat dan interaktif bersama kami!</p>
                <a href="/resep-populer" class="inline-block bg-white text-orange-600 px-8 py-3 rounded-full font-bold shadow-lg hover:bg-gray-100 transform hover:scale-105 transition duration-300 ease-in-out animate-bounce-subtle">
                    Lihat Resep Populer
                </a>
            </div>
        </div>
        <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-orange-400 rounded-full opacity-20 transform rotate-45"></div>
        <div class="absolute -top-5 -right-5 w-32 h-32 bg-red-400 rounded-full opacity-20 transform -rotate-30"></div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 md:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Fitur Unggulan Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <a href="/resep" class="block bg-white p-6 rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-2 transition duration-300 ease-in-out text-center">
                    <div class="bg-orange-100 p-4 rounded-full inline-flex items-center justify-center mb-4">
                        <img src="{{ asset('icons/search.png') }}" alt="Search Icon" class="h-8 w-8 text-orange-600">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Cari Resep</h3>
                    <p class="text-gray-600 text-sm">Temukan ribuan resep lezat dan sehat dengan mudah.</p>
                </a>

                <a href="/kalkulator-gizi" class="block bg-white p-6 rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-2 transition duration-300 ease-in-out text-center">
                    <div class="bg-yellow-100 p-4 rounded-full inline-flex items-center justify-center mb-4">
                        <img src="{{ asset('icons/calculator.png') }}" alt="Calculator Icon" class="h-8 w-8 text-yellow-600">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Kalkulator Gizi</h3>
                    <p class="text-gray-600 text-sm">Hitung kandungan gizi makanan Anda secara instan.</p>
                </a>

                <a href="/forum" class="block bg-white p-6 rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-2 transition duration-300 ease-in-out text-center">
                    <div class="bg-red-100 p-4 rounded-full inline-flex items-center justify-center mb-4">
                        <img src="{{ asset('icons/forum.png') }}" alt="Forum Icon" class="h-8 w-8 text-red-600">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Forum Diskusi</h3>
                    <p class="text-gray-600 text-sm">Berbagi tips, trik, dan pengalaman kuliner dengan komunitas.</p>
                </a>

                <a href="/chatbot" class="block bg-white p-6 rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-2 transition duration-300 ease-in-out text-center">
                    <div class="bg-blue-100 p-4 rounded-full inline-flex items-center justify-center mb-4">
                        <img src="{{ asset('icons/chatbot.png') }}" alt="Chatbot Icon" class="h-8 w-8 text-blue-600">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Chatbot Asisten</h3>
                    <p class="text-gray-600 text-sm">Dapatkan bantuan resep dan informasi makanan secara cepat.</p>
                </a>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 md:px-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">Artikel Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse ($latestArticles as $article)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transform hover:-translate-y-1 transition duration-300 ease-in-out">
                        <img src="{{ $article->image_url ?? asset('images/article_placeholder.jpg') }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $article->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($article->excerpt, 100) }}</p>
                            <a href="/artikel/{{ $article->slug }}" class="text-red-600 hover:text-red-700 font-semibold flex items-center">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-600 col-span-3">Belum ada artikel terbaru saat ini.</p>
                @endforelse
            </div>
            <div class="text-center mt-10">
                <a href="/artikel" class="inline-block bg-orange-500 text-white px-7 py-3 rounded-full font-semibold hover:bg-orange-600 transition duration-300 ease-in-out shadow-md">
                    Lihat Semua Artikel
                </a>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6 md:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Ikuti Tantangan Memasak Mingguan!</h2>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto mb-8">Uji kemampuan memasakmu dan menangkan hadiah menarik. Setiap minggu, tantangan baru menanti!</p>
            <a href="/tantangan" class="inline-block bg-red-600 text-white px-8 py-4 rounded-full font-bold shadow-lg hover:bg-red-700 transform hover:scale-105 transition duration-300 ease-in-out animate-pulse-subtle">
                Gabung Tantangan Sekarang!
            </a>
            <div class="mt-10 flex justify-center items-center space-x-4 text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span>Tantangan berakhir dalam: <span class="font-semibold text-gray-800">3 hari 10 jam</span></span>
            </div>
        </div>
    </section>
@endsection
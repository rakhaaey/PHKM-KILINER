@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-r from-primary to-red-500 text-white py-20 md:py-32 overflow-hidden relative">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-6 md:px-8">
            <div class="mb-10 md:mb-0 md:w-1/2 flex justify-center order-2 md:order-1 relative z-10">
    <img src="{{ asset('images/chef-nobg.png') }}" alt="Chef tanpa background" class="max-h-[450px] w-auto object-contain drop-shadow-lg">
</div> 
            <div class="md:w-1/2 text-center md:text-left order-1 md:order-2 relative z-10">
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4 drop-shadow-lg font-heading">
                    Selamat Datang di <br><span class="text-yellow-200">PHCM</span>
                </h1>
                <p class="text-lg md:text-xl mb-8 opacity-95 leading-relaxed font-sans">
                    Jelajahi dunia kuliner sehat dan interaktif bersama kami! Temukan resep lezat, hitung gizi, dan berbagi passion kuliner.
                </p>
                <a href="{{ route('resep.index') }}" class="inline-block bg-white text-primary px-10 py-4 rounded-full font-bold shadow-xl hover:bg-gray-100 transform hover:scale-105 transition duration-300 ease-in-out animate-bounce-subtle text-lg">
                    Temukan Resep Anda
                </a>
            </div>
        </div>
        {{-- Background shapes for visual interest --}}
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-primary/30 rounded-full opacity-30 transform rotate-45 animate-pulse-slow"></div>
        <div class="absolute -top-10 -right-10 w-48 h-48 bg-red-400/30 rounded-full opacity-30 transform -rotate-30 animate-pulse-slow delay-200"></div>
    </section>

    <section class="py-16 bg-soft-orange"> {{-- Menggunakan warna soft-orange --}}
        <div class="container mx-auto px-6 md:px-8">
            <h2 class="text-4xl font-bold text-dark-gray text-center mb-12 font-heading">Fitur Unggulan Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <a href="{{ route('resep.index') }}" class="block bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-3 transition duration-300 ease-in-out text-center group border border-gray-100 hover:border-primary">
                    <div class="bg-primary/10 p-5 rounded-full inline-flex items-center justify-center mb-6 group-hover:bg-primary/20 transition-colors">
                        <img src="{{ asset('images/icons/search-icon.png') }}" alt="Cari Resep" class="h-8 w-8">
                    </div>
                    <h3 class="text-2xl font-semibold text-dark-gray mb-3 font-heading">Cari Resep</h3>
                    <p class="text-gray-600 text-base font-sans">Temukan ribuan resep lezat dan sehat dengan mudah.</p>
                </a>

                <a href="{{ route('nutrition.calculator') }}" class="block bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-3 transition duration-300 ease-in-out text-center group border border-gray-100 hover:border-accent">
                    <div class="bg-accent/10 p-5 rounded-full inline-flex items-center justify-center mb-6 group-hover:bg-accent/20 transition-colors">
                        <img src="{{ asset('images/icons/calculator-icon.png') }}" alt="Kalkulator Gizi" class="h-8 w-8">
                    </div>
                    <h3 class="text-2xl font-semibold text-dark-gray mb-3 font-heading">Kalkulator Gizi</h3>
                    <p class="text-gray-600 text-base font-sans">Hitung kandungan gizi makanan Anda secara instan.</p>
                </a>

                <a href="{{ route('forum.index') }}" class="block bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-3 transition duration-300 ease-in-out text-center group border border-gray-100 hover:border-secondary">
                    <div class="bg-secondary/10 p-5 rounded-full inline-flex items-center justify-center mb-6 group-hover:bg-secondary/20 transition-colors">
                        <img src="{{ asset('images/icons/forum-icon.png') }}" alt="Forum Diskusi" class="h-8 w-8">
                    </div>
                    <h3 class="text-2xl font-semibold text-dark-gray mb-3 font-heading">Forum Diskusi</h3>
                    <p class="text-gray-600 text-base font-sans">Berbagi tips, trik, dan pengalaman kuliner dengan komunitas.</p>
                </a>

                <a href="{{ route('chatbot.index') }}" class="block bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-3 transition duration-300 ease-in-out text-center group border border-gray-100 hover:border-blue-500">
                    <div class="bg-blue-100 p-5 rounded-full inline-flex items-center justify-center mb-6 group-hover:bg-blue-200 transition-colors">
                        <img src="{{ asset('images/icons/chatbot-icon.png') }}" alt="Chatbot Asisten" class="h-8 w-8">
                    </div>
                    <h3 class="text-2xl font-semibold text-dark-gray mb-3 font-heading">Chatbot Asisten</h3>
                    <p class="text-gray-600 text-base font-sans">Dapatkan bantuan resep dan informasi makanan secara cepat.</p>
                </a>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 md:px-8">
            <h2 class="text-4xl font-bold text-dark-gray mb-12 text-center font-heading">Artikel Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($latestArticles as $article)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transform hover:-translate-y-2 transition duration-300 ease-in-out border border-gray-100">
                        <img src="{{ $article->image_url ?? asset('images/article_placeholder.jpg') }}" alt="{{ $article->title }}" class="w-full h-56 object-cover object-center">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-dark-gray mb-3 font-heading leading-tight">{{ $article->title }}</h3>
                            <p class="text-gray-700 text-sm mb-4 font-sans">{{ Str::limit($article->excerpt, 120) }}</p>
                            <a href="/artikel/{{ $article->slug }}" class="text-primary hover:text-red-700 font-semibold flex items-center transition duration-200 group">
                                Baca Selengkapnya
                                <svg class="w-5 h-5 ml-1 transform group-hover:translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-600 col-span-full py-10 text-lg">Belum ada artikel terbaru saat ini. <br> Silakan tambahkan data artikel di database Anda.</p>
                @endforelse
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('artikel.index') }}" class="inline-block bg-primary text-white px-8 py-4 rounded-full font-bold hover:bg-red-600 transition duration-300 ease-in-out shadow-lg transform hover:scale-105 text-lg">
                    Lihat Semua Artikel
                </a>
            </div>
        </div>
    </section>
@endsection
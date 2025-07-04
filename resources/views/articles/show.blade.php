@extends('layouts.app')

@section('content')
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 md:px-8 max-w-3xl">
            <a href="{{ route('artikel.index') }}" class="text-primary hover:underline mb-6 inline-flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar Artikel
            </a>

            <h1 class="text-4xl md:text-5xl font-extrabold text-dark-gray mb-6 font-heading leading-tight">{{ $article->title }}</h1>
            <p class="text-gray-600 text-sm mb-4">Diterbitkan pada: {{ $article->published_at->format('d M Y') }}</p>

            <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-96 object-cover object-center rounded-xl mb-8 shadow-md">

            <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed font-sans">
                <p>{{ $article->content }}</p>
                {{-- Anda bisa memparsing $article->content jika ada format Markdown atau HTML --}}
            </div>

            <div class="mt-10 pt-6 border-t border-gray-200 text-gray-600 text-sm">
                <p>Terima kasih telah membaca artikel ini. Semoga bermanfaat!</p>
            </div>
        </div>
    </section>
@endsection
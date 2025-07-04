@extends('layouts.app')

@section('content')
    <section class="py-16 bg-soft-orange">
        <div class="container mx-auto px-6 md:px-8 max-w-4xl">
            {{-- Tombol Kembali --}}
            <a href="{{ route('forum.index') }}" class="text-primary hover:underline mb-8 inline-flex items-center text-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Forum
            </a>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 p-8">
                <h1 class="text-4xl md:text-5xl font-extrabold text-dark-gray mb-4 font-heading leading-tight">{{ $post->title }}</h1>
                <p class="text-gray-600 text-sm mb-6">
                    Diposting oleh <span class="font-semibold">{{ $post->user_name }}</span> pada {{ $post->created_at->format('d M Y, H:i') }}
                </p>

                <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed font-sans mb-10 border-b pb-8">
                    <p>{{ $post->full_content }}</p>
                    {{-- Di sini bisa ditambahkan gambar atau elemen lain jika konten lebih kompleks --}}
                </div>

                <div class="comments-section mt-8">
                    <h2 class="text-3xl font-bold text-dark-gray mb-6 font-heading">Komentar ({{ $post->comments_count }})</h2>
                    @forelse ($post->comments as $comment)
                        <div class="bg-gray-50 p-5 rounded-lg mb-4 border border-gray-200">
                            <p class="font-semibold text-dark-gray">{{ $comment->user }}</p>
                            <p class="text-gray-700 mt-1">{{ $comment->text }}</p>
                            <p class="text-gray-500 text-sm mt-2">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    @empty
                        <p class="text-gray-600 italic">Belum ada komentar. Jadilah yang pertama!</p>
                    @endforelse

                    {{-- Form untuk menambahkan komentar (akan diimplementasikan lebih lanjut) --}}
                    <div class="mt-8 border-t pt-6">
                        <h3 class="text-2xl font-bold text-dark-gray mb-4">Tambahkan Komentar</h3>
                        @auth
                            {{-- Jika user sudah login, tampilkan form komentar --}}
                            <form action="#" method="POST"> {{-- # placeholder action --}}
                                @csrf
                                <textarea name="comment_content" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary mb-4" placeholder="Tulis komentar Anda di sini..."></textarea>
                                <button type="submit" class="bg-primary text-white px-6 py-3 rounded-full font-semibold hover:bg-red-600 transition duration-300 shadow-md">Kirim Komentar</button>
                            </form>
                        @else
                            {{-- Jika user belum login --}}
                            <p class="text-gray-700 text-lg">Anda perlu <a href="{{ route('login') }}" class="text-primary hover:underline font-semibold">Login</a> atau <a href="{{ route('register') }}" class="text-primary hover:underline font-semibold">Daftar</a> untuk meninggalkan komentar.</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
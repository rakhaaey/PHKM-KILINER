@extends('layouts.app')

@section('content')
    <section class="py-16 bg-soft-orange">
        <div class="container mx-auto px-6 md:px-8 max-w-2xl">
            <h1 class="text-4xl md:text-5xl font-extrabold text-dark-gray text-center mb-10 font-heading">Mulai Diskusi Baru</h1>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 p-8">
                <form action="{{ route('forum.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="title" class="block text-gray-700 text-lg font-semibold mb-2">Judul Diskusi</label>
                        <input type="text" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-lg" placeholder="Contoh: Resep Diet Sehat untuk Mahasiswa" required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="content" class="block text-gray-700 text-lg font-semibold mb-2">Isi Diskusi</label>
                        <textarea name="content" id="content" rows="8" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-lg" placeholder="Tulis detail diskusi Anda di sini..." required></textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-primary text-white px-8 py-3 rounded-full font-semibold text-lg hover:bg-red-600 transition duration-300 shadow-md">Posting Diskusi</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
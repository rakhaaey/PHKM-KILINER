@extends('layouts.app') {{-- Pastikan Anda memiliki layout ini --}}

@section('content')
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 md:px-8 max-w-4xl">
            {{-- Tombol Kembali --}}
            <a href="{{ route('resep.index') }}" class="text-primary hover:underline mb-8 inline-flex items-center text-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar Resep
            </a>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 p-8">
                {{-- Periksa tag gambar ini --}}
                <img src="{{ $recipe->image_url }}"
                     alt="{{ $recipe->title }}"
                     class="w-full h-96 object-cover object-center rounded-lg mb-8 shadow-md"
                     onerror="this.onerror=null;this.src='https://placehold.co/800x600/cccccc/333333?text=Gambar+Tidak+Tersedia';">
                {{-- Atribut onerror akan menampilkan gambar placeholder jika URL asli gagal dimuat --}}

                <h1 class="text-4xl md:text-5xl font-extrabold text-dark-gray mb-4 font-heading leading-tight">{{ $recipe->title }}</h1>
                <p class="text-gray-700 text-lg mb-6">{{ $recipe->description }}</p>

                <div class="flex items-center justify-between text-gray-600 mb-6 border-b pb-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l3 3a1 1 0 001.414-1.414L11 9.586V6z" clip-rule="evenodd"></path></svg>
                        <span class="font-semibold">Waktu Persiapan:</span> {{ $recipe->prep_time }}
                    </div>
                    <div class="flex items-center text-yellow-500">
                        @for ($i = 0; $i < round($recipe->average_rating); $i++)
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.929 8.72c-.783-.57-.381-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"></path></svg>
                        @endfor
                        <span class="ml-2 text-gray-600 text-base">({{ $recipe->ratings_count }} ulasan)</span>
                    </div>
                </div>

                @if($recipe->is_healthy)
                    <span class="inline-block bg-secondary text-white text-base font-bold px-4 py-2 rounded-full mb-6 shadow-sm">Bergizi</span>
                @else
                    <span class="inline-block bg-red-500 text-white text-base font-bold px-4 py-2 rounded-full mb-6 shadow-sm">Tidak Bergizi</span>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
                    <div>
                        <h2 class="text-3xl font-bold text-dark-gray mb-4 font-heading">Bahan-bahan</h2>
                        <ul class="list-disc list-inside text-gray-700 text-lg space-y-2">
                            @if (is_array($recipe->ingredients) || is_object($recipe->ingredients))
                                @foreach ($recipe->ingredients as $ingredient)
                                    <li>{{ $ingredient }}</li>
                                @endforeach
                            @else
                                {{-- Jika ingredients masih dalam bentuk string setelah di-decode (misal, kalau hanya 1 bahan) --}}
                                <li>{{ $recipe->ingredients }}</li>
                            @endif
                        </ul>
                    </div>

                    <div>
                        <h2 class="text-3xl font-bold text-dark-gray mb-4 font-heading">Informasi Gizi</h2>
                        <ul class="list-disc list-inside text-gray-700 text-lg space-y-2">
                            @if (is_array($recipe->nutritional_info))
                                @foreach ($recipe->nutritional_info as $key => $value)
                                    <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                                @endforeach
                            @else
                                <li>Tidak ada informasi gizi.</li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="mt-8 border-t pt-8 border-gray-200">
                    <h2 class="text-3xl font-bold text-dark-gray mb-4 font-heading">Instruksi Memasak</h2>
                    <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed font-sans">
                        @foreach (explode("\n", $recipe->instructions) as $instruction)
                            @if (!empty(trim($instruction))) {{-- Pastikan tidak menampilkan baris kosong --}}
                                <p>{{ trim($instruction) }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="mt-10 pt-6 border-t border-gray-200 text-gray-600 text-sm text-center">
                <p>Selamat mencoba resep ini!</p>
            </div>
        </div>
    </section>
@endsection

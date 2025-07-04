@extends('layouts.app')

@section('content')
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 md:px-8">
            <h1 class="text-5xl font-extrabold text-dark-gray text-center mb-12 font-heading">Rekomendasi Terbaik untuk Anda</h1>

            <p class="text-center text-lg text-gray-700 mb-10 leading-relaxed font-sans">
                Temukan resep dan artikel paling populer berdasarkan penilaian dari komunitas PHCM.
            </p>

            @php
                $recommendedItems = [
                    (object)[
                        'title' => 'Salad Ayam Alpukat Sehat',
                        'slug' => 'salad-ayam-alpukat-sehat',
                        'image_url' => 'https://source.unsplash.com/random/800x600?salad,chicken',
                        'description' => 'Resep salad ayam alpukat yang kaya protein dan serat, cocok untuk diet.',
                        'type' => 'recipe', // Tipe item: 'recipe' atau 'article'
                        'average_rating' => 4.8,
                        'ratings_count' => 125,
                    ],
                    (object)[
                        'title' => 'Nasi Goreng Spesial',
                        'slug' => 'nasi-goreng-spesial',
                        'image_url' => 'https://source.unsplash.com/random/800x600?fried-rice,indonesian-food',
                        'description' => 'Resep nasi goreng khas Indonesia dengan bumbu medok dan topping melimpah.',
                        'type' => 'recipe',
                        'average_rating' => 4.5,
                        'ratings_count' => 200,
                    ],
                    (object)[
                        'title' => 'Manfaat Diet Seimbang untuk Kesehatan Jangka Panjang',
                        'slug' => 'manfaat-diet-seimbang',
                        'image_url' => 'https://source.unsplash.com/random/800x600?healthy-food,nutrition',
                        'description' => 'Diet seimbang adalah kunci untuk menjaga kesehatan tubuh secara keseluruhan dan mencegah berbagai penyakit kronis...',
                        'type' => 'article',
                        'average_rating' => 4.7,
                        'ratings_count' => 90,
                    ],
                    (object)[
                        'title' => 'Smoothie Buah Naga Berry',
                        'slug' => 'smoothie-buah-naga-berry',
                        'image_url' => 'https://source.unsplash.com/random/800x600?smoothie,dragon-fruit',
                        'description' => 'Minuman segar dan bergizi tinggi, cocok untuk sarapan atau camilan sehat.',
                        'type' => 'recipe',
                        'average_rating' => 4.9,
                        'ratings_count' => 90,
                    ],
                    (object)[
                        'title' => 'Pentingnya Sarapan Sehat: Energi untuk Aktivitas Seharian',
                        'slug' => 'pentingnya-sarapan-sehat',
                        'image_url' => 'https://source.unsplash.com/random/800x600?breakfast,healthy',
                        'description' => 'Sarapan seringkali dilewatkan, padahal sangat penting untuk memberikan energi dan fokus sepanjang hari. Cari tahu alasannya di sini!',
                        'type' => 'article',
                        'average_rating' => 4.8,
                        'ratings_count' => 75,
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($recommendedItems as $item)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transform hover:-translate-y-2 transition duration-300 ease-in-out border border-gray-100">
                        <img src="{{ $item->image_url ?? asset('images/placeholder.jpg') }}" alt="{{ $item->title }}" class="w-full h-56 object-cover object-center">
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold text-dark-gray mb-2 font-heading leading-tight">{{ $item->title }}</h3>
                            <p class="text-gray-700 text-base mb-3 font-sans">{{ Str::limit($item->description, 100) }}</p>
                            <div class="flex items-center mb-4">
                                <div class="flex text-yellow-500 mr-2">
                                    @for ($i = 0; $i < round($item->average_rating); $i++)
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.929 8.72c-.783-.57-.381-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"></path></svg>
                                    @endfor
                                    @for ($i = round($item->average_rating); $i < 5; $i++)
                                        <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.929 8.72c-.783-.57-.381-1.81.588-1.81h3.462a1 1 0 00.95-.69l1.07-3.292z"></path></svg>
                                    @endfor
                                </div>
                                <span class="text-gray-600 text-sm">({{ $item->ratings_count }} rating)</span>
                            </div>
                            <a href="{{ $item->type === 'recipe' ? route('resep.show', $item->slug) : route('artikel.show', $item->slug) }}" class="text-primary hover:text-red-700 font-semibold flex items-center transition duration-200 group">
                                Lihat Detail
                                <svg class="w-5 h-5 ml-1 transform group-hover:translate-x-1 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-600 col-span-full py-10 text-xl">Belum ada rekomendasi yang tersedia.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
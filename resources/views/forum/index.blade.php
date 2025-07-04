@extends('layouts.app')

@section('content')
    <section class="py-16 bg-soft-orange">
        <div class="container mx-auto px-6 md:px-8">
            <h1 class="text-5xl font-extrabold text-dark-gray text-center mb-12 font-heading">Forum Komunitas PHCM</h1>

            {{-- PHP Block for Data and Logic (already there) --}}
            @php
                $forumPosts = [
                    (object)[
                        'title' => 'Resep Diet Keto untuk Pemula',
                        'slug' => 'resep-diet-keto-pemula',
                        'content' => 'Halo semua! Ada yang punya resep diet keto yang gampang buat pemula? Saya baru mulai dan bingung mau masak apa...',
                        'user_name' => 'KetoLover88',
                        'created_at' => \Carbon\Carbon::parse('2025-06-28 10:00:00'),
                        'comments_count' => 15,
                    ],
                    (object)[
                        'title' => 'Tips Menyimpan Sayuran Agar Awet Lebih Lama',
                        'slug' => 'tips-menyimpan-sayuran',
                        'content' => 'Saya sering banget sayuran layu sebelum sempat dimasak. Ada tips jitu menyimpan sayuran agar tetap segar lebih lama?',
                        'user_name' => 'GreenThumb',
                        'created_at' => \Carbon\Carbon::parse('2025-06-27 14:30:00'),
                        'comments_count' => 22,
                    ],
                    (object)[
                        'title' => 'Rekomendasi Protein Nabati Selain Tahu Tempe',
                        'slug' => 'protein-nabati-alternatif',
                        'content' => 'Bosan dengan tahu dan tempe. Ada rekomendasi sumber protein nabati lain yang enak dan mudah diolah?',
                        'user_name' => 'VeganExplorer',
                        'created_at' => \Carbon\Carbon::parse('2025-06-26 09:15:00'),
                        'comments_count' => 18,
                    ],
                    (object)[
                        'title' => 'Pengalaman Menurunkan Berat Badan dengan Intermittent Fasting',
                        'slug' => 'intermittent-fasting-pengalaman',
                        'content' => 'Siapa di sini yang berhasil dengan intermittent fasting? Boleh share pengalaman dan tipsnya dong!',
                        'user_name' => 'FastFit',
                        'created_at' => \Carbon\Carbon::parse('2025-06-25 11:45:00'),
                        'comments_count' => 30,
                    ],
                    (object)[
                        'title' => 'Resep Dessert Sehat Tapi Tetap Enak',
                        'slug' => 'dessert-sehat-enak',
                        'content' => 'Pengen makan manis tapi takut kalorinya tinggi. Ada ide dessert sehat yang rasanya tetap juara?',
                        'user_name' => 'SweetTooth',
                        'created_at' => \Carbon\Carbon::parse('2025-06-24 16:00:00'),
                        'comments_count' => 10,
                    ],
                ];

                // Manual Pagination Configuration (copy from controller if using dummy data directly in blade)
                $perPage = 5;
                $currentPage = request('page', 1);
                $totalPosts = collect($forumPosts)->count();
                $offset = ($currentPage * $perPage) - $perPage;

                $paginatedForumPosts = new \Illuminate\Pagination\LengthAwarePaginator(
                    collect($forumPosts)->forPage($currentPage, $perPage),
                    $totalPosts,
                    $perPage,
                    $currentPage,
                    ['path' => url()->current(), 'query' => request()->except('page')]
                );
            @endphp

            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden p-8 border border-gray-100">
                <div class="flex justify-between items-center mb-6 border-b pb-4">
                    <h2 class="text-3xl font-bold text-dark-gray font-heading">Topik Diskusi Terbaru</h2>
                    @auth
                        {{-- Jika user sudah login, tampilkan tombol "Mulai Diskusi Baru" --}}
                        <a href="{{ route('forum.create') }}" class="bg-primary text-white px-6 py-2 rounded-full font-semibold hover:bg-red-600 transition duration-300 shadow-md">Mulai Diskusi Baru</a>
                    @else
                        {{-- Jika user belum login, tampilkan tombol Login/Daftar --}}
                        <div class="flex space-x-3">
                            <a href="{{ route('login') }}" class="bg-primary text-white px-6 py-2 rounded-full font-semibold hover:bg-red-600 transition duration-300 shadow-md">Login untuk Berdiskusi</a>
                            <a href="{{ route('register') }}" class="bg-secondary text-white px-6 py-2 rounded-full font-semibold hover:bg-green-600 transition duration-300 shadow-md">Daftar Sekarang</a>
                        </div>
                    @endauth
                </div>

                <ul class="space-y-6">
                    @forelse ($paginatedForumPosts as $post) {{-- Gunakan $paginatedForumPosts --}}
                        <li class="border border-gray-200 rounded-lg p-5 hover:bg-light-gray transition duration-200">
                            {{-- Bungkus seluruh konten <li> dengan tag <a> --}}
                            <a href="{{ route('forum.show', $post->slug) }}" class="block">
                                <h3 class="text-2xl font-semibold text-primary mb-2 font-heading leading-tight">{{ $post->title }}</h3>
                                <p class="text-gray-700 text-base mb-3 font-sans">{{ Str::limit($post->content, 150) }}</p>
                                <div class="flex items-center text-gray-500 text-sm">
                                    <span>Diposting oleh <span class="font-medium">{{ $post->user_name }}</span> pada {{ $post->created_at->format('d M Y') }}</span>
                                    <span class="ml-4 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM8.5 7.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zm5 0a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" clip-rule="evenodd"></path></svg>
                                        {{ $post->comments_count }} Komentar
                                    </span>
                                </div>
                            </a>
                        </li>
                    @empty
                        <p class="text-center text-gray-600 py-10 text-xl">Belum ada diskusi di forum ini. Jadilah yang pertama!</p>
                    @endforelse
                </ul>

                {{-- Pagination --}}
                <div class="mt-8">
                    {{ $paginatedForumPosts->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
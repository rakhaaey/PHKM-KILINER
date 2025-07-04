<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController; // Tambahkan baris ini

class ForumController extends BaseController // Ubah ini dari 'Controller' menjadi 'BaseController'
{
    // Deklarasikan properti $forumPosts tanpa inisialisasi awal di sini.
    // Inisialisasi akan dilakukan di dalam constructor.
    private $forumPosts;

    public function __construct()
    {
        // Terapkan middleware 'auth' untuk semua metode di ForumController
        // KECUALI 'index' (daftar forum) dan 'show' (detail forum).
        // Ini berarti 'create' dan 'store' akan memerlukan autentikasi.
        $this->middleware('auth')->except(['index', 'show']);

        // Pindahkan seluruh inisialisasi data dummy ke dalam constructor.
        // Ini mengatasi masalah "Constant expression contains invalid operations".
        $this->forumPosts = [
            (object)[
                'title' => 'Resep Diet Keto untuk Pemula',
                'slug' => 'resep-diet-keto-pemula',
                'content' => 'Halo semua! Ada yang punya resep diet keto yang gampang buat pemula? Saya baru mulai dan bingung mau masak apa...',
                'user_name' => 'KetoLover88',
                'created_at' => '2025-06-28 10:00:00', // String
                'comments_count' => 15,
                'full_content' => 'Halo semua! Ada yang punya resep diet keto yang gampang buat pemula? Saya baru mulai dan bingung mau masak apa. Mohon bantuannya ya! Saya juga penasaran dengan efek samping dan cara mengatasinya. Terima kasih sebelumnya!',
                'comments' => [
                    (object)['user' => 'HealthyEater', 'text' => 'Coba cek resep brokoli keju panggang, mudah banget!', 'created_at' => '2025-06-28 11:00:00'], // String
                    (object)['user' => 'FitLife', 'text' => 'Intermittent fasting juga bisa dikombinasikan dengan keto loh.', 'created_at' => '2025-06-28 12:30:00'],
                ]
            ],
            (object)[
                'title' => 'Tips Menyimpan Sayuran Agar Awet Lebih Lama',
                'slug' => 'tips-menyimpan-sayuran',
                'content' => 'Saya sering banget sayuran layu sebelum sempat dimasak. Ada tips jitu menyimpan sayuran agar tetap segar lebih lama?',
                'user_name' => 'GreenThumb',
                'created_at' => '2025-06-27 14:30:00',
                'comments_count' => 22,
                'full_content' => 'Saya sering banget sayuran layu sebelum sempat dimasak. Ada tips jitu menyimpan sayuran agar tetap segar lebih lama? Terutama untuk sayuran daun seperti bayam atau selada. Mohon sarannya!',
                'comments' => [
                    (object)['user' => 'FreshProduce', 'text' => 'Gunakan tisu basah di dasar wadah penyimpanan.', 'created_at' => '2025-06-27 15:00:00'],
                    (object)['user' => 'KitchenHacks', 'text' => 'Blanching sayuran sebelum disimpan juga bisa membantu.', 'created_at' => '2025-06-27 16:15:00'],
                ]
            ],
            (object)[
                'title' => 'Rekomendasi Protein Nabati Selain Tahu Tempe',
                'slug' => 'protein-nabati-alternatif',
                'content' => 'Bosan dengan tahu dan tempe. Ada rekomendasi sumber protein nabati lain yang enak dan mudah diolah?',
                'user_name' => 'VeganExplorer',
                'created_at' => '2025-06-26 09:15:00',
                'comments_count' => 18,
                'full_content' => 'Bosan dengan tahu dan tempe yang itu-itu saja. Ada rekomendasi sumber protein nabati lain yang enak dan mudah diolah untuk variasi menu sehari-hari? Saya butuh inspirasi baru!',
                'comments' => [
                    (object)['user' => 'PlantBasedGuru', 'text' => 'Coba edamame atau lentil! Enak dan serbaguna.', 'created_at' => '2025-06-26 10:00:00'],
                    (object)['user' => 'Foodie_ID', 'text' => 'Jamur tiram juga bisa jadi alternatif.', 'created_at' => '2025-06-26 11:30:00'],
                ]
            ],
            (object)[
                'title' => 'Pengalaman Menurunkan Berat Badan dengan Intermittent Fasting',
                'slug' => 'intermittent-fasting-pengalaman',
                'content' => 'Siapa di sini yang berhasil dengan intermittent fasting? Boleh share pengalaman dan tipsnya dong!',
                'user_name' => 'FastFit',
                'created_at' => '2025-06-25 11:45:00',
                'comments_count' => 30,
                'full_content' => 'Siapa di sini yang berhasil dengan intermittent fasting? Boleh share pengalaman dan tipsnya dong! Saya tertarik mencoba tapi masih ragu-ragu. Bagus untuk pemula seperti apa ya?',
                'comments' => [
                    (object)['user' => 'DietQueen', 'text' => 'Saya berhasil turun 5kg dalam sebulan!', 'created_at' => '2025-06-25 12:30:00'],
                    (object)['user' => 'HealthJourney', 'text' => 'Kuncinya konsisten dan minum air putih yang banyak.', 'created_at' => '2025-06-25 14:00:00'],
                ]
            ],
            (object)[
                'title' => 'Resep Dessert Sehat Tapi Tetap Enak',
                'slug' => 'dessert-sehat-enak',
                'content' => 'Pengen makan manis tapi takut kalorinya tinggi. Ada ide dessert sehat yang rasanya tetap juara?',
                'user_name' => 'SweetTooth',
                'created_at' => '2025-06-24 16:00:00',
                'comments_count' => 10,
                'full_content' => 'Pengen makan manis tapi takut kalorinya tinggi. Ada ide dessert sehat yang rasanya tetap juara? Yang mudah dibuat di rumah ya, dan bahannya gampang dicari!',
                'comments' => [
                    (object)['user' => 'BakingLover', 'text' => 'Smoothie bowl dengan buah dan granola bisa jadi pilihan.', 'created_at' => '2025-06-24 17:00:00'],
                    (object)['user' => 'DessertKing', 'text' => 'Puding chia seed cokelat, cobain deh!', 'created_at' => '2025-06-24 18:30:00'],
                ]
            ],
        ];
    }

    /**
     * Menampilkan daftar postingan forum.
     */
    public function index(Request $request)
    {
        // Clone the dummy data to avoid modifying the original
        $forumPostsData = collect($this->forumPosts)->map(function ($post) {
            // Convert created_at to Carbon object
            $post->created_at = Carbon::parse($post->created_at);
            return $post;
        });

        // Untuk data dummy, kita akan melakukan paginasi manual di sini
        $perPage = 5; // Jumlah post per halaman
        $currentPage = $request->get('page', 1);

        // Filter dan paginate secara manual (untuk dummy data)
        $paginatedPosts = new \Illuminate\Pagination\LengthAwarePaginator(
            $forumPostsData->forPage($currentPage, $perPage),
            $forumPostsData->count(),
            $perPage,
            $currentPage,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('forum.index', ['forumPosts' => $paginatedPosts]);
    }

    /**
     * Menampilkan detail postingan forum.
     */
    public function show($slug)
    {
        // Cari postingan berdasarkan slug
        // Pastikan kita meng-clone objek dummy agar tidak mengubahnya secara permanen jika ada operasi di halaman show
        $post = collect($this->forumPosts)->firstWhere('slug', $slug);

        // Jika postingan tidak ditemukan, tampilkan 404
        if (!$post) {
            abort(404, 'Postingan forum tidak ditemukan.');
        }

        // Konversi created_at dan created_at di komentar menjadi objek Carbon
        // Lakukan cloning agar perubahan tidak memengaruhi data dummy asli di properti kelas
        $post = (object) json_decode(json_encode($post), false); // Deep clone object

        $post->created_at = Carbon::parse($post->created_at);
        if (isset($post->comments)) {
            $post->comments = collect($post->comments)->map(function ($comment) {
                $comment->created_at = Carbon::parse($comment->created_at);
                return $comment;
            });
        }

        return view('forum.show', compact('post'));
    }

    /**
     * Menampilkan form untuk membuat diskusi baru.
     * Metode ini dilindungi oleh middleware 'auth' melalui constructor.
     */
    public function create()
    {
        return view('forum.create'); // Buat view ini nanti
    }

    /**
     * Menyimpan diskusi baru.
     * Metode ini dilindungi oleh middleware 'auth' melalui constructor.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // TODO: Implementasi logika penyimpanan ke database di sini
        // Untuk data dummy, kita tidak akan benar-benar menyimpannya.
        // Anda akan menggunakan model dan Eloquent di sini:
        // $newPost = ForumPost::create([
        //     'user_id' => auth()->id(),
        //     'title' => $request->title,
        //     'slug' => Str::slug($request->title),
        //     'content' => $request->content,
        // ]);

        // Redirect kembali ke halaman forum dengan pesan sukses
        return redirect()->route('forum.index')->with('success', 'Diskusi baru berhasil ditambahkan!');
    }

    // Anda bisa menambahkan metode edit, update, destroy di sini jika diperlukan
    // public function edit($id) { ... }
    // public function update(Request $request, $id) { ... }
    // public function destroy($id) { ... }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; // Penting: Tambahkan ini jika Str::contains digunakan di controller

class RecipeController extends Controller
{
    /**
     * Menampilkan daftar resep.
     */
    public function index()
    {
        // TODO: Implementasi logika untuk mengambil dan menampilkan daftar resep
        // Data resep dan paginasi akan ditangani di blade untuk kasus ini
        return view('recipes.index'); // Pastikan Anda memiliki file resources/views/recipes/index.blade.php
    }

    /**
     * Menampilkan resep populer.
     */
    public function popular()
    {
        // TODO: Implementasi logika untuk mengambil dan menampilkan resep populer
        return view('recipes.popular'); // Buat file ini jika belum ada
    }

    /**
     * Menampilkan detail resep berdasarkan slug.
     */
    public function show($slug)
    {
        // Data dummy resep (HARUS SAMA DENGAN YANG ADA DI index.blade.php agar konsisten)
        $allRecipes = [
            (object)[
                'title' => 'Salad Ayam Alpukat Sehat',
                'slug' => 'salad-ayam-alpukat-sehat',
                'image_url' => 'https://tse3.mm.bing.net/th/id/OIP.xFD7yfbqieBIkM-1qRndyAHaEy?w=237&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3',
                'description' => 'Resep salad ayam alpukat yang kaya protein dan serat, cocok untuk diet.',
                'is_healthy' => true,
                'prep_time' => '20 Menit',
                'average_rating' => 4.8,
                'ratings_count' => 125,
                'ingredients' => json_encode(['200g dada ayam panggang, potong dadu', '1 buah alpukat, potong dadu', '1 mangkuk selada campur', '50g tomat ceri, belah dua', '1/4 bawang bombay merah, iris tipis', 'Saus lemon-madu (minyak zaitun, perasan lemon, sedikit madu, garam, lada)']),
                'nutritional_info' => json_encode(['Kalori' => '350', 'Protein' => '35g', 'Lemak' => '20g', 'Karbohidrat' => '15g']),
                'instructions' => "1. Panggang atau rebus dada ayam hingga matang, lalu potong dadu.\n2. Potong alpukat, tomat ceri, dan iris bawang bombay.\n3. Dalam mangkuk besar, campurkan selada, ayam, alpukat, tomat, dan bawang bombay.\n4. Campurkan bahan saus lemon-madu, aduk rata.\n5. Tuang saus ke atas salad, aduk perlahan. Sajikan segera."
            ],
            (object)[
                'title' => 'Nasi Goreng Spesial',
                'slug' => 'nasi-goreng-spesial',
                'image_url' => 'https://tse1.mm.bing.net/th/id/OIP.H9I9EGALDCJI15ynbYM78AHaEc?w=267&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3',
                'description' => 'Resep nasi goreng khas Indonesia dengan bumbu medok dan topping melimpah.',
                'is_healthy' => false,
                'prep_time' => '30 Menit',
                'average_rating' => 4.5,
                'ratings_count' => 200,
                'ingredients' => json_encode(['2 piring nasi putih dingin', '100g ayam, potong dadu', '50g udang, bersihkan', '2 telur, orak-arik', '2 siung bawang putih, cincang', '3 bawang merah, iris', '1/2 sdt terasi', 'Kecap manis secukupnya', 'Garam, lada, minyak goreng', 'Pelengkap: acar, kerupuk, tomat, timun']),
                'nutritional_info' => json_encode(['Kalori' => '600', 'Protein' => '25g', 'Lemak' => '30g', 'Karbohidrat' => '60g']),
                'instructions' => "1. Haluskan bawang putih, bawang merah, dan terasi.\n2. Panaskan minyak, tumis bumbu halus hingga harum. Masukkan ayam dan udang, masak hingga berubah warna.\n3. Masukkan nasi dingin, aduk rata. Tambahkan kecap manis, garam, dan lada. Aduk hingga nasi terurai dan bumbu tercampur rata.\n4. Masukkan telur orak-arik, aduk sebentar. Sajikan nasi goreng dengan pelengkap."
            ],
            (object)[
                'title' => 'Smoothie Buah Naga Berry',
                'slug' => 'smoothie-buah-naga-berry',
                'image_url' => 'https://tse3.mm.bing.net/th/id/OIP._tZfyaEbK7gRb08evSWaRgHaE8?w=260&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3',
                'description' => 'Minuman segar dan bergizi tinggi, cocok untuk sarapan atau camilan sehat.',
                'is_healthy' => true,
                'prep_time' => '10 Menit',
                'average_rating' => 4.9,
                'ratings_count' => 90,
                'ingredients' => json_encode(['1 buah naga merah, potong', '100g campuran berry beku', '1 buah pisang', '150ml susu almond (atau susu lain)', '1 sdm madu (opsional)', 'Es batu secukupnya']),
                'nutritional_info' => json_encode(['Kalori' => '250', 'Protein' => '5g', 'Lemak' => '3g', 'Karbohidrat' => '50g']),
                'instructions' => "1. Masukkan semua bahan ke dalam blender.\n2. Blender hingga halus dan creamy.\n3. Tuang ke dalam gelas dan sajikan dingin."
            ],
            (object)[
                'title' => 'Pasta Aglio Olio Pedas',
                'slug' => 'pasta-aglio-olio-pedas',
                'image_url' => 'https://tse2.mm.bing.net/th/id/OIP.vQwW7e5GC8j7x-VN5abd8gAAAA?w=224&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3',
                'description' => 'Pasta sederhana namun kaya rasa dengan sentuhan pedas yang menggugah selera.',
                'is_healthy' => false,
                'prep_time' => '25 Menit',
                'average_rating' => 4.6,
                'ratings_count' => 150,
                'ingredients' => json_encode(['200g spaghetti', '4 siung bawang putih, iris tipis', '2 cabe rawit merah, iris tipis', '2 sdm minyak zaitun', 'Peterseli cincang secukupnya', 'Garam, lada', 'Keju parmesan parut (opsional)']),
                'nutritional_info' => json_encode(['Kalori' => '450', 'Protein' => '15g', 'Lemak' => '25g', 'Karbohidrat' => '40g']),
                'instructions' => "1. Rebus spaghetti hingga al dente, sisihkan sedikit air rebusan pasta.\n2. Panaskan minyak zaitun, tumis bawang putih dan cabe hingga harum dan bawang keemasan.\n3. Masukkan spaghetti, aduk rata. Tambahkan sedikit air rebusan pasta jika terlalu kering. Bumbui dengan garam dan lada.\n4. Taburkan peterseli cincang. Sajikan panas, bisa ditambah keju parmesan."
            ],
            (object)[
                'title' => 'Sup Krim Jagung Manis',
                'slug' => 'sup-krim-jagung-manis',
                'image_url' => 'https://tse3.mm.bing.net/th/id/OIP.ZVP-lDldzhSYpbIobV10UAHaE8?w=265&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3',
                'description' => 'Sup krim jagung yang lembut dan gurih, cocok sebagai hidangan pembuka hangat.',
                'is_healthy' => true,
                'prep_time' => '35 Menit',
                'average_rating' => 4.7,
                'ratings_count' => 80,
                'ingredients' => json_encode(['2 buah jagung manis, pipil', '500ml kaldu ayam/sayur', '100ml susu cair', '2 sdm tepung maizena, larutkan dengan sedikit air', '1/2 bawang bombay, cincang', '1 siung bawang putih, cincang', 'Garam, lada, gula secukupnya']),
                'nutritional_info' => json_encode(['Kalori' => '200', 'Protein' => '8g', 'Lemak' => '10g', 'Karbohidrat' => '25g']),
                'instructions' => "1. Tumis bawang bombay dan bawang putih hingga harum.\n2. Masukkan jagung pipil dan kaldu, masak hingga jagung empuk.\n3. Blender sebagian jagung (opsional untuk tekstur lebih kental), lalu campurkan kembali ke panci.\n4. Tuang susu cair dan larutan maizena, aduk hingga mengental. Bumbui dengan garam, lada, dan sedikit gula.\n5. Sajikan hangat."
            ],
            (object)[
                'title' => 'Ayam Geprek Sambal Matah',
                'slug' => 'ayam-geprek-sambal-matah',
                'image_url' => 'https://tse3.mm.bing.net/th/id/OIP.QMkyIhLZIk1YYSGNG9VFbwHaE7?w=291&h=193&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3',
                'description' => 'Ayam goreng krispi yang digeprek dengan sambal matah segar, pedasnya nampol!',
                'is_healthy' => false,
                'prep_time' => '40 Menit',
                'average_rating' => 4.7,
                'ratings_count' => 300,
                'ingredients' => json_encode(['2 potong dada/paha ayam', 'Tepung bumbu serbaguna', 'Minyak goreng', 'Untuk Sambal Matah:', '8 siung bawang merah, iris tipis', '5 batang serai, ambil putihnya, iris tipis', '10-15 buah cabe rawit merah, iris tipis', '5 lembar daun jeruk, buang tulang, iris tipis', '1/2 sdt terasi bakar', 'Garam, gula secukupnya', '5 sdm minyak kelapa panas']),
                'nutritional_info' => json_encode(['Kalori' => '700', 'Protein' => '40g', 'Lemak' => '50g', 'Karbohidrat' => '20g']),
                'instructions' => "1. Lumuri ayam dengan tepung bumbu, goreng hingga kuning keemasan dan renyah. Tiriskan.\n2. Campurkan semua bahan sambal matah dalam wadah, aduk rata. Siram dengan minyak kelapa panas, aduk kembali.\n3. Letakkan ayam goreng di atas cobek, tuang sambal matah di atasnya. Geprek ayam hingga bumbu meresap.\n4. Sajikan ayam geprek dengan nasi hangat."
            ],
            (object)[
                'title' => 'Oatmeal Buah Berry & Kacang',
                'slug' => 'oatmeal-buah-berry-kacang',
                'image_url' => 'https://tse1.mm.bing.net/th/id/OIP.88JUFluGrNjBfxnJQihEZwHaEK?w=315&h=180&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3',
                'description' => 'Sarapan sehat dan mengenyangkan dengan serat tinggi dari oatmeal dan buah-buahan.',
                'is_healthy' => true,
                'prep_time' => '10 Menit',
                'average_rating' => 4.8,
                'ratings_count' => 70,
                'ingredients' => json_encode(['50g rolled oats', '200ml air atau susu (pilih susu rendah lemak/nabati)', 'Segenggam buah berry segar/beku', '1 sdm kacang-kacangan (almond/kenari), cincang', '1 sdt biji chia (opsional)', 'Madu atau sirup maple secukupnya (opsional)']),
                'nutritional_info' => json_encode(['Kalori' => '280', 'Protein' => '10g', 'Lemak' => '8g', 'Karbohidrat' => '45g']),
                'instructions' => "1. Masak rolled oats dengan air/susu hingga matang dan mengental.\n2. Tuang oatmeal ke dalam mangkuk. Tambahkan buah berry, kacang cincang, dan biji chia.\n3. Beri sedikit madu atau sirup maple jika suka. Sajikan hangat."
            ],
            (object)[
                'title' => 'Martabak Manis Coklat Keju',
                'slug' => 'martabak-manis-coklat-keju',
                'image_url' => 'https://tse4.mm.bing.net/th/id/OIP.rzBYa6xr14iuZD4ViQIoVgHaEK?w=331&h=186&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3',
                'description' => 'Martabak manis klasik dengan topping coklat meses dan keju parut melimpah.',
                'is_healthy' => false,
                'prep_time' => '60 Menit',
                'average_rating' => 4.9,
                'ratings_count' => 250,
                'ingredients' => json_encode(['Adonan martabak (terigu, gula, telur, soda kue, air, ragi instan)', 'Coklat meses secukupnya', 'Keju cheddar parut secukupnya', 'Susu kental manis', 'Mentega/margarin']),
                'nutritional_info' => json_encode(['Kalori' => '800', 'Protein' => '15g', 'Lemak' => '40g', 'Karbohidrat' => '90g']),
                'instructions' => "1. Buat adonan martabak manis (ini butuh proses fermentasi).\n2. Panaskan teflon martabak, tuang adonan, masak hingga bergelembung dan pinggiran matang.\n3. Olesi mentega, taburi meses dan keju, siram susu kental manis.\n4. Lipat martabak, potong-potong, sajikan hangat."
            ],
            (object)[
                'title' => 'Tumis Brokoli Udang',
                'slug' => 'tumis-brokoli-udang',
                'image_url' => 'https://tse1.mm.bing.net/th/id/OIP.lPNPR5Gio70zmyhFKc2IzQHaFP?w=264&h=187&c=7&r=0&o=7&dpr=1.3&pid=1.7&rm=3',
                'description' => 'Hidangan sehat dan cepat saji, cocok untuk makan malam ringan.',
                'is_healthy' => true,
                'prep_time' => '25 Menit',
                'average_rating' => 4.6,
                'ratings_count' => 60,
                'ingredients' => json_encode(['200g udang, bersihkan', '1 bonggol brokoli, potong per kuntum', '2 siung bawang putih, cincang', '1/2 buah bawang bombay, iris', '1 sdm saus tiram', '1/2 sdt minyak wijen', 'Garam, lada, sedikit air', 'Minyak untuk menumis']),
                'nutritional_info' => json_encode(['Kalori' => '280', 'Protein' => '30g', 'Lemak' => '12g', 'Karbohidrat' => '10g']),
                'instructions' => "1. Rebus brokoli sebentar hingga setengah matang, tiriskan.\n2. Panaskan minyak, tumis bawang putih dan bawang bombay hingga harum.\n3. Masukkan udang, masak hingga berubah warna.\n4. Masukkan brokoli, saus tiram, minyak wijen, garam, lada, dan sedikit air. Aduk rata.\n5. Masak hingga semua bahan matang dan bumbu meresap. Sajikan hangat."
            ],
            (object)[
                'title' => 'Donat Klasik Gula Halus',
                'slug' => 'donat-klasik-gula-halus',
                'image_url' => 'data:image/webp;base64,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',
                'description' => 'Donat empuk dan lembut dengan taburan gula halus yang manis.',
                'is_healthy' => false,
                'prep_time' => '90 Menit',
                'average_rating' => 4.3,
                'ratings_count' => 180,
                'ingredients' => json_encode(['250g tepung terigu protein tinggi', '50g gula pasir', '1 butir telur', '1 sdt ragi instan', '1/4 sdt garam', '100ml susu cair hangat', '30g margarin/mentega', 'Gula halus untuk taburan', 'Minyak goreng']),
                'nutritional_info' => json_encode(['Kalori' => '400', 'Protein' => '5g', 'Lemak' => '20g', 'Karbohidrat' => '50g']),
                'instructions' => "1. Campurkan terigu, gula, ragi, garam. Aduk rata. Masukkan telur dan susu hangat, uleni hingga kalis.\n2. Masukkan margarin, uleni hingga elastis. Diamkan 45-60 menit hingga mengembang dua kali lipat.\n3. Kempiskan adonan, bentuk donat, diamkan 15-20 menit lagi.\n4. Goreng donat dengan api kecil hingga matang kuning keemasan. Angkat, tiriskan.\n5. Setelah dingin, taburi dengan gula halus."
            ]
        ];

        // Cari resep berdasarkan slug
        $recipe = collect($allRecipes)->firstWhere('slug', $slug);

        // Jika resep tidak ditemukan, tampilkan 404
        if (!$recipe) {
            abort(404, 'Resep tidak ditemukan.');
        }

        // Dekode string JSON ingredients dan nutritional_info menjadi array/object PHP
        $recipe->ingredients = json_decode($recipe->ingredients);
        $recipe->nutritional_info = json_decode($recipe->nutritional_info, true); // true untuk associative array

        return view('recipes.show', compact('recipe'));
    }
}
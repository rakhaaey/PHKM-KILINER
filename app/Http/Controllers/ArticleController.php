<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{    public function index()
    {
        // Logika data dummy dan paginasi akan tetap di Blade untuk kasus ini,
        // tetapi jika menggunakan database, logika query akan ada di sini.
        return view('articles.index');
    }

    // Ini untuk halaman detail artikel
    public function show($slug)
    {
        // Data dummy yang sama seperti di Blade (atau ambil dari database jika sudah ada)
        $allArticles = [
            (object)[
                'title' => 'Manfaat Diet Seimbang untuk Kesehatan Jangka Panjang',
                'slug' => 'manfaat-diet-seimbang',
                'image_url' => 'https://source.unsplash.com/random/800x600?healthy-food,nutrition',
                'excerpt' => 'Diet seimbang adalah kunci untuk menjaga kesehatan tubuh secara keseluruhan dan mencegah berbagai penyakit kronis...',
                'content' => 'Diet seimbang adalah pondasi utama untuk mencapai kesehatan optimal dan kualitas hidup yang lebih baik. Ini bukan hanya tentang menurunkan berat badan, tetapi juga memastikan tubuh mendapatkan semua nutrisi yang dibutuhkan. Mengonsumsi berbagai jenis makanan, termasuk buah-buahan, sayuran, biji-bijian, protein tanpa lemak, dan lemak sehat, dapat membantu mencegah penyakit kronis seperti diabetes, penyakit jantung, dan beberapa jenis kanker. Diet seimbang juga mendukung fungsi kekebalan tubuh yang kuat, meningkatkan energi, dan memperbaiki suasana hati. Penting untuk menghindari makanan olahan tinggi gula dan lemak trans, serta membatasi konsumsi garam berlebih. Dengan perencanaan yang baik dan pilihan makanan yang cerdas, diet seimbang dapat menjadi gaya hidup yang menyenangkan dan berkelanjutan.',
                'published_at' => \Carbon\Carbon::parse('2025-06-29'),
            ],
            (object)[
                'title' => '5 Mitos Populer Seputar Makanan Sehat yang Perlu Diketahui',
                'slug' => 'mitos-makanan-sehat',
                'image_url' => 'https://source.unsplash.com/random/800x600?food-myths,healthy-eating',
                'excerpt' => 'Banyak informasi simpang siur tentang makanan sehat. Mari kita luruskan 5 mitos yang paling sering beredar...',
                'content' => 'Ada banyak mitos yang beredar tentang makanan sehat, yang seringkali menyesatkan dan membuat kita salah paham. Mitos pertama adalah "lemak itu jahat". Padahal, lemak sehat seperti dari alpukat dan kacang-kacangan sangat penting bagi tubuh. Mitos kedua, "makan setelah jam 6 sore bikin gemuk". Kenyataannya, total asupan kalori harian lebih penting daripada waktu makan. Mitos ketiga, "diet detoks bisa membersihkan tubuh". Organ tubuh kita sudah punya sistem detoksifikasi alami yang sangat efisien. Mitos keempat, "semua karbohidrat itu buruk". Karbohidrat kompleks dari biji-bijian utuh adalah sumber energi penting. Terakhir, mitos bahwa "makanan organik selalu lebih sehat". Meskipun organik baik, perbedaan nutrisi seringkali minimal dibandingkan dengan produk konvensional.',
                'published_at' => \Carbon\Carbon::parse('2025-06-25'),
            ],
            (object)[
                'title' => 'Panduan Praktis Memulai Gaya Hidup Zero Waste di Dapur',
                'slug' => 'zero-waste-dapur',
                'image_url' => 'https://source.unsplash.com/random/800x600?zero-waste,kitchen',
                'excerpt' => 'Mengurangi sampah dapur bisa dimulai dari hal kecil. Ikuti panduan zero waste ini untuk dapur yang lebih ramah lingkungan...',
                'content' => 'Gaya hidup zero waste di dapur tidak hanya mengurangi jejak karbon Anda, tetapi juga bisa menghemat uang. Langkah pertama adalah berbelanja dengan tas belanja kain dan menghindari produk dengan kemasan berlebih. Kedua, prioritaskan membeli bahan makanan lokal dan musiman untuk mengurangi jejak karbon transportasi. Ketiga, manfaatkan sisa makanan. Kulit sayuran bisa dijadikan kaldu, sisa buah bisa jadi infused water, atau gunakan sisa sayur untuk membuat kompos. Keempat, investasikan pada wadah penyimpanan yang bisa digunakan ulang dan hindari plastik sekali pakai. Terakhir, rencanakan menu makan Anda agar tidak ada makanan yang terbuang. Dengan kesadaran dan sedikit usaha, dapur Anda bisa menjadi lebih berkelanjutan.',
                'published_at' => \Carbon\Carbon::parse('2025-06-20'),
            ],
            (object)[
                'title' => 'Pentingnya Sarapan Sehat: Energi untuk Aktivitas Seharian',
                'slug' => 'pentingnya-sarapan-sehat',
                'image_url' => 'https://source.unsplash.com/random/800x600?breakfast,healthy',
                'excerpt' => 'Sarapan seringkali dilewatkan, padahal sangat penting untuk memberikan energi dan fokus sepanjang hari. Cari tahu alasannya di sini!',
                'content' => 'Sarapan adalah waktu makan terpenting dalam sehari, berfungsi sebagai "bahan bakar" pertama bagi tubuh setelah berpuasa semalaman. Sarapan sehat memberikan energi yang dibutuhkan untuk memulai aktivitas, meningkatkan konsentrasi dan kinerja kognitif, serta membantu menjaga berat badan ideal. Melewatkan sarapan dapat menyebabkan penurunan energi, sulit konsentrasi, dan cenderung makan berlebihan di waktu makan berikutnya. Pilihlah sarapan yang kaya serat dan protein, seperti oatmeal dengan buah, telur dan roti gandum, atau smoothie. Hindari sarapan tinggi gula dan karbohidrat olahan yang bisa menyebabkan lonjakan dan penurunan gula darah secara cepat. Dengan sarapan yang tepat, Anda akan merasa lebih bertenaga dan siap menghadapi hari.',
                'published_at' => \Carbon\Carbon::parse('2025-06-15'),
            ],
            (object)[
                'title' => 'Resep Makanan Penambah Imunitas di Musim Pancaroba',
                'slug' => 'resep-imunitas',
                'image_url' => 'https://source.unsplash.com/random/800x600?immune-boosting-food,spices',
                'excerpt' => 'Musim pancaroba rentan penyakit. Perkuat sistem imun Anda dengan resep makanan lezat ini yang kaya vitamin dan mineral!',
                'content' => 'Di musim pancaroba, sistem imun kita membutuhkan dukungan ekstra. Makanan adalah cara terbaik untuk memperkuat pertahanan tubuh. Resep seperti sup ayam jahe, tumis brokoli bawang putih, atau smoothie bayam-jeruk adalah pilihan yang sangat baik. Bahan-bahan seperti jahe, bawang putih, kunyit, buah-buahan citrus, dan sayuran hijau gelap kaya akan vitamin C, antioksidan, dan senyawa anti-inflamasi yang berperan penting dalam menjaga kekebalan tubuh. Sertakan juga makanan fermentasi seperti yogurt atau kimchi untuk kesehatan usus, yang erat kaitannya dengan sistem imun. Dengan konsumsi makanan bergizi ini, Anda dapat membantu tubuh melawan infeksi dan tetap sehat sepanjang musim.',
                'published_at' => \Carbon\Carbon::parse('2025-06-10'),
            ],
            (object)[
                'title' => 'Mengapa Protein Penting untuk Diet dan Pembentukan Otot?',
                'slug' => 'pentingnya-protein',
                'image_url' => 'https://source.unsplash.com/random/800x600?protein,meat',
                'excerpt' => 'Protein adalah makronutrien esensial yang vital untuk berbagai fungsi tubuh, terutama bagi Anda yang sedang diet atau membentuk otot.',
                'content' => 'Protein adalah salah satu dari tiga makronutrien utama (bersama karbohidrat dan lemak) yang sangat penting untuk kesehatan dan fungsi tubuh. Protein berperan dalam membangun dan memperbaiki jaringan, membuat enzim dan hormon, serta mendukung sistem kekebalan tubuh. Bagi Anda yang sedang diet, protein dapat membantu merasa kenyang lebih lama, mengurangi nafsu makan, dan mempertahankan massa otot saat defisit kalori. Untuk pembentukan otot, protein menyediakan blok bangunan (asam amino) yang diperlukan untuk sintesis protein otot, yang merupakan proses kunci dalam pertumbuhan dan perbaikan otot setelah berolahraga. Sumber protein yang baik meliputi daging tanpa lemak, ikan, telur, produk susu, kacang-kacangan, dan polong-polongan.',
                'published_at' => \Carbon\Carbon::parse('2025-06-05'),
            ],
            (object)[
                'title' => 'Cara Membuat Makanan Pendamping ASI (MPASI) yang Bergizi',
                'slug' => 'mpasi-bergizi',
                'image_url' => 'https://source.unsplash.com/random/800x600?baby-food,puree',
                'excerpt' => 'Panduan lengkap membuat MPASI yang aman, lezat, dan kaya nutrisi untuk tumbuh kembang optimal si kecil.',
                'content' => 'Memulai MPASI adalah fase penting dalam pertumbuhan bayi. Kunci utamanya adalah memastikan MPASI kaya nutrisi, aman, dan sesuai usia. Mulailah dengan tekstur yang lembut dan tunggal, seperti bubur saring dari beras atau kentang. Setelah bayi terbiasa, perkenalkan variasi buah-buahan, sayuran, dan sumber protein seperti daging ayam, ikan, atau tahu yang dihaluskan. Pastikan semua bahan bersih dan dimasak hingga matang sempurna. Hindari penambahan gula, garam, dan penyedap rasa pada MPASI. Perhatikan tanda-tanda alergi setelah memperkenalkan makanan baru. Dengan MPASI yang bergizi seimbang, Anda mendukung perkembangan fisik dan kognitif si kecil secara optimal.',
                'published_at' => \Carbon\Carbon::parse('2025-05-30'),
            ],
        ];

        $article = collect($allArticles)->firstWhere('slug', $slug);

        if (!$article) {
            abort(404); // Atau arahkan ke halaman 404 kustom
        }

        return view('articles.show', compact('article'));
    }
}
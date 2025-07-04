
<footer class="bg-dark-gray text-white py-12">
    <div class="container mx-auto px-6 md:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
        {{-- Kolom 1: PHCM Info --}}
        <div>
            <h3 class="text-3xl font-extrabold text-primary mb-4 font-heading">PHCM</h3>
            <p class="text-gray-300 text-sm leading-relaxed">
                Platform Kuliner Sehat dan Interaktif. Misi kami adalah memberdayakan Anda
                untuk menjelajahi dunia kuliner sehat dengan mudah dan menyenangkan.
            </p>
        </div>

        {{-- Kolom 2: Link Cepat --}}
        <div>
            <h4 class="text-xl font-semibold text-white mb-4 font-heading">Link Cepat</h4>
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-primary transition duration-300">Beranda</a></li>
                <li><a href="{{ route('resep.index') }}" class="text-gray-300 hover:text-primary transition duration-300">Resep</a></li>
                <li><a href="{{ route('artikel.index') }}" class="text-gray-300 hover:text-primary transition duration-300">Artikel</a></li>
                <li><a href="{{ route('forum.index') }}" class="text-gray-300 hover:text-primary transition duration-300">Forum</a></li>
            </ul>
        </div>

        {{-- Kolom 3: Bantuan & Info --}}
        <div>
            <h4 class="text-xl font-semibold text-white mb-4 font-heading">Bantuan & Info</h4>
            <ul class="space-y-2">
                {{-- Pastikan rute ini sesuai dengan yang ada di web.php Anda --}}
                <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-primary transition duration-300">Tentang Kami</a></li>
                <li><a href="{{ route('help') }}" class="text-gray-300 hover:text-primary transition duration-300">Bantuan</a></li>
                <li><a href="{{ route('terms') }}" class="text-gray-300 hover:text-primary transition duration-300">Syarat & Ketentuan</a></li>
                <li><a href="{{ route('privacy') }}" class="text-gray-300 hover:text-primary transition duration-300">Kebijakan Privasi</a></li>
            </ul>
        </div>

        {{-- Kolom 4: Ikuti Kami & Kontak Kami --}}
        <div>
            <h4 class="text-xl font-semibold text-white mb-4 font-heading">Ikuti Kami</h4>
            <div class="flex space-x-4 mb-6">
                {{-- Contoh ikon media sosial, Anda bisa mengganti '#' dengan URL asli --}}
                <a href="#" class="text-gray-300 hover:text-primary transition duration-300"><img src="https://placehold.co/24x24/cccccc/333333?text=Fb" alt="Facebook" class="w-6 h-6 rounded-full"></a>
                <a href="#" class="text-gray-300 hover:text-primary transition duration-300"><img src="https://placehold.co/24x24/cccccc/333333?text=Ig" alt="Instagram" class="w-6 h-6 rounded-full"></a>
                <a href="#" class="text-gray-300 hover:text-primary transition duration-300"><img src="https://placehold.co/24x24/cccccc/333333?text=Tw" alt="Twitter" class="w-6 h-6 rounded-full"></a>
                <a href="#" class="text-gray-300 hover:text-primary transition duration-300"><img src="https://placehold.co/24x24/cccccc/333333?text=Yt" alt="YouTube" class="w-6 h-6 rounded-full"></a>
            </div>

            <h4 class="text-xl font-semibold text-white mb-4 font-heading">Kontak Kami</h4>
            <p class="text-gray-300 text-sm">Email: info@phcm.com</p>
            <p class="text-gray-300 text-sm">Telepon: (021) 123-4567</p>
        </div>
    </div>

    <div class="container mx-auto px-6 md:px-8 text-center text-gray-400 text-sm mt-8 border-t border-gray-700 pt-8">
        &copy; 2025 PHCM. Semua Hak Dilindungi.
    </div>
</footer>
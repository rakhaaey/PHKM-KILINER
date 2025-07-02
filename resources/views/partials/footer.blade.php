<footer class="bg-gray-800 text-white py-8">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center px-6 md:px-8 text-sm">
        <div class="flex flex-wrap justify-center md:justify-start space-x-4 md:space-x-6 mb-4 md:mb-0">
            <a href="/tentang" class="hover:text-red-400 transition duration-300 ease-in-out">Tentang Kami</a>
            <a href="/bantuan" class="hover:text-red-400 transition duration-300 ease-in-out">Pusat Bantuan</a>
            <a href="/ketentuan" class="hover:text-red-400 transition duration-300 ease-in-out">Syarat & Ketentuan</a>
            <a href="/privasi" class="hover:text-red-400 transition duration-300 ease-in-out">Kebijakan Privasi</a>
        </div>
        <div class="flex space-x-5">
            <a href="https://facebook.com/mercubuana" target="_blank" rel="noopener noreferrer" class="text-white hover:text-red-400 transform hover:scale-110 transition duration-300 ease-in-out">
                <img src="{{ asset('icons/facebook.png') }}" alt="Facebook" class="h-6 w-6">
            </a>
            <a href="https://twitter.com/mercubuana" target="_blank" rel="noopener noreferrer" class="text-white hover:text-red-400 transform hover:scale-110 transition duration-300 ease-in-out">
                <img src="{{ asset('icons/twitter.png') }}" alt="Twitter" class="h-6 w-6">
            </a>
            <a href="https://instagram.com/universitasmercubuana" target="_blank" rel="noopener noreferrer" class="text-white hover:text-red-400 transform hover:scale-110 transition duration-300 ease-in-out">
                <img src="{{ asset('icons/instagram.png') }}" alt="Instagram" class="h-6 w-6">
            </a>
        </div>
    </div>
    <div class="text-center text-gray-500 text-xs mt-6 px-6 md:px-8">
        &copy; {{ date('Y') }} PHCM - Universitas Mercu Buana. Hak Cipta Dilindungi.
    </div>
</footer>
<footer class="bg-gradient-to-br from-slate-800 to-blue-900 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-store text-white"></i>
                    </div>
                    <div>
                        <p class="text-lg font-semibold">Toko Sembako Anti</p>
                    </div>
                </div>
                <p class="text-slate-300 mb-4">Melayani dengan hati, menyediakan kebutuhan rumah tangga Anda dengan kualitas terbaik dan harga terjangkau.</p>
                <div class="flex space-x-4">
                    <a href="#" class="w-8 h-8 bg-slate-700 rounded-full flex items-center justify-center hover:bg-blue-500 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-8 h-8 bg-slate-700 rounded-full flex items-center justify-center hover:bg-blue-400 transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-8 h-8 bg-slate-700 rounded-full flex items-center justify-center hover:bg-pink-500 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-slate-300 hover:text-white transition">Beranda</a></li>
                    <li><a href="{{ route('produk') }}" class="text-slate-300 hover:text-white transition">Produk</a></li>
                    <li><a href="{{ route('tentang') }}" class="text-slate-300 hover:text-white transition">Tentang Kami</a></li>
                    <li><a href="{{ route('kontak') }}" class="text-slate-300 hover:text-white transition">Kontak</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Kategori</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('produk') }}#shampo" class="text-slate-300 hover:text-white transition">Shampo & Perawatan</a></li>
                    <li><a href="{{ route('produk') }}#sabun" class="text-slate-300 hover:text-white transition">Sabun Mandi</a></li>
                    <li><a href="{{ route('produk') }}#bumbu" class="text-slate-300 hover:text-white transition">Bumbu Dapur</a></li>
                    <li><a href="{{ route('produk') }}#minuman" class="text-slate-300 hover:text-white transition">Minuman</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                <ul class="space-y-2">
                    <li class="flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt text-blue-400"></i>
                        <span class="text-slate-300">Jl. Teppo Batu, Kec. Pammana, Kab. Wajo</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fas fa-phone text-blue-400"></i>
                        <span class="text-slate-300">+62 822-1325-3954</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fas fa-envelope text-blue-400"></i>
                        <span class="text-slate-300">SunarthiAnti@gmail.com</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fas fa-clock text-blue-400"></i>
                        <span class="text-slate-300">Buka Setiap Hari 08:00 - 21:00</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-slate-700 mt-8 pt-8 text-center">
            <p class="text-slate-400">&copy; 2025 Toko Sembako Anti. All rights reserved.</p>
        </div>
    </div>
</footer>
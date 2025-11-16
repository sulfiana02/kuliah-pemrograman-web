@extends('layouts.app')

@section('title', 'Beranda - Toko Sembako Anti')

@section('content')
    <section class="hero-bg text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-bounce-in">Selamat Datang di Toko Sembako Anti</h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90">Tempat terpercaya untuk semua kebutuhan rumah tangga Anda dengan harga terjangkau dan kualitas terbaik</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('produk') }}" class="bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-lg hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-1 shadow-lg">
                        <i class="fas fa-shopping-bag mr-2"></i>Belanja Sekarang
                    </a>
                    <a href="#produk-populer" class="bg-white/20 backdrop-blur-sm text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white/30 transition-all duration-300 transform hover:-translate-y-1">
                        <i class="fas fa-star mr-2"></i>Produk Populer
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Mengapa Memilih Kami?</h2>
                <p class="text-lg text-slate-600 max-w-2xl mx-auto">Kami berkomitmen memberikan pelayanan terbaik dengan produk berkualitas untuk kepuasan pelanggan</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6 rounded-xl bg-gradient-to-br from-blue-50 to-indigo-50 hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-tags text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-800 mb-2">Harga Terjangkau</h3>
                    <p class="text-slate-600">Harga kompetitif dengan kualitas terjamin untuk semua produk</p>
                </div>
                <div class="text-center p-6 rounded-xl bg-gradient-to-br from-green-50 to-emerald-50 hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-award text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-800 mb-2">Kualitas Terbaik</h3>
                    <p class="text-slate-600">Produk segar dan berkualitas tinggi langsung dari supplier terpercaya</p>
                </div>
                <div class="text-center p-6 rounded-xl bg-gradient-to-br from-purple-50 to-pink-50 hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shipping-fast text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-slate-800 mb-2">Pelayanan Cepat</h3>
                    <p class="text-slate-600">Proses pembelian mudah dan pengiriman cepat ke seluruh wilayah</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-slate-50" id="produk-populer">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Produk Populer</h2>
                <p class="text-lg text-slate-600">Produk terlaris dengan kualitas terbaik dari toko kami</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @foreach([
                    ['name' => 'Indomie', 'price' => 3000, 'image' => 'indomie.jpeg', 'category' => 'mie'],
                    ['name' => 'Kopi Uang Emas', 'price' => 15000, 'image' => 'uang emas.jpeg', 'category' => 'kopi'],
                    ['name' => 'Minyak Kita 2 Liter', 'price' => 38000, 'image' => 'minyak kita.jpeg', 'category' => 'minyak'],
                    ['name' => 'Teh Pucuk', 'price' => 5000, 'image' => 'teh pucuk.jpeg', 'category' => 'minuman']
                ] as $product)
                <div class="product-card bg-white rounded-xl shadow-sm p-6 border border-slate-100 cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-xl" 
                     data-product="{{ $product['name'] }}" 
                     data-price="{{ $product['price'] }}" 
                     data-category="{{ $product['category'] }}" 
                     data-image="{{ $product['image'] }}">
                    <div class="h-32 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg mb-4 flex items-center justify-center">
                        <img src="{{ asset('image/' . $product['image']) }}" alt="{{ $product['name'] }}" class="product-image">
                    </div>
                    <h4 class="font-semibold text-lg text-slate-800">{{ $product['name'] }}</h4>
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-1 rounded-full text-sm font-semibold inline-block mt-2">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('produk') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-8 py-3 rounded-full font-semibold hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    Lihat Semua Produk
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Kategori Produk</h2>
                <p class="text-lg text-slate-600">Temukan berbagai kategori produk kebutuhan sehari-hari</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <a href="{{ route('produk') }}#shampo" class="category-card bg-gradient-to-br from-blue-50 to-indigo-100 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border-2 border-transparent hover:border-blue-200">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-pump-soap text-white text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-slate-800">Shampo & Perawatan</h3>
                </a>
                <a href="{{ route('produk') }}#sabun" class="category-card bg-gradient-to-br from-green-50 to-emerald-100 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border-2 border-transparent hover:border-green-200">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-soap text-white text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-slate-800">Sabun Mandi</h3>
                </a>
                <a href="{{ route('produk') }}#bumbu" class="category-card bg-gradient-to-br from-amber-50 to-orange-100 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border-2 border-transparent hover:border-amber-200">
                    <div class="w-12 h-12 bg-amber-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-mortar-pestle text-white text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-slate-800">Bumbu Dapur</h3>
                </a>
                <a href="{{ route('produk') }}#minuman" class="category-card bg-gradient-to-br from-purple-50 to-pink-100 rounded-xl p-6 text-center hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border-2 border-transparent hover:border-purple-200">
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-wine-bottle text-white text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-slate-800">Minuman</h3>
                </a>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-br from-slate-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-800 mb-4">Apa Kata Pelanggan?</h2>
                <p class="text-lg text-slate-600">Testimoni dari pelanggan setia Toko Sembako Anti</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-semibold mr-4">
                            AS
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-800">Ahmad Surya</h4>
                            <div class="flex text-amber-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-slate-600">"Produk lengkap dan harga terjangkau. Pelayanan ramah dan cepat. Recommended banget!"</p>
                </div>
            
            </div>
        </div>
    </section>

    <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Memenuhi Kebutuhan Harian Anda?</h2>
            <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">Dapatkan produk berkualitas dengan harga terbaik hanya di Toko Sembako Anti</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('produk') }}" class="bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-lg hover:bg-blue-50 transition-all duration-300 transform hover:-translate-y-1 shadow-lg">
                    <i class="fas fa-shopping-cart mr-2"></i>Mulai Belanja
                </a>
                <a href="https://wa.me/6282213253954" class="bg-green-500 text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-green-600 transition-all duration-300 transform hover:-translate-y-1 shadow-lg">
                    <i class="fab fa-whatsapp mr-2"></i>Chat via WhatsApp
                </a>
            </div>
        </div>
    </section>
@endsection
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Toko Sembako Anti</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'primary': {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        },
                        'accent': {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.3s ease-in-out',
                        'slide-up': 'slideUp 0.3s ease-out',
                        'slide-in-right': 'slideInRight 0.3s ease-out',
                        'bounce-in': 'bounceIn 0.5s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideInRight: {
                            '0%': { transform: 'translateX(100%)' },
                            '100%': { transform: 'translateX(0)' },
                        },
                        bounceIn: {
                            '0%': { transform: 'scale(0.3)', opacity: '0' },
                            '50%': { transform: 'scale(1.05)' },
                            '70%': { transform: 'scale(0.9)' },
                            '100%': { transform: 'scale(1)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .timeline {
            position: relative;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 100%;
            background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
        }
        @media (max-width: 768px) {
            .timeline::before {
                left: 20px;
            }
        }
        /* Perbaikan untuk tombol keranjang di mobile */
        .cart-icon {
            z-index: 60;
            position: relative;
        }
        @media (max-width: 768px) {
            .cart-icon {
                padding: 8px;
                margin-right: 8px;
            }
        }
    </style>
</head>
<body class="bg-slate-50 font-inter">
    <!-- Header -->
    <header class="bg-gradient-to-br from-slate-50 to-blue-50 shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="index.html" class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center shadow-md">
                            <i class="fas fa-store text-white text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-slate-800">Toko Sembako Anti</h1>
                            <p class="text-sm text-slate-600">Kebutuhan harian dengan harga terjangkau</p>
                        </div>
                    </a>
                </div>
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="/" class="text-slate-700 font-medium relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:-bottom-1 after:left-0 after:transition-all after:duration-300 hover:after:w-full">Beranda</a>
                    <a href="/produk" class="text-slate-700 font-medium relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:-bottom-1 after:left-0 after:transition-all after:duration-300 hover:after:w-full">Produk</a>
                    <a href="/tentang" class="text-blue-600 font-medium relative after:content-[''] after:absolute after:w-full after:h-0.5 after:bg-blue-500 after:-bottom-1 after:left-0">Tentang</a>
                    <a href="/kontak" class="text-slate-700 font-medium relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:-bottom-1 after:left-0 after:transition-all after:duration-300 hover:after:w-full">Kontak</a>
                    <div class="cart-icon ml-4 relative cursor-pointer">
                        <i class="fas fa-shopping-cart text-slate-700 text-xl"></i>
                        <span class="cart-count absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">0</span>
                    </div>
                </div>
                <div class="md:hidden flex items-center">
                    <div class="cart-icon mr-4 relative cursor-pointer">
                        <i class="fas fa-shopping-cart text-slate-700 text-xl"></i>
                        <span class="cart-count absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">0</span>
                    </div>
                    <button id="mobile-menu-button" class="text-slate-700 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white py-4 px-4 shadow-lg">
            <div class="flex flex-col space-y-4">
                <a href="/" class="text-slate-700 font-medium">Beranda</a>
                <a href="/produk" class="text-slate-700 font-medium">Produk</a>
                <a href="/tentang" class="text-blue-600 font-medium">Tentang</a>
                <a href="/kontak" class="text-slate-700 font-medium">Kontak</a>
            </div>
        </div>
    </header>

    <!-- About Header -->
    <section class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Tentang Toko Sembako Anti</h1>
                <p class="text-xl mb-8">Melayani dengan hati, menyediakan kebutuhan rumah tangga Anda sejak 2010</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#story" class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full font-medium hover:bg-white/30 transition">Cerita Kami</a>
                    <a href="#team" class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full font-medium hover:bg-white/30 transition">Tim Kami</a>
                    <a href="#values" class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full font-medium hover:bg-white/30 transition">Nilai Kami</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Story -->
    <section class="bg-white py-20" id="story">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-slate-800 mb-6">Cerita Kami</h2>
                        <p class="text-slate-600 mb-6 leading-relaxed">
                            Toko Sembako Anti didirikan pada tahun 2010 oleh <strong>Ibu Sunarti</strong>, seorang ibu rumah tangga yang memiliki visi untuk menyediakan kebutuhan pokok berkualitas dengan harga terjangkau bagi masyarakat sekitar Pammana.
                        </p>
                        <p class="text-slate-600 mb-6 leading-relaxed">
                            Bermula dari sebuah toko kecil di Jl. Teppo Batu, kami tumbuh bersama komunitas dan menjadi bagian tak terpisahkan dari kehidupan sehari-hari warga. Setiap produk yang kami jual dipilih dengan teliti untuk memastikan kualitas dan kesegarannya.
                        </p>
                        <p class="text-slate-600 mb-6 leading-relaxed">
                            Hingga saat ini, kami tetap berkomitmen untuk memberikan pelayanan terbaik dengan senyuman dan keramahan khas keluarga. Bukan sekadar toko, tapi kami adalah tetangga yang peduli.
                        </p>
                        <div class="flex items-center space-x-4 mt-8">
                            <div class="flex items-center space-x-2 text-blue-600">
                                <i class="fas fa-heart"></i>
                                <span class="font-semibold">Melayani dengan Hati</span>
                            </div>
                            <div class="flex items-center space-x-2 text-green-600">
                                <i class="fas fa-check-circle"></i>
                                <span class="font-semibold">Terpercaya Sejak 2010</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="bg-gradient-to-br from-blue-100 to-indigo-100 rounded-2xl p-8 h-80 flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-store text-blue-500 text-6xl mb-4"></i>
                                <h3 class="text-2xl font-bold text-slate-800">14+ Tahun</h3>
                                <p class="text-slate-600">Melayani Masyarakat Pammana</p>
                                <div class="mt-4 flex justify-center space-x-4">
                                    <div class="text-center">
                                        <div class="text-xl font-bold text-blue-600">1.000+</div>
                                        <div class="text-sm text-slate-600">Pelanggan Setia</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-xl font-bold text-blue-600">50+</div>
                                        <div class="text-sm text-slate-600">Jenis Produk</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline -->
    <section class="bg-slate-50 py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-slate-800 text-center mb-12">Perjalanan Kami</h2>
                
                <div class="timeline">
                    <!-- 2010 -->
                    <div class="flex flex-col md:flex-row mb-12">
                        <div class="md:w-1/2 md:pr-8 md:text-right mb-4 md:mb-0">
                            <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200">
                                <h3 class="text-xl font-bold text-slate-800 mb-2">2010</h3>
                                <p class="text-slate-600">Toko Sembako Anti didirikan oleh Ibu Sunarti dengan modal seadanya dan tekad yang kuat</p>
                            </div>
                        </div>
                        <div class="md:w-1/2 md:pl-8 flex items-center justify-center">
                            <div class="w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg"></div>
                        </div>
                        <div class="md:w-1/2 md:pl-8"></div>
                    </div>

                    <!-- 2012 -->
                    <div class="flex flex-col md:flex-row mb-12">
                        <div class="md:w-1/2 md:pr-8"></div>
                        <div class="md:w-1/2 md:pl-8 flex items-center justify-center">
                            <div class="w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg"></div>
                        </div>
                        <div class="md:w-1/2 md:pl-8">
                            <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200">
                                <h3 class="text-xl font-bold text-slate-800 mb-2">2012</h3>
                                <p class="text-slate-600">Ekspansi pertama - menambah variasi produk dan mulai dikenal masyarakat luas</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2015 -->
                    <div class="flex flex-col md:flex-row mb-12">
                        <div class="md:w-1/2 md:pr-8 md:text-right mb-4 md:mb-0">
                            <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200">
                                <h3 class="text-xl font-bold text-slate-800 mb-2">2015</h3>
                                <p class="text-slate-600">Menjadi pemasok terpercaya untuk kebutuhan sehari-hari warga Pammana</p>
                            </div>
                        </div>
                        <div class="md:w-1/2 md:pl-8 flex items-center justify-center">
                            <div class="w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg"></div>
                        </div>
                        <div class="md:w-1/2 md:pl-8"></div>
                    </div>

                    <!-- 2020 -->
                    <div class="flex flex-col md:flex-row mb-12">
                        <div class="md:w-1/2 md:pr-8"></div>
                        <div class="md:w-1/2 md:pl-8 flex items-center justify-center">
                            <div class="w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg"></div>
                        </div>
                        <div class="md:w-1/2 md:pl-8">
                            <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200">
                                <h3 class="text-xl font-bold text-slate-800 mb-2">2020</h3>
                                <p class="text-slate-600">Tetap buka dan melayani selama pandemi dengan protokol kesehatan ketat</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2024 -->
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/2 md:pr-8 md:text-right mb-4 md:mb-0">
                            <div class="bg-white rounded-xl p-6 shadow-sm border border-slate-200">
                                <h3 class="text-xl font-bold text-slate-800 mb-2">2025</h3>
                                <p class="text-slate-600">Meluncurkan website untuk memudahkan pelanggan berbelanja online</p>
                            </div>
                        </div>
                        <div class="md:w-1/2 md:pl-8 flex items-center justify-center">
                            <div class="w-4 h-4 bg-blue-500 rounded-full border-4 border-white shadow-lg"></div>
                        </div>
                        <div class="md:w-1/2 md:pl-8"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="bg-white py-20" id="values">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-slate-800 mb-4">Kenapa Pilih Toko Kami?</h2>
                    <p class="text-slate-600">Beberapa alasan mengapa pelanggan setia selalu kembali ke toko kami</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-tags text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-4">Harga Terjangkau</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Kami selalu berusaha memberikan harga terbaik untuk semua produk. Tidak perlu khawatir tentang budget, karena kami paham kebutuhan sehari-hari harus tetap terjangkau bagi semua kalangan.
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
                        <div class="w-16 h-16 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-award text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-4">Kualitas Terjamin</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Setiap produk yang kami jual dipastikan fresh dan berkualitas. Kami langsung ambil dari distributor terpercaya, jadi Anda tidak perlu ragu dengan kualitasnya. Produk expired? Kami ganti!
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-cyan-500 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-smile text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-4">Pelayanan Ramah</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Staf kami selalu siap membantu dengan senyuman. Kami percaya pelayanan yang baik membuat pelanggan merasa nyaman dan ingin kembali lagi. Senyum kami gratis untuk Anda!
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-bolt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-4">Layanan Cepat</h3>
                        <p class="text-slate-600 leading-relaxed">
                            Tidak suka antri lama? Kami proses pesanan dengan cepat! Baik belanja di toko maupun pesan via WhatsApp, kami pastikan Anda tidak menunggu terlalu lama. Time is money!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Promise -->
    <section class="bg-slate-50 py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-slate-800 mb-4">Janji Kami untuk Anda</h2>
                <p class="text-slate-600 mb-12 max-w-2xl mx-auto">Hal-hal yang selalu kami usahakan untuk memberikan pengalaman berbelanja terbaik</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-hand-holding-heart text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-800 mb-3">Produk Segar</h3>
                        <p class="text-slate-600">Selalu menyediakan produk terbaru dan terfresh untuk kebutuhan harian Anda</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-20 h-20 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-comments text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-800 mb-3">Siap Bantu</h3>
                        <p class="text-slate-600">Butuh rekomendasi produk? Tim kami siap memberikan saran terbaik</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="w-20 h-20 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-shield-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-800 mb-3">Terpercaya</h3>
                        <p class="text-slate-600">Sudah dipercaya masyarakat sejak 2010 dengan ribuan pelanggan setia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section class="bg-white py-20" id="team">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-slate-800 mb-4">Siapa di Balik Toko?</h2>
                <p class="text-slate-600 mb-12 max-w-2xl mx-auto">Orang-orang yang selalu siap melayani dengan senyuman</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
                        <div class="w-24 h-24 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-user text-white text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-800 mb-2">Ibu Sunarti</h3>
                        <p class="text-blue-600 font-medium mb-4">Pemilik & Pendiri Toko</p>
                        <p class="text-slate-600 text-sm leading-relaxed">Yang merintis toko ini sejak 2010 dengan penuh semangat dan dedikasi. Selalu memastikan setiap pelanggan pulang dengan senyuman.</p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
                        <div class="w-24 h-24 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-user text-white text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-800 mb-2">Astuti & Sunarti</h3>
                        <p class="text-blue-600 font-medium mb-4">Tim Penjualan & Layanan</p>
                        <p class="text-slate-600 text-sm leading-relaxed">Siap membantu Anda memilih produk terbaik dengan ramah. Dikenal dengan senyuman dan kesabaran dalam melayani pelanggan.</p>
                    </div>

                    <div class="bg-white rounded-2xl p-8 text-center shadow-sm border border-slate-100 hover:shadow-md transition-shadow duration-300">
                        <div class="w-24 h-24 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-user text-white text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-slate-800 mb-2">Astuti</h3>
                        <p class="text-blue-600 font-medium mb-4">Bagian Kasir & Administrasi</p>
                        <p class="text-slate-600 text-sm leading-relaxed">Yang memastikan transaksi Anda berjalan lancar dan cepat. Ahli dalam menghitung dan memberikan kembalian yang tepat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fun Facts -->
    <section class="bg-slate-50 py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-slate-800 mb-4">Fakta Seru Tentang Kami</h2>
                <p class="text-slate-600 mb-12 max-w-2xl mx-auto">Beberapa hal menarik dari perjalanan toko kami</p>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-blue-600 mb-2" id="years-count">2010</div>
                        <p class="text-slate-600">Tahun Melayani</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-blue-600 mb-2" id="customers-count">1000+</div>
                        <p class="text-slate-600">Pelanggan Setia</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-blue-600 mb-2" id="products-count">50+</div>
                        <p class="text-slate-600">Jenis Produk</p>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-blue-600 mb-2">24/7</div>
                        <p class="text-slate-600">Bisa Pesan Online</p>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-8 border border-blue-100 max-w-2xl mx-auto">
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">Fun Fact!</h3>
                    <p class="text-slate-600 text-lg leading-relaxed">
                        Tahukah Anda? Produk paling laris di toko kami adalah <span class="font-semibold text-blue-600">Indomie Goreng</span> dan <span class="font-semibold text-blue-600">Kopi</span>! 
                        Rupanya warga Pammana paling suka sarapan dengan menu ini 😊
                    </p>
                    <div class="mt-4 flex justify-center space-x-4 text-sm text-slate-500">
                        <span>🏆 Indomie: 500+ bungkus/bulan</span>
                        <span>☕ Kopi: 300+ sachet/bulan</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Community -->
    <section class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-4">Bagian dari Keluarga Besar Pammana</h2>
                <p class="text-xl mb-8 opacity-90 leading-relaxed">
                    Kami bangga menjadi bagian dari masyarakat Pammana. Bukan sekadar toko, tapi kami adalah tetangga yang siap memenuhi kebutuhan sehari-hari keluarga Anda. Setiap senyuman pelanggan adalah kebahagiaan kami.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="produk.html" class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-slate-100 transition transform hover:-translate-y-1 shadow-lg">Lihat Produk Kami</a>
                    <a href="kontak.html" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white/10 transition transform hover:-translate-y-1">Yuk Ngobrol!</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-slate-800 to-blue-900 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-store text-white"></i>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Toko Sembako Anti</p>
                            <p class="text-sm text-slate-300">Melayani dengan hati, menyediakan kebutuhan rumah tangga Anda</p>
                        </div>
                    </div>
                </div>
                <div class="text-center md:text-right">
                    <p class="text-sm text-slate-300">&copy; 2025 Toko Anti. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Cart Sidebar -->
    <div class="cart-overlay fixed inset-0 bg-black/50 z-40 hidden" id="cart-overlay"></div>
    <div class="cart-sidebar fixed top-0 -right-96 w-80 h-full bg-white shadow-lg z-50 transition-all duration-300 p-5 overflow-y-auto" id="cart-sidebar">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-slate-800">Keranjang Belanja</h2>
            <div class="close-btn w-7 h-7 rounded-full bg-slate-100 flex items-center justify-center cursor-pointer transition-all duration-300 hover:bg-blue-500 hover:text-white" id="close-cart">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="cart-items" id="cart-items">
            <!-- Cart items will be added here dynamically -->
            <div class="text-center py-8 text-slate-500">
                <i class="fas fa-shopping-cart text-4xl mb-4"></i>
                <p>Keranjang belanja masih kosong</p>
                <p class="text-sm mt-2">Silakan kunjungi halaman produk untuk menambahkan item</p>
            </div>
        </div>
        <div class="cart-total flex justify-between mt-5 pt-5 border-t-2 border-slate-200 font-semibold text-lg text-slate-800 hidden" id="cart-total">
            <span>Total:</span>
            <span>Rp 0</span>
        </div>
        <!-- WhatsApp Checkout Button -->
        <button class="whatsapp-checkout-btn w-full mt-4 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white border-none rounded-lg cursor-pointer transition-all duration-300 hover:from-green-600 hover:to-green-700 hover:shadow-lg font-semibold flex items-center justify-center gap-3 text-lg hidden" id="whatsapp-checkout">
            <i class="fab fa-whatsapp text-xl"></i>
            Pesan via WhatsApp
        </button>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Animate numbers
        function animateValue(element, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const value = Math.floor(progress * (end - start) + start);
                element.textContent = value + "+";
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // Animate achievement numbers when they come into view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const yearsCount = document.getElementById('years-count');
                    const customersCount = document.getElementById('customers-count');
                    const productsCount = document.getElementById('products-count');
                    
                    animateValue(yearsCount, 0, 14, 2000);
                    animateValue(customersCount, 0, 1000, 2000);
                    animateValue(productsCount, 0, 50, 2000);
                    
                    observer.unobserve(entry.target);
                }
            });
        });

        const achievementsSection = document.querySelector('.bg-slate-50.py-20:last-of-type');
        if (achievementsSection) {
            observer.observe(achievementsSection);
        }

        // Cart functionality - PERBAIKAN UTAMA: Event listener untuk semua elemen keranjang
        const cartIcons = document.querySelectorAll('.cart-icon');
        const cartSidebar = document.getElementById('cart-sidebar');
        const cartOverlay = document.getElementById('cart-overlay');
        const closeCart = document.getElementById('close-cart');
        const cartItems = document.getElementById('cart-items');
        const cartTotal = document.getElementById('cart-total');
        const cartCounts = document.querySelectorAll('.cart-count');
        const whatsappCheckoutBtn = document.getElementById('whatsapp-checkout');

        let cart = [];

        // Open cart - PERBAIKAN: Event listener untuk semua ikon keranjang (desktop & mobile)
        cartIcons.forEach(icon => {
            icon.addEventListener('click', (e) => {
                e.stopPropagation(); // Mencegah event bubbling
                cartSidebar.classList.remove('-right-96');
                cartSidebar.classList.add('right-0');
                cartOverlay.classList.remove('hidden');
                updateCart();
            });
        });

        // Close cart
        closeCart.addEventListener('click', () => {
            cartSidebar.classList.remove('right-0');
            cartSidebar.classList.add('-right-96');
            cartOverlay.classList.add('hidden');
        });

        // Close cart when overlay is clicked
        cartOverlay.addEventListener('click', () => {
            cartSidebar.classList.remove('right-0');
            cartSidebar.classList.add('-right-96');
            cartOverlay.classList.add('hidden');
        });

        // WhatsApp Checkout
        whatsappCheckoutBtn.addEventListener('click', sendOrderToWhatsApp);

        // WhatsApp Integration Function
        function sendOrderToWhatsApp() {
            if (cart.length === 0) {
                showNotification('Keranjang belanja masih kosong', 'error');
                return;
            }

            // Format pesan WhatsApp
            let message = `🛒 *PESANAN TOKO SEMBAKO ANTI* 🛒\n\n`;
            message += `Halo! Saya ingin memesan produk berikut:\n\n`;
            
            // Detail produk
            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                message += `*${index + 1}. ${item.name}*\n`;
                message += `   💰 Harga Satuan: Rp ${item.price.toLocaleString('id-ID')}\n`;
                message += `   🔢 Jumlah: ${item.quantity} pcs\n`;
                message += `   ➕ Subtotal: Rp ${itemTotal.toLocaleString('id-ID')}\n\n`;
            });

            // Total
            const totalAmount = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
            message += `═══════════════════\n`;
            message += `💰 *TOTAL: Rp ${totalAmount.toLocaleString('id-ID')}*\n`;
            message += `═══════════════════\n\n`;
            message += `Silakan konfirmasi ketersediaan stock dan total yang harus dibayar. Terima kasih! 😊\n\n`;
            message += `_Pesan ini dikirim via website Toko Sembako Anti_`;

            // Nomor WhatsApp
            const phoneNumber = '6282213253954';
            
            // Encode message untuk URL
            const encodedMessage = encodeURIComponent(message);
            
            // Redirect ke WhatsApp
            window.open(`https://wa.me/${phoneNumber}?text=${encodedMessage}`, '_blank');
            
            // Tutup cart sidebar
            cartSidebar.classList.remove('right-0');
            cartSidebar.classList.add('-right-96');
            cartOverlay.classList.add('hidden');
            
            // Kosongkan keranjang setelah order
            cart = [];
            updateCart();
        }

        // Update cart display
        function updateCart() {
            // Clear cart items
            cartItems.innerHTML = '';
            
            let total = 0;
            let itemCount = 0;
            
            if (cart.length === 0) {
                cartItems.innerHTML = `
                    <div class="text-center py-8 text-slate-500">
                        <i class="fas fa-shopping-cart text-4xl mb-4"></i>
                        <p>Keranjang belanja masih kosong</p>
                        <p class="text-sm mt-2">Silakan kunjungi halaman produk untuk menambahkan item</p>
                    </div>
                `;
                cartTotal.classList.add('hidden');
                whatsappCheckoutBtn.classList.add('hidden');
            } else {
                // Add each item to cart
                cart.forEach(item => {
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;
                    itemCount += item.quantity;
                    
                    const cartItem = document.createElement('div');
                    cartItem.className = 'cart-item flex items-center mb-4 pb-4 border-b border-slate-200';
                    cartItem.innerHTML = `
                        <div class="cart-item-img w-14 h-14 rounded bg-slate-100 flex items-center justify-center mr-4">
                            <i class="fas fa-box text-slate-500"></i>
                        </div>
                        <div class="cart-item-details flex-1">
                            <div class="cart-item-title font-semibold mb-1 text-slate-800">${item.name}</div>
                            <div class="cart-item-price text-blue-500 font-semibold">Rp ${item.price.toLocaleString('id-ID')} x ${item.quantity}</div>
                        </div>
                        <div class="cart-item-actions flex items-center">
                            <div class="decrease-cart-item quantity-btn w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center cursor-pointer mx-1 hover:bg-slate-200 transition" data-product="${item.name}">-</div>
                            <span class="mx-2 text-slate-700">${item.quantity}</span>
                            <div class="increase-cart-item quantity-btn w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center cursor-pointer mx-1 hover:bg-slate-200 transition" data-product="${item.name}">+</div>
                        </div>
                    `;
                    
                    cartItems.appendChild(cartItem);
                });
                
                cartTotal.classList.remove('hidden');
                whatsappCheckoutBtn.classList.remove('hidden');
                
                // Update total and count
                cartTotal.innerHTML = `
                    <span>Total:</span>
                    <span>Rp ${total.toLocaleString('id-ID')}</span>
                `;
                
                // Add event listeners to cart item buttons
                document.querySelectorAll('.decrease-cart-item').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const productName = e.target.getAttribute('data-product');
                        decreaseCartItem(productName);
                    });
                });
                
                document.querySelectorAll('.increase-cart-item').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const productName = e.target.getAttribute('data-product');
                        increaseCartItem(productName);
                    });
                });
            }
            
            // PERBAIKAN: Update semua indikator jumlah keranjang
            cartCounts.forEach(count => {
                count.textContent = itemCount;
            });
        }

        // Decrease cart item quantity
        function decreaseCartItem(productName) {
            const item = cart.find(item => item.name === productName);
            
            if (item) {
                if (item.quantity > 1) {
                    item.quantity--;
                } else {
                    cart = cart.filter(item => item.name !== productName);
                }
                
                updateCart();
            }
        }

        // Increase cart item quantity
        function increaseCartItem(productName) {
            const item = cart.find(item => item.name === productName);
            
            if (item) {
                item.quantity++;
                updateCart();
            }
        }

        // Show notification
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
            const icon = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
            
            notification.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300 flex items-center`;
            notification.innerHTML = `
                <i class="fas ${icon} mr-2"></i>
                <span>${message}</span>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 5000);
        }

        // Untuk halaman tentang, tambahkan notifikasi bahwa keranjang tersedia di halaman produk
        cartIcons.forEach(icon => {
            icon.addEventListener('click', () => {
                if (cart.length === 0) {
                    showNotification('Keranjang belanja tersedia di halaman produk', 'info');
                }
            });
        });

        // Smooth scrolling untuk anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
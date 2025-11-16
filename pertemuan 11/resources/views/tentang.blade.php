@extends('layouts.app')

@section('title', 'Tentang Kami - Toko Sembako Anti')

@section('content')
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

    <section class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-4">Bagian dari Keluarga Besar Pammana</h2>
                <p class="text-xl mb-8 opacity-90 leading-relaxed">
                    Kami bangga menjadi bagian dari masyarakat Pammana. Bukan sekadar toko, tapi kami adalah tetangga yang siap memenuhi kebutuhan sehari-hari keluarga Anda. Setiap senyuman pelanggan adalah kebahagiaan kami.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('produk') }}" class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-slate-100 transition transform hover:-translate-y-1 shadow-lg">Lihat Produk Kami</a>
                    <a href="{{ route('kontak') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-semibold hover:bg-white/10 transition transform hover:-translate-y-1">Yuk Ngobrol!</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
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

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const yearsCount = document.getElementById('years-count');
                const customersCount = document.getElementById('customers-count');
                const productsCount = document.getElementById('products-count');
                
                if (yearsCount) animateValue(yearsCount, 0, 14, 2000);
                if (customersCount) animateValue(customersCount, 0, 1000, 2000);
                if (productsCount) animateValue(productsCount, 0, 50, 2000);
                
                observer.unobserve(entry.target);
            }
        });
    });

    const achievementsSection = document.querySelector('.bg-slate-50.py-20:last-of-type');
    if (achievementsSection) {
        observer.observe(achievementsSection);
    }
</script>
@endpush
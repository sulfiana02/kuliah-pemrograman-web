@extends('layouts.app')

@section('title', 'Kontak - Toko Sembako Anti')

@section('content')
    <section class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Hubungi Kami</h1>
                <p class="text-xl mb-8">Ada pertanyaan atau ingin memesan? Silakan hubungi kami melalui berbagai cara yang tersedia</p>
            </div>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    
                    <div>
                        <h2 class="text-3xl font-bold text-slate-800 mb-6">Informasi Kontak</h2>
                        <p class="text-slate-600 mb-8">Kami siap melayani Anda dengan sepenuh hati. Jangan ragu untuk menghubungi kami melalui berbagai saluran yang tersedia.</p>
                        
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4 p-6 bg-blue-50 rounded-xl border border-blue-100">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-phone text-white text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-slate-800 mb-2">Telepon/WhatsApp</h3>
                                    <p class="text-slate-600 mb-2">+62 822-1325-3954</p>
                                    <a href="https://wa.me/6282213253954" target="_blank" class="inline-flex items-center text-green-600 font-medium hover:text-green-700 transition">
                                        <i class="fab fa-whatsapp mr-2"></i>
                                        Chat via WhatsApp
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 p-6 bg-cyan-50 rounded-xl border border-cyan-100">
                                <div class="w-12 h-12 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope text-white text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-slate-800 mb-2">Email</h3>
                                    <p class="text-slate-600 mb-2">antisunarti34@gmail.com</p>
                                    <a href="mailto:antisunarti34@gmail.com" class="inline-flex items-center text-blue-600 font-medium hover:text-blue-700 transition">
                                        <i class="fas fa-envelope mr-2"></i>
                                        Kirim Email
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 p-6 bg-indigo-50 rounded-xl border border-indigo-100">
                                <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-white text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-slate-800 mb-2">Alamat</h3>
                                    <p class="text-slate-600 mb-4">Jl. Teppo Batu, Kec. Pammana, Kab. Wajo, Sulawesi Selatan</p>
                                    <a href="https://maps.app.goo.gl/4XAzZ4MHy2bV8Lhn6?g_st=iw" target="_blank" class="inline-flex items-center text-indigo-600 font-medium hover:text-indigo-700 transition">
                                        <i class="fas fa-map-marked-alt mr-2"></i>
                                        Lihat di Google Maps
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h3 class="text-xl font-semibold text-slate-800 mb-4">Ikuti Kami</h3>
                            <div class="flex space-x-4">
                                <a href="https://www.facebook.com/share/1EESgR7NF4/" class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition transform hover:-translate-y-1">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://www.instagram.com/sunarti6920?igsh=OTlxZnM2eXVpM2tt" class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white hover:from-purple-600 hover:to-pink-600 transition transform hover:-translate-y-1">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://wa.me/6282213253954" target="_blank" class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white hover:bg-green-600 transition transform hover:-translate-y-1">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-3xl font-bold text-slate-800 mb-6">Kirim Pesan</h2>
                        <p class="text-slate-600 mb-8">Isi form di bawah ini dan pesan Anda akan langsung terkirim ke email kami.</p>
                        
                        <form 
                            action="https://formsubmit.co/antisunarti34@gmail.com" 
                            method="POST"
                            class="space-y-6"
                            id="contact-form">
    
                            <input type="hidden" name="_captcha" value="false">
                            <input type="hidden" name="_subject" value="Pesan Baru dari Website Toko Sembako Anti">
                            <input type="hidden" name="_template" value="table">
                            <input type="hidden" name="_next" value="{{ url('/thank-you') }}">
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="form-group">
                                    <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap *</label>
                                    <input 
                                        type="text" 
                                        id="name" 
                                        name="name"
                                        required
                                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                                        placeholder="Masukkan nama lengkap"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email *</label>
                                    <input 
                                        type="email" 
                                        id="email" 
                                        name="email"
                                        required
                                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                                        placeholder="nama@email.com"
                                    >
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Nomor Telepon/WhatsApp</label>
                                <input 
                                    type="tel" 
                                    id="phone" 
                                    name="phone"
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                                    placeholder="+62 xxx-xxxx-xxxx"
                                >
                            </div>
                            
                            <div class="form-group">
                                <label for="subject" class="block text-sm font-medium text-slate-700 mb-2">Subjek *</label>
                                <select 
                                    id="subject" 
                                    name="subject"
                                    required
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                >
                                    <option value="">Pilih subjek pesan</option>
                                    <option value="Pertanyaan tentang produk">Pertanyaan tentang produk</option>
                                    <option value="Pemesanan produk">Pemesanan produk</option>
                                    <option value="Keluhan dan saran">Keluhan dan saran</option>
                                    <option value="Kerjasama bisnis">Kerjasama bisnis</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="message" class="block text-sm font-medium text-slate-700 mb-2">Pesan *</label>
                                <textarea 
                                    id="message" 
                                    name="message"
                                    rows="5" 
                                    required
                                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" 
                                    placeholder="Tulis pesan Anda di sini..."
                                ></textarea>
                            </div>
                            
                            <button 
                                type="submit" 
                                class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-4 px-6 rounded-lg font-semibold hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg flex items-center justify-center"
                                id="submit-btn"
                            >
                                <i class="fas fa-paper-plane mr-2"></i>
                                Kirim Pesan
                            </button>

                            <p class="text-sm text-slate-500 text-center mt-4">
                                * Pesan Anda akan langsung dikirim ke email kami dan akan dibalas secepatnya.
                            </p>
                        </form>

                        <div class="mt-6 p-4 bg-yellow-50 rounded-lg border border-yellow-200">
                            <p class="text-sm text-yellow-800 text-center">
                                <i class="fas fa-info-circle mr-1"></i>
                                Jika form di atas tidak berfungsi, silakan kirim email langsung ke: 
                                <a href="mailto:antisunarti34@gmail.com" class="font-semibold underline">antisunarti34@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-slate-800 mb-4">Lokasi Toko Kami</h2>
                    <p class="text-slate-600 max-w-2xl mx-auto">Kunjungi toko kami di lokasi strategis untuk pengalaman belanja yang lebih personal</p>
                </div>
                
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-200">
                    <div class="h-96 bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center relative">
                        <div class="text-center p-8 max-w-md">
                            <i class="fas fa-map-marked-alt text-blue-500 text-6xl mb-4"></i>
                            <h3 class="text-2xl font-bold text-slate-800 mb-2">Toko Sembako Anti</h3>
                            <p class="text-slate-600 mb-6">Jl. Teppo Batu, Kec. Pammana, Kab. Wajo, Sulawesi Selatan</p>
                            <a href="https://maps.app.goo.gl/4XAzZ4MHy2bV8Lhn6?g_st=iw" target="_blank" class="inline-flex items-center bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition">
                                <i class="fas fa-external-link-alt mr-2"></i>
                                Buka di Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-slate-800 mb-4">Pertanyaan Umum</h2>
                    <p class="text-slate-600">Beberapa pertanyaan yang sering diajukan oleh pelanggan kami</p>
                </div>
                
                <div class="space-y-4">
                    <div class="bg-white rounded-xl p-6 border border-slate-200">
                        <h3 class="text-lg font-semibold text-slate-800 mb-2">Bagaimana cara memesan produk?</h3>
                        <p class="text-slate-600">Anda bisa memesan melalui WhatsApp, telepon langsung, datang ke toko kami, atau melalui form kontak di website ini.</p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 border border-slate-200">
                        <h3 class="text-lg font-semibold text-slate-800 mb-2">Apakah tersedia layanan pengiriman?</h3>
                        <p class="text-slate-600">Ya, kami menyediakan layanan pengiriman untuk wilayah sekitar toko. Biaya pengiriman menyesuaikan jarak dan jumlah pesanan.</p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 border border-slate-200">
                        <h3 class="text-lg font-semibold text-slate-800 mb-2">Bagaimana metode pembayaran yang diterima?</h3>
                        <p class="text-slate-600">Kami menerima pembayaran tunai, transfer bank, dan beberapa metode pembayaran digital seperti QRIS dan e-wallet.</p>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 border border-slate-200">
                        <h3 class="text-lg font-semibold text-slate-800 mb-2">Berapa lama pesanan diproses?</h3>
                        <p class="text-slate-600">Pesanan akan diproses dalam 1-2 jam setelah konfirmasi pembayaran. Untuk pengiriman, tergantung jarak lokasi Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    const contactForm = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');

    if (contactForm && submitBtn) {
        contactForm.addEventListener('submit', function(e) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;
            
            if (!name || !email || !subject || !message) {
                e.preventDefault();
                showNotification('Harap isi semua field yang wajib diisi', 'error');
                return;
            }

        
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Mengirim...';
            submitBtn.disabled = true;
            
            
            const originalText = submitBtn.innerHTML;
            
            setTimeout(() => {
                showNotification('Pesan Anda telah terkirim! Kami akan membalas secepatnya.', 'success');
                contactForm.reset();
                submitBtn.innerHTML = '<i class="fas fa-paper-plane mr-2"></i> Kirim Pesan';
                submitBtn.disabled = false;
            }, 2000);
        });
    }

    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.startsWith('0')) {
                value = '62' + value.substring(1);
            }
            if (value.length > 2) {
                value = value.substring(0, 2) + '-' + value.substring(2);
            }
            if (value.length > 6) {
                value = value.substring(0, 6) + '-' + value.substring(6);
            }
            if (value.length > 11) {
                value = value.substring(0, 11) + '-' + value.substring(11);
            }
            e.target.value = value;
        });
    }
</script>
@endpush
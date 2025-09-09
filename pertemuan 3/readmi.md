# Analisis portofolio
# 1. Bagian Awal HTML
```html
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CV Sulfiana</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
```
Bagian ini adalah struktur dasar HTML.
•	<!DOCTYPE html> menandakan dokumen menggunakan HTML5.
•	<html lang="id"> menunjukkan bahasa utama adalah Bahasa Indonesia.
•	<meta charset="UTF-8"> supaya teks mendukung karakter internasional.
•	<meta name="viewport"...> membuat halaman responsif di berbagai perangkat.
•	<title> memberi judul tab browser: CV Sulfiana.
•	<link> menghubungkan ke Font Awesome untuk ikon media sosial & kontak.
________________________________________
# 2. Bagian CSS Dasar
```html
:root {
  --primary-color: #ff69b4;
  --secondary-color: #9370db;
  --accent-color: #ffb6c1;
  --dark-color: #333;
  --light-color: #fff;
  --shadow: 0 8px 25px rgba(0,0,0,0.1);
  --transition: all 0.3s ease;
}
```
Pada :root didefinisikan variabel warna untuk tema (pink, ungu, putih, hitam), bayangan (--shadow), serta transisi (--transition). Hal ini memudahkan pengaturan konsistensi desain.
```html
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: url('bg.jpg') no-repeat center/cover;
  color: var(--dark-color);
}
```
Bagian ini mengatur font, warna teks default, serta memberi latar belakang berupa gambar bg.jpg yang menutupi layar penuh.
________________________________________
# 3. Layout Utama
```html
.container {
  display: flex;
  max-width: 1200px;
  margin: 40px auto;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: var(--shadow);
}
```
Class .container membungkus seluruh isi CV. Dengan flex, halaman terbagi jadi dua kolom (kiri dan kanan). Lebarnya dibatasi 1200px agar tetap proporsional di layar besar.
________________________________________
# 4. Bagian Kiri (Profil Singkat)
```html
<div class="left">
  <div class="profile-pic">
    <img src="foto.jpg" alt="Foto Sulfiana">
  </div>
  <h2>Sulfiana</h2>
  <p class="status">Lulusan Baru</p>
  <ul class="personal-data">
    <li><span class="data-label">TTL:</span> Bone, 12 Mei 2003</li>
    <li><span class="data-label">Alamat:</span> Sulawesi Selatan</li>
    <li><span class="data-label">Jenis Kelamin:</span> Perempuan</li>
    <li><span class="data-label">Kewarganegaraan:</span> Indonesia</li>
    <li><span class="data-label">Status:</span> Belum Menikah</li>
  </ul>
</div>
```
Kolom kiri berisi:
•	Foto profil berbentuk lingkaran dengan border putih dan efek hover zoom.
•	Nama dan status singkat.
•	Data pribadi berupa TTL, alamat, gender, kewarganegaraan, status.
•	Sosial media (LinkedIn, Instagram, Twitter) dengan ikon Font Awesome.
________________________________________
# 5. Bagian Kanan (Isi CV)
```html
<div class="right">
  <section class="profile animate-item">
    <h1>Profil</h1>
    <p>Saya adalah seorang lulusan baru yang siap bekerja dengan dedikasi tinggi...</p>
  </section>
  ```
Isi kolom kanan ditata dalam beberapa <section>:
•	Profil → deskripsi singkat diri.
•	Pendidikan → daftar riwayat sekolah & universitas.
•	Keahlian → skill bar dengan presentase kemampuan.
•	Pengalaman/Prestasi → daftar kegiatan organisasi & pencapaian.
•	Kontak → nomor telepon, email, dan alamat.
________________________________________
# 6. Skill Bar (Keahlian)
```html
<div class="skill">
  <div class="skill-bar">
    <div class="skill-progress" style="width: 85%"></div>
  </div>
  <span class="skill-name">Microsoft Office (85%)</span>
</div>
```
Keahlian ditampilkan dengan progress bar.
•	.skill-bar adalah latar abu muda.
•	.skill-progress lebarnya ditentukan persen (width: 85%).
•	Nama skill + angka persen ditampilkan di bawah bar.
________________________________________
# 7. Responsif
```html
@media (max-width: 992px) {
  .container {
    flex-direction: column;
    margin: 20px;
  }
}
```
Jika layar lebih kecil dari 992px (HP/tablet), layout flex berubah menjadi kolom tunggal agar mudah dibaca.
________________________________________
# 8. Animasi & JavaScript
```html
@keyframes fadeIn {
  from {opacity:0; transform: translateY(20px);}
  to {opacity:1; transform: translateY(0);}
}
'''
Animasi fadeIn membuat elemen muncul halus dari bawah.
```html
document.addEventListener("scroll", function() {
  document.querySelectorAll(".animate-item").forEach(item => {
    if (item.getBoundingClientRect().top < window.innerHeight - 100) {
      item.style.opacity = "1";
    }
  });
});
```
JavaScript mendeteksi posisi elemen saat scroll. Jika masuk viewport, elemen akan tampil dengan animasi.


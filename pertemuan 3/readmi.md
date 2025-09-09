# Analisis Kode Sulfiana
# 1. Struktur Dasar HTML
```html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CV Sulfiana</title>
</head>
```

Mendefinisikan dokumen HTML5, bahasa Indonesia, encoding UTF-8, viewport responsif, dan judul halaman.

# 2. Variabel CSS & Reset
```html
:root {
  --primary-color: #d63384;
  --secondary-color: #ff85a2;
  --accent-color: #f8bbd0;
  --text-color: #333;
  --light-color: #fff;
}
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
```

Variabel warna agar desain konsisten. Reset CSS menghilangkan margin/padding default browser.

# 3. Background Halaman
```html
body {
  font-family: 'Arial', sans-serif;
  background: url('bg.jpg') no-repeat center center fixed;
  background-size: cover;
}
```

Latar belakang memakai gambar bg.jpg yang menutupi seluruh layar.

# 4. Header dengan Tombol Login
```html
<div class="header">
  <button class="logout-btn hidden" id="logoutButton">Logout</button>
  <button class="login-btn" id="loginButton">Login</button>
</div>
```

Bagian header tetap di atas (fixed). Ada tombol login & logout, ditampilkan bergantian lewat JavaScript.

# 5. Overlay Login
```html
<div class="overlay" id="loginOverlay">
  <h2>Selamat Datang di CV Sulfiana</h2>
  <button class="login-btn" id="overlayLoginButton">Login Sekarang</button>
</div>
```

Overlay yang menutupi layar saat pertama kali dibuka. User harus klik tombol login untuk masuk ke CV.

# 6. Modal Login
```html
<div class="modal" id="loginModal">
  <div class="modal-content">
    <h3>Login ke CV</h3>
    <input type="text" id="username" placeholder="Username">
    <input type="password" id="password" placeholder="Password">
    <button class="login-btn" id="submitLogin">Login</button>
  </div>
</div>
```

Kotak popup untuk login dengan input username & password.

# 7. Container CV
```html 
<div class="container" id="cvContainer">
  <div class="left"> ... </div>
  <div class="right"> ... </div>
</div> 
```
Container utama berisi dua kolom:

Kiri → data pribadi.

Kanan → konten CV utama.

# 8. Kolom Kiri (Profil)
```html 
<div class="left">
  <div class="profile">
    <img src="foto.jpg" alt="Foto Profil">
    <h2>Sulfiana</h2>
    <p>Lulusan Baru</p>
  </div>
  <div class="personal-data"> ... </div>
  <div class="social-icons"> ... </div>
</div> 
```


Berisi foto, nama, status, data pribadi, serta link media sosial.

# 9. Data Pribadi
```html
<ul class="personal-data">
  <li><strong>TTL:</strong> Wajo, 05 Juni 2002</li>
  <li><strong>Alamat:</strong> Pammana</li>
  <li><strong>Gender:</strong> Perempuan</li>
</ul>
```

Menampilkan biodata dasar seperti tempat tanggal lahir, alamat, dan jenis kelamin.

# 10. Media Sosial
```html
<div class="social-icons">
  <a href="#"><i class="fab fa-linkedin"></i></a>
  <a href="#"><i class="fab fa-instagram"></i></a>
  <a href="#"><i class="fab fa-twitter"></i></a>
</div>
```

Ikon sosial media (LinkedIn, Instagram, Twitter) memakai Font Awesome.

# 11. Kolom Kanan (Isi CV)
```html
<div class="right">
  <div class="section"> ... </div>
  <div class="section"> ... </div>
</div>
```


Menampilkan konten utama seperti profil, pendidikan, skill, pengalaman, dan kontak.

# 12. Profil Singkat
```html
<div class="section">
  <h3>Profil</h3>
  <p>Saya Sulfiana, lulusan baru yang bersemangat ...</p>
</div>
```


Ringkasan diri sebagai perkenalan singkat.

# 13. Pendidikan
```html
<div class="section">
  <h3>Pendidikan</h3>
  <ul>
    <li>SD Pammana (2008 - 2014)</li>
    <li>SMP Negeri 1 (2014 - 2017)</li>
    <li>Universitas Andi Djemma (2019 - 2023)</li>
  </ul>
</div>
```


Daftar riwayat pendidikan dari SD hingga Universitas.

# 14. Keahlian (Skill Bar)
```html
<div class="skill">
  <p>Microsoft Office</p>
  <div class="bar"><div class="fill" style="width:90%"></div></div>
</div>
```

Skill ditampilkan dengan progress bar visual, menunjukkan tingkat penguasaan.

# 15. Pengalaman / Prestasi
```html
<div class="section">
  <h3>Pengalaman & Prestasi</h3>
  <ul>
    <li>OSIS SMA (2017 - 2018)</li>
    <li>Juara 3 LKTI Nasional</li>
  </ul>
</div>
```

Menampilkan pengalaman organisasi & prestasi akademik.

# 16. Kontak
```html
<div class="section">
  <h3>Hubungi Saya</h3>
  <p><i class="fas fa-phone"></i> 0822-1234-5678</p>
  <p><i class="fas fa-envelope"></i> sulfiana@email.com</p>
</div>
```

Informasi kontak berupa telepon, email, dan alamat.

# 17. Script JavaScript
```html
document.getElementById('overlayLoginButton').onclick = function() {
  document.getElementById('loginOverlay').style.display = 'none';
  document.getElementById('loginModal').style.display = 'flex';
};
```

 Script mengatur login:

Overlay hilang saat klik “Login Sekarang”.

Modal muncul untuk input username & password.

Setelah login berhasil → tampil CV, sembunyikan tombol login, tampilkan logout.
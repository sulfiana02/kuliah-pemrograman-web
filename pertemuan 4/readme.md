1. Navbar utama 
```html
(.navbar)
```
Ditempatkan tetap di atas layar (position: fixed; top: 0;).

Lebarnya penuh (100%).

Warnanya transparan putih dengan efek blur kaca (frosted glass).

Ada bayangan (shadow) biar terlihat melayang.

Punya animasi halus kalau berubah, misalnya saat scroll.

2. Efek saat scroll 
```html 
(.navbar.scrolled)
```

Kalau halaman digulir, navbar akan berubah jadi:

Background lebih solid (putihnya lebih pekat).

Bayangannya makin tebal.

Efek ini bikin navbar terasa lebih jelas ketika user sudah scroll ke bawah.

3. Isi Navbar 
```html
(.nav-container)
```

Isinya ada 2 bagian:

Kiri: logo.

Kanan: menu navigasi.

Tinggi navbar = 70px.

Menggunakan flexbox supaya posisi logo dan menu rapi.

4. Logo 
```html
(.nav-logo)
```
Logo berupa teks (bisa ada ikon).

Warna pakai primary color.

Font lebih besar dan tebal.

5. Menu Navigasi 
```html
(.nav-menu & .nav-link)
```
Menu ditampilkan horizontal (sejajar).

Setiap link:

Ada padding (jarak dalam) dan bulat di pinggir (rounded pill).

Warnanya normal → berubah saat di-hover atau aktif.

Ada efek highlight animasi yang seperti cahaya bergerak saat mouse diarahkan.

6. Hamburger Menu (untuk HP)

Di layar besar, menu horizontal.

Di layar kecil, muncul ikon hamburger (3 garis).

Kalau ditekan:

Garis berubah jadi tanda X (animasi rotasi).

Menu navigasi bisa ditampilkan atau disembunyikan.

7. Dark Mode Navbar

Warna dasar berubah jadi gelap transparan.

Border bawah sedikit berwarna pink lembut.

Saat scroll, background makin pekat (supaya tetap terbaca di layar gelap).

#galery
Kode galeri terdiri dari tombol navigasi dan isi album foto. Tombol navigasi dibuat dengan <button> yang punya atribut data-album, misalnya data-album="organisasi". Atribut ini dipakai sebagai penghubung ke <div> album yang sesuai, karena setiap album punya id yang sama dengan nilai data-album. Album ditulis dalam <div class="album-content"> berisi judul dan beberapa gambar. Masing-masing gambar dibungkus dalam album-item yang di dalamnya ada <img> dan overlay teks yang muncul saat kursor diarahkan.

Secara default hanya satu album yang aktif, ditandai dengan kelas active, sedangkan album lain disembunyikan dengan CSS. Lalu JavaScript mengatur perpindahan antar album. Saat sebuah tombol ditekan, script mengambil nilai data-album, kemudian menghapus kelas active dari semua album dan menambahkan active pada album yang sesuai id-nya. Hal yang sama juga dilakukan pada tombol, supaya tombol yang sedang dipilih terlihat berbeda.

Dengan cara ini galeri bekerja seperti tab interaktif: pengguna bisa menekan tombol kategori dan hanya foto kategori itu yang muncul. Jadi inti dari kode ini adalah: tombol navigasi sebagai pemilih album, album-album sebagai konten yang berganti, overlay sebagai efek hover gambar, dan JavaScript yang mengatur logika pergantiannya.
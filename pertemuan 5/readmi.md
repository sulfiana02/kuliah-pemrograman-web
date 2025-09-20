# Percobaan 1

<img src = "image\percobaan1.jpg">
Kode HTML tersebut membuat halaman dengan judul “contoh JavaScript”. Di bagian <head> ada script yang menuliskan teks “Program JavaSript Aku di kepala”, lalu di bagian <body> ada script kedua yang menuliskan “Program JavaSript Aku di body”. Karena tidak ada pemisah baris, keduanya ditampilkan berdempetan di layar menjadi:

Program JavaSript Aku di kepalaProgram JavaSript Aku di body

Artinya, kode ini hanya menunjukkan bahwa JavaScript bisa dijalankan baik di <head> maupun di <body> menggunakan document.write(), meski cara ini sudah jarang dipakai dalam praktik modern.

# percobaan 2

<img src = "image\percobaan2.jpg">

Kode HTML ini membuat halaman sederhana untuk memperlihatkan event onclick pada JavaScript. Saat dibuka, halaman menampilkan judul dan sebuah tombol bertuliskan “klik disini”. Tombol tersebut punya atribut onclick yang memanggil fungsi tampilkan_nama(). Fungsi itu ditulis di dalam tag <script> dan isinya adalah mengganti isi elemen <div id="hasil"> menjadi teks: 

Nama Saya Adalah Sulfiana

dalam format <h3>. Jadi secara keseluruhan, kode ini mendemonstrasikan bagaimana event klik pada tombol bisa menjalankan fungsi JavaScript untuk menampilkan hasil ke halaman.

# percobaan 3

<img src = "image\percobaan3.jpg">

Kode HTML itu menampilkan teks dengan bantuan document.write(). Judul tab browser akan terlihat sebagai “contoh sederhana JavaScript”. Di dalam tag <script>, ada dua perintah:

1. document.write("Selamat Belajar Angkatan 2019","<br>"); → menuliskan teks Selamat Belajar Angkatan 2019 lalu memberi pindah baris.

2. document.write("JavaScript Pemrograman WEB Teknik Komputer"); → menuliskan teks JavaScript Pemrograman WEB Teknik Komputer di baris berikutnya.

# percobaan 4

<img src = "image\percobaan4a.jpg">
<img src = "image\percobaan4b.jpg">

Kode HTML ini digunakan untuk meminta input dari pengguna lewat prompt(). Saat halaman dibuka di browser, akan muncul kotak dialog dengan pesan “Siapa nama Anda?”. Pengguna bisa mengetikkan namanya, misalnya Sulfiana. Nilai yang diketik akan disimpan ke dalam variabel nama.

Setelah itu, perintah 
```html
document.write("Hai, " + nama);
```
menampilkan hasil di halaman.Jadi keseluruhan kode ini adalah contoh sederhana interaksi JavaScript dengan pengguna: menerima input teks melalui prompt lalu menampilkannya ke layar.

# Percobaan 5

<img src = "image\percobaan5.jpg">
Kode HTML ini membuat halaman yang langsung memunculkan alert box ketika dibuka.

Di dalam tag <script>, ada perintah 
```html
window.alert("Apakah anda akan meninggalkan laman ini?");
```

Saat halaman dijalankan, browser menampilkan kotak dialog peringatan (alert) dengan pesan:

Apakah anda akan meninggalkan laman ini?

Pengguna harus menekan tombol OK pada alert untuk bisa melanjutkan melihat halaman.

# Percobaan 6
<img src = "image\percobaan6a.jpg">
<img src = "image\percobaan6b.jpg">
Kode HTML ini menampilkan kotak konfirmasi (confirm box) saat halaman dibuka.

Script di dalam <body> menjalankan 
```html 
window.confirm("Apakah anda sudah yakin ?");
```
Browser akan menampilkan dialog dengan pesan “Apakah anda sudah yakin ?” dan dua tombol: OK dan Cancel.

Jika pengguna menekan OK, variabel jawaban akan bernilai true. Jika menekan Cancel, nilainya false.

Perintah 
```html
document.write("Jawaban Anda: " + jawaban); 
```
menampilkan hasil ke halaman
# Percobaan 7
<img src = "image\percobaan7.jpg">
Kode JavaScript ini sangat sederhana, fungsinya untuk mendemonstrasikan deklarasi variabel dan operasi aritmatika.

var VariabelKu; → mendeklarasikan variabel kosong.

var VariabelKu2 = 3; → mendeklarasikan variabel dengan nilai awal 3.

VariabelKu = 1234; → memberi nilai 1234 ke variabel pertama.

document.write(VariabelKu * VariabelKu2); → menghitung perkalian 1234 * 3 dan menuliskan hasilnya ke halaman.

# Percobaan 8
<img src = "image\percobaan8.jpg">
Kode JavaScript ini mendemonstrasikan penggunaan fungsi dengan parameter, operasi aritmatika, dan output ke halaman.

var a = 12; var b = 4; → mendefinisikan dua variabel awal.

function Perkalian_Dengan2(b) → membuat fungsi yang menerima sebuah angka (b) lalu mengalikannya dengan 2. Nilai hasil perkalian disimpan ke variabel a dan dikembalikan dengan return.

```html
document.write("Dua kali dari", b ,"adalah", Perkalian_Dengan2(b));
```
→ memanggil fungsi dengan b = 4, hasilnya 8, lalu ditulis ke halaman.
```html
document.write("Nilai dari a adalah ", a);
```
→ menampilkan nilai variabel a, yang sudah berubah menjadi 8.
(Teks menempel karena tidak ada <br> atau spasi tambahan.)

# Percobaan 9
<img src = "image\percobaan9.jpg">
Kode ini menunjukkan fungsi dengan parameter dan perbedaan penggunaan variabel lokal serta global di JavaScript.

var a = 12; var b = 4; → mendefinisikan variabel global a bernilai 12 dan b bernilai 4.

Fungsi PerkalianDengan2(b) membuat variabel lokal a yang nilainya b * 2. Karena var digunakan, variabel ini hanya berlaku di dalam fungsi dan tidak mengubah a global. Fungsi kemudian mengembalikan nilai lokal a.
```html
document.write("Dua kali dari ", b, " adalah ", PerkalianDengan2(b));
```
→ memanggil fungsi dengan b = 4, hasilnya 8, lalu menulis ke halaman.
```html
document.write("Nilai dari a adalah", a); 
```
→ menampilkan nilai variabel a global, yaitu tetap 12 karena tidak terpengaruh oleh a lokal di dalam fungsi.

# Percobaan 10
<img src = "image\percobaan10.jpg">
Kode HTML + JavaScript ini berfungsi untuk mendemonstrasikan konversi string menjadi angka dengan fungsi parseInt() dan parseFloat().

Script di dalam <body> berisi percobaan parsing string:

parseInt("27") → menghasilkan 27.

parseInt("27.5") → menghasilkan 27 (bilangan bulat, bagian desimal dibuang).

parseInt("27A") → menghasilkan 27 (angka dibaca sampai huruf).

parseInt("A27.5") → menghasilkan NaN (Not a Number, karena string tidak diawali angka).

parseFloat("27") → menghasilkan 27.

parseFloat("27.5") → menghasilkan 27.5 (desimal dipertahankan).

parseFloat("27A") → menghasilkan 27 (angka terbaca sampai huruf).

parseFloat("A27.5") → menghasilkan NaN (karena diawali huruf).

# Percobaan 11
<img src = "image\percobaan11.jpg">
Kode HTML + JavaScript ini digunakan untuk menampilkan hasil operasi matematika sederhana langsung di halaman web.

Script berisi beberapa perintah document.write() yang menuliskan hasil perhitungan.

Tapi ada sedikit kesalahan pada teks keterangan dan ekspresi hitungan:

Baris pertama benar: "2 + 3 = " + (2 + 3) → tampil 2 + 3 = 5.

Baris kedua teksnya tertulis 20 + 3, tapi operatornya minus (20 - 3). Hasilnya 17, jadi tidak sesuai teks.

Baris ketiga teksnya tertulis 203*, tapi ekspresinya (2 * 3). Hasilnya 6, tidak sesuai dengan teks.

Baris keempat benar: "40 / 3 = " + (40 / 3) → tampil 40 / 3 = 13.3333....
adi intinya, kode ini mendemonstrasikan operasi aritmatika (+, -, *, /), tetapi ada ketidaksesuaian antara teks soal dan ekspresi hitungan.

# Percobaan 12
<img src = "image\percobaan12a.jpg">
<img src = "image\percobaan12b.jpg">
Kode HTML + JavaScript ini adalah contoh penggunaan operator ternary (? :) untuk menentukan kondisi lulus atau tidak lulus.

prompt("Nilai (0-100): ", 0); → saat halaman dibuka, muncul kotak input meminta pengguna memasukkan nilai (default = 0).

var hasil = (nilai >= 60) ? "Lulus" : "Tidak Lulus"; → jika nilai yang dimasukkan lebih besar atau sama dengan 60, maka variabel hasil akan berisi "Lulus". Kalau kurang dari 60, berisi "Tidak Lulus".

document.write("Hasil: " + hasil); → menampilkan hasil ke halaman.

Contoh hasil saat dijalankan:

Jika input = 75, maka tampil:

Hasil: Lulus


Jika input = 45, maka tampil:

Hasil: Tidak Lulus

kode ini memperlihatkan bagaimana operator ternary digunakan sebagai bentuk singkat dari if...else.

# Tugas 1
<img src = "image\tugas1.jpg">

# Tugas 2
<img src = "image\tugas2.jpg">

# Tugas 3
<img src = "image\tugas3.jpg">

# Tugas 4
<img src = "image\tugas4.jpg">


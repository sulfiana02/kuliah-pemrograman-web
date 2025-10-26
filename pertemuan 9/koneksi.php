<?php
// Konfigurasi Database
$db_host = "localhost";      
$db_user = "root";           
$db_pass = "12345678";               
$db_name = "diary_app";

// Koneksi ke Database
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Set charset ke UTF-8
mysqli_set_charset($koneksi, "utf8");

// Fungsi untuk cek login - PERBAIKI INI
function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
    
    // Validasi user_id exists in database
    $user_id = $_SESSION['user_id'];
    global $koneksi;
    $check_user = "SELECT id FROM users WHERE id = $user_id";
    $result = mysqli_query($koneksi, $check_user);
    
    if (mysqli_num_rows($result) == 0) {
        // User tidak ada di database, logout paksa
        session_destroy();
        header("Location: login.php");
        exit();
    }
}

// Start session jika belum
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
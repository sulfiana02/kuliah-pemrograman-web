<?php
include 'koneksi.php';
requireLogin();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$user_id = $_SESSION['user_id'];

$query = "DELETE FROM diary WHERE id = $id AND user_id = $user_id";

if (mysqli_query($koneksi, $query)) {
    header("Location: index.php?pesan=hapus");
} else {
    echo "Error: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
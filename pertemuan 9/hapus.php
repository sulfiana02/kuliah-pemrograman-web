<?php
session_start();
include 'koneksi.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$user_id = $_SESSION['user_id'];

// Debug: Cek nilai ID dan user_id
error_log("ID: $id, User ID: $user_id");

// Ambil data diary untuk ditampilkan sebelum dihapus
$query = "SELECT * FROM diary WHERE id = '$id' AND user_id = '$user_id'";
$result = mysqli_query($koneksi, $query);

// Debug: Cek query dan hasil
error_log("Query: $query");
error_log("Rows: " . mysqli_num_rows($result));

if (!$result || mysqli_num_rows($result) == 0) {
    error_log("Diary tidak ditemukan atau akses ditolak");
    header("Location: index.php");
    exit();
}

$diary = mysqli_fetch_assoc($result);

// Jika sudah konfirmasi hapus
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    error_log("Memproses penghapusan diary ID: $id");
    
    // Gunakan prepared statement untuk keamanan
    $query_delete = "DELETE FROM diary WHERE id = ? AND user_id = ?";
    $stmt = mysqli_prepare($koneksi, $query_delete);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ii", $id, $user_id);
        
        if (mysqli_stmt_execute($stmt)) {
            $affected_rows = mysqli_stmt_affected_rows($stmt);
            error_log("Rows affected: $affected_rows");
            
            if ($affected_rows > 0) {
                $_SESSION['success_message'] = "Diary berhasil dihapus!";
                header("Location: index.php?pesan=hapus");
                exit();
            } else {
                $error = "Tidak ada data yang dihapus. Diary mungkin sudah dihapus sebelumnya.";
            }
        } else {
            $error = "Error executing query: " . mysqli_error($koneksi);
        }
        mysqli_stmt_close($stmt);
    } else {
        $error = "Error preparing statement: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Diary - Diary Harianku</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .delete-dialog-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            padding: 20px;
        }
        .delete-dialog {
            background: white;
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.3s ease-out;
            position: relative;
        }
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        .dialog-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f0;
        }
        .warning-icon {
            font-size: 64px;
            margin-bottom: 20px;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        .dialog-header h1 {
            color: #e74c3c;
            margin: 0 0 10px 0;
            font-size: 32px;
            font-weight: 700;
        }
        .irreversible-warning {
            color: #e74c3c;
            font-weight: 600;
            margin: 0;
            font-size: 16px;
        }
        .warning-section {
            background: linear-gradient(135deg, #ffeaa7, #fab1a0);
            border-left: 5px solid #e74c3c;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 12px;
        }
        .warning-section h2 {
            color: #c0392b;
            margin: 0 0 12px 0;
            font-size: 20px;
            font-weight: 700;
        }
        .warning-section p {
            margin: 0;
            color: #2d3436;
            font-size: 14px;
            line-height: 1.6;
        }
        .diary-details {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            border: 2px solid #e9ecef;
        }
        .diary-details h3 {
            margin: 0 0 20px 0;
            font-size: 18px;
            color: #495057;
            font-weight: 700;
        }
        .detail-item {
            display: flex;
            margin-bottom: 15px;
            align-items: flex-start;
        }
        .detail-label {
            font-weight: 700;
            color: #2d3436;
            min-width: 100px;
            font-size: 14px;
            background: #e9ecef;
            padding: 6px 12px;
            border-radius: 6px;
            margin-right: 15px;
        }
        .detail-value {
            color: #6c757d;
            font-size: 14px;
            flex: 1;
            padding: 6px 0;
        }
        .content-preview {
            background: white;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #dee2e6;
            font-size: 14px;
            line-height: 1.6;
            color: #495057;
            flex: 1;
            min-height: 80px;
            max-height: 120px;
            overflow-y: auto;
        }
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
        }
        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 150px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        .btn-cancel {
            background: #6c757d;
            color: white;
        }
        .btn-cancel:hover {
            background: #495057;
            transform: translateY(-2px);
        }
        .btn-delete {
            background: #e74c3c;
            color: white;
        }
        .btn-delete:hover {
            background: #c0392b;
            transform: translateY(-2px);
        }
        .error-message {
            background: #ffe6e6;
            color: #d63031;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 5px solid #d63031;
            font-weight: 600;
        }
        .loading-overlay {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            justify-content: center;
            align-items: center;
            z-index: 10;
        }
        .loading-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #e74c3c;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @media (max-width: 768px) {
            .delete-dialog {
                padding: 30px;
            }
            .action-buttons {
                flex-direction: column;
            }
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="delete-dialog-overlay">
        <div class="delete-dialog">
            <?php if (isset($error)): ?>
                <div class="error-message">
                    ❌ <?php echo $error; ?>
                    <br><small>ID: <?php echo $id; ?>, User ID: <?php echo $user_id; ?></small>
                </div>
            <?php endif; ?>

            <div class="loading-overlay" id="loadingOverlay">
                <div class="loading-spinner"></div>
            </div>

            <form method="POST" action="" id="deleteForm">
                <div class="dialog-header">
                    <div class="warning-icon">⚠️</div>
                    <h1>Hapus Diary</h1>
                    <p class="irreversible-warning">Tindakan ini tidak dapat dibatalkan!</p>
                </div>

                <div class="warning-section">
                    <h2>Peringatan!</h2>
                    <p>Anda akan menghapus diary ini secara permanen. Data yang sudah dihapus tidak dapat dikembalikan lagi. Pastikan Anda benar-benar yakin sebelum melanjutkan.</p>
                </div>

                <div class="diary-details">
                    <h3>Detail Diary yang Akan Dihapus:</h3>
                    <div class="detail-item">
                        <span class="detail-label">Judul:</span>
                        <span class="detail-value"><?php echo htmlspecialchars($diary['judul']); ?></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Tanggal:</span>
                        <span class="detail-value"><?php echo date('d M Y', strtotime($diary['tanggal'])); ?></span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Dibuat:</span>
                        <span class="detail-value"><?php echo date('d M Y H:i', strtotime($diary['created_at'])); ?></span>
                    </div>
                    <?php if (!empty($diary['isi_diary'])): ?>
                    <div class="detail-item">
                        <span class="detail-label">Isi:</span>
                        <div class="content-preview">
                            <?php 
                            echo nl2br(htmlspecialchars($diary['isi_diary']));
                            ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="action-buttons">
                    <a href="index.php" class="btn btn-cancel">Batal</a>
                    <button type="submit" name="confirm_delete" value="1" class="btn btn-delete" id="deleteButton">
                        Ya, Hapus Diary
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForm = document.getElementById('deleteForm');
            const deleteButton = document.getElementById('deleteButton');
            const loadingOverlay = document.getElementById('loadingOverlay');
            
            if (deleteForm) {
                deleteForm.addEventListener('submit', function(e) {
                    if (!confirm('⚠️ Apakah Anda yakin ingin menghapus diary ini?\nTindakan ini TIDAK DAPAT dibatalkan!')) {
                        e.preventDefault();
                        return false;
                    }
                    
                    // Tampilkan loading
                    loadingOverlay.style.display = 'flex';
                    return true;
                });
            }
        });
    </script>
</body>
</html>
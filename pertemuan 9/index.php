<?php
include 'koneksi.php';
requireLogin();

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM diary WHERE user_id = $user_id ORDER BY tanggal DESC, created_at DESC";
$result = mysqli_query($koneksi, $query);

// Hitung total diary
$total_diary = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary Harianku</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 50%, #2c3e50 100%);
            min-height: 100vh;
            padding: 20px;
            color: #ecf0f1;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding: 30px 0;
        }
        .header h1 {
            font-size: 2.8em;
            margin-bottom: 10px;
            color: #ecf0f1;
            font-weight: 300;
            letter-spacing: 2px;
        }
        .header p {
            font-size: 1.2em;
            color: #bdc3c7;
            font-style: italic;
        }
        .user-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding: 25px;
            background: rgba(52, 73, 94, 0.8);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        .user-welcome {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .user-avatar {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5em;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
        }
        .user-details span {
            display: block;
            color: #ecf0f1;
            font-weight: 500;
            font-size: 1.3em;
            margin-bottom: 5px;
        }
        .user-details small {
            color: #bdc3c7;
            font-size: 0.9em;
        }
        .user-actions {
            display: flex;
            gap: 15px;
        }
        .btn-profile, .btn-logout {
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .btn-profile {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
        }
        .btn-profile:hover {
            background: linear-gradient(45deg, #2980b9, #3498db);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }
        .btn-logout {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
        }
        .btn-logout:hover {
            background: linear-gradient(45deg, #c0392b, #e74c3c);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }
        .action-bar {
            text-align: center;
            margin-bottom: 40px;
        }
        .btn {
            display: inline-block;
            padding: 15px 35px;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-tambah {
            background: linear-gradient(45deg, #27ae60, #229954);
            border: 1px solid #27ae60;
        }
        .btn-tambah:hover {
            background: linear-gradient(45deg, #229954, #27ae60);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(39, 174, 96, 0.4);
        }
        .btn-edit {
            background: linear-gradient(45deg, #3498db, #2980b9);
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 6px;
            margin-right: 10px;
        }
        .btn-edit:hover {
            background: linear-gradient(45deg, #2980b9, #3498db);
        }
        .btn-hapus {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 6px;
        }
        .btn-hapus:hover {
            background: linear-gradient(45deg, #c0392b, #e74c3c);
        }
        .diary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 20px;
        }
        .diary-card {
            background: linear-gradient(135deg, rgba(52, 73, 94, 0.9), rgba(44, 62, 80, 0.9));
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        .diary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            border-color: rgba(52, 152, 219, 0.3);
        }
        .diary-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #27ae60, #e74c3c);
        }
        .diary-title {
            color: #ecf0f1;
            font-size: 1.4em;
            margin-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 15px;
            font-weight: 500;
        }
        .diary-content {
            color: #bdc3c7;
            line-height: 1.7;
            margin-bottom: 20px;
            font-size: 0.95em;
            min-height: 80px;
        }
        .diary-date {
            color: #95a5a6;
            font-size: 0.9em;
            margin-bottom: 20px;
            font-weight: 500;
        }
        .diary-actions {
            display: flex;
            justify-content: flex-end;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
        }
        .empty-state {
            text-align: center;
            color: #bdc3c7;
            padding: 80px 20px;
            background: rgba(52, 73, 94, 0.6);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            grid-column: 1 / -1;
            border: 2px dashed rgba(255, 255, 255, 0.1);
        }
        .empty-state h3 {
            font-size: 1.8em;
            margin-bottom: 15px;
            color: #ecf0f1;
            font-weight: 300;
        }
        .empty-state p {
            font-size: 1.1em;
            color: #bdc3c7;
        }
        .alert {
            padding: 20px;
            background: linear-gradient(135deg, rgba(39, 174, 96, 0.2), rgba(46, 204, 113, 0.1));
            color: #27ae60;
            border-radius: 8px;
            margin-bottom: 30px;
            border: 1px solid rgba(39, 174, 96, 0.3);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-weight: 500;
            backdrop-filter: blur(10px);
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .diary-card {
            animation: slideIn 0.6s ease-out forwards;
            opacity: 0;
        }
        .diary-card:nth-child(1) { animation-delay: 0.1s; }
        .diary-card:nth-child(2) { animation-delay: 0.2s; }
        .diary-card:nth-child(3) { animation-delay: 0.3s; }
        .diary-card:nth-child(4) { animation-delay: 0.4s; }
        .diary-card:nth-child(5) { animation-delay: 0.5s; }
        .diary-card:nth-child(6) { animation-delay: 0.6s; }

        @media (max-width: 768px) {
            .user-info {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
            .user-welcome {
                flex-direction: column;
            }
            .diary-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Personal Diary</h1>
            <p>Catat setiap momen berharga dalam hidupmu</p>
        </div>

        <div class="user-info">
            <div class="user-welcome">
                <div class="user-avatar">
                    <?php echo strtoupper(substr($_SESSION['nama_lengkap'], 0, 1)); ?>
                </div>
                <div class="user-details">
                    <span>Halo, <?php echo htmlspecialchars($_SESSION['nama_lengkap']); ?>!</span>
                    <small>@<?php echo htmlspecialchars($_SESSION['username']); ?> • <?php echo $total_diary; ?> Diary</small>
                </div>
            </div>
            <div class="user-actions">
                <a href="profil.php" class="btn-profile">Profil</a>
                <a href="logout.php" class="btn-logout">Logout</a>
            </div>
        </div>

        <div class="action-bar">
            <a href="tambah.php" class="btn btn-tambah">+ Tambah Diary Baru</a>
        </div>

        <?php if (isset($_GET['pesan'])): ?>
            <div class="alert">
                <?php
                if ($_GET['pesan'] == 'tambah') echo "✓ Diary berhasil ditambahkan";
                elseif ($_GET['pesan'] == 'edit') echo "✓ Diary berhasil diperbarui";
                elseif ($_GET['pesan'] == 'hapus') echo "✓ Diary berhasil dihapus";
                ?>
            </div>
        <?php endif; ?>

        <div class="diary-grid">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($diary = mysqli_fetch_assoc($result)): ?>
                    <div class="diary-card">
                        <h3 class="diary-title"><?php echo htmlspecialchars($diary['judul']); ?></h3>
                        <div class="diary-date">
                            <?php echo date('d M Y', strtotime($diary['tanggal'])); ?>
                        </div>
                        <div class="diary-content">
                            <?php 
                            if (!empty($diary['isi_diary'])) {
                                echo nl2br(htmlspecialchars(substr($diary['isi_diary'], 0, 200)));
                                if (strlen($diary['isi_diary']) > 200) echo '...';
                            } else {
                                echo '<em style="color: #7f8c8d;">Tidak ada catatan tambahan...</em>';
                            }
                            ?>
                        </div>
                        <div class="diary-actions">
                            <a href="edit.php?id=<?php echo $diary['id']; ?>" class="btn btn-edit">Edit</a>
                            <a href="hapus.php?id=<?php echo $diary['id']; ?>" class="btn btn-hapus" 
                               onclick="return confirm('Yakin ingin menghapus diary ini?')">Hapus</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="empty-state">
                    <h3>Belum ada diary</h3>
                    <p>Mulai catat hari-harimu dengan menekan tombol "Tambah Diary Baru"</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Auto-hide alert
        setTimeout(function() {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);
    </script>
</body>
</html>
<?php mysqli_close($koneksi); ?>
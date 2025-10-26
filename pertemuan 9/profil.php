<?php
include 'koneksi.php';
requireLogin();

$user_id = $_SESSION['user_id'];

// Ambil data user
$query_user = "SELECT * FROM users WHERE id = $user_id";
$result_user = mysqli_query($koneksi, $query_user);
$user = mysqli_fetch_assoc($result_user);

// Hitung statistik
$query_stats = "SELECT 
    COUNT(*) as total_diary,
    MIN(tanggal) as first_diary,
    MAX(tanggal) as last_diary
    FROM diary WHERE user_id = $user_id";
$result_stats = mysqli_query($koneksi, $query_stats);
$stats = mysqli_fetch_assoc($result_stats);

// Update profil
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $bio = mysqli_real_escape_string($koneksi, $_POST['bio']);
    
    // Update password jika diisi
    if (!empty($_POST['new_password'])) {
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $query_update = "UPDATE users SET 
            nama_lengkap='$nama_lengkap', 
            email='$email', 
            bio='$bio',
            password='$new_password'
            WHERE id=$user_id";
    } else {
        $query_update = "UPDATE users SET 
            nama_lengkap='$nama_lengkap', 
            email='$email', 
            bio='$bio'
            WHERE id=$user_id";
    }
    
    if (mysqli_query($koneksi, $query_update)) {
        $_SESSION['nama_lengkap'] = $nama_lengkap;
        $success = "Profil berhasil diperbarui!";
        // Refresh data user
        $result_user = mysqli_query($koneksi, $query_user);
        $user = mysqli_fetch_assoc($result_user);
    } else {
        $error = "Gagal memperbarui profil: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Personal Diary</title>
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
            font-size: 2.5em;
            margin-bottom: 10px;
            color: #ecf0f1;
            font-weight: 300;
            letter-spacing: 1px;
        }
        .nav-bar {
            text-align: center;
            margin-bottom: 40px;
        }
        .btn-nav {
            display: inline-block;
            padding: 12px 30px;
            margin: 0 10px;
            background: rgba(255, 255, 255, 0.1);
            color: #ecf0f1;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .btn-nav:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        .profile-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 30px;
            margin-top: 20px;
        }
        .profile-card, .profile-form {
            background: rgba(52, 73, 94, 0.8);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            border-radius: 50%;
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3em;
            color: white;
            font-weight: 300;
            box-shadow: 0 8px 25px rgba(231, 76, 60, 0.3);
        }
        .profile-info {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-info h2 {
            color: #ecf0f1;
            margin-bottom: 15px;
            font-size: 1.8em;
            font-weight: 400;
        }
        .profile-info p {
            color: #bdc3c7;
            margin-bottom: 10px;
            font-size: 1em;
        }
        .profile-info .username {
            color: #95a5a6;
            font-size: 0.9em;
            margin-bottom: 15px;
        }
        .profile-bio {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            border-left: 3px solid #3498db;
        }
        .profile-bio p {
            color: #bdc3c7;
            font-style: italic;
            line-height: 1.6;
            margin: 0;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 25px;
        }
        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .stat-card:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateY(-3px);
        }
        .stat-number {
            font-size: 2em;
            font-weight: 300;
            color: #3498db;
            display: block;
            margin-bottom: 5px;
        }
        .stat-label {
            color: #bdc3c7;
            font-size: 0.85em;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .profile-form h2 {
            color: #ecf0f1;
            margin-bottom: 25px;
            font-size: 1.5em;
            font-weight: 400;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 15px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #ecf0f1;
            font-weight: 500;
            font-size: 1em;
        }
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.1);
            color: #ecf0f1;
        }
        .form-control:focus {
            outline: none;
            border-color: #3498db;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }
        .form-control::placeholder {
            color: #95a5a6;
        }
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
            line-height: 1.5;
        }
        .btn-update {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #27ae60, #229954);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
        }
        .btn-update:hover {
            background: linear-gradient(45deg, #229954, #27ae60);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
        }
        .alert {
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 500;
            backdrop-filter: blur(10px);
        }
        .alert-success {
            background: rgba(39, 174, 96, 0.2);
            color: #27ae60;
            border: 1px solid rgba(39, 174, 96, 0.3);
        }
        .alert-error {
            background: rgba(231, 76, 60, 0.2);
            color: #e74c3c;
            border: 1px solid rgba(231, 76, 60, 0.3);
        }
        .form-note {
            color: #95a5a6;
            font-size: 0.85em;
            margin-top: 5px;
            font-style: italic;
        }

        @media (max-width: 768px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .nav-bar {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
            .btn-nav {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Profil Saya</h1>
        </div>

        <div class="nav-bar">
            <a href="index.php" class="btn-nav">Beranda</a>
            <a href="logout.php" class="btn-nav">Logout</a>
        </div>

        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="profile-grid">
            <!-- Kartu Profil -->
            <div class="profile-card">
                <div class="profile-avatar">
                    <?php echo strtoupper(substr($user['nama_lengkap'], 0, 1)); ?>
                </div>
                <div class="profile-info">
                    <h2><?php echo htmlspecialchars($user['nama_lengkap']); ?></h2>
                    <p class="username">@<?php echo htmlspecialchars($user['username']); ?></p>
                    <?php if (!empty($user['email'])): ?>
                        <p><?php echo htmlspecialchars($user['email']); ?></p>
                    <?php endif; ?>
                </div>

                <?php if (!empty($user['bio'])): ?>
                    <div class="profile-bio">
                        <p><?php echo htmlspecialchars($user['bio']); ?></p>
                    </div>
                <?php endif; ?>

                <div class="stats-grid">
                    <div class="stat-card">
                        <span class="stat-number"><?php echo $stats['total_diary']; ?></span>
                        <span class="stat-label">Total Diary</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number">
                            <?php 
                            if ($stats['first_diary']) {
                                $start = new DateTime($stats['first_diary']);
                                $now = new DateTime();
                                $diff = $start->diff($now);
                                echo $diff->days;
                            } else {
                                echo "0";
                            }
                            ?>
                        </span>
                        <span class="stat-label">Hari Menulis</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number">
                            <?php 
                            if ($stats['last_diary']) {
                                $last = new DateTime($stats['last_diary']);
                                $now = new DateTime();
                                $diff = $last->diff($now);
                                echo $diff->days;
                            } else {
                                echo "0";
                            }
                            ?>
                        </span>
                        <span class="stat-label">Hari Terakhir</span>
                    </div>
                </div>
            </div>

            <!-- Form Edit Profil -->
            <div class="profile-form">
                <h2>Edit Profil</h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" 
                               value="<?php echo htmlspecialchars($user['nama_lengkap']); ?>" 
                               required class="form-control" placeholder="Masukkan nama lengkap">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" 
                               value="<?php echo htmlspecialchars($user['email']); ?>" 
                               class="form-control" placeholder="email@example.com">
                    </div>

                    <div class="form-group">
                        <label for="bio">Bio / Tentang Saya</label>
                        <textarea id="bio" name="bio" class="form-control" 
                                  placeholder="Ceritakan tentang dirimu..."><?php echo htmlspecialchars($user['bio']); ?></textarea>
                        <div class="form-note">Opsional - deskripsikan dirimu secara singkat</div>
                    </div>

                    <div class="form-group">
                        <label for="new_password">Password Baru</label>
                        <input type="password" id="new_password" name="new_password" 
                               class="form-control" placeholder="Masukkan password baru" minlength="6">
                        <div class="form-note">Kosongkan jika tidak ingin mengubah password</div>
                    </div>

                    <button type="submit" class="btn-update">Perbarui Profil</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Auto-hide alert after 5 seconds
        setTimeout(function() {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-20px)';
                setTimeout(() => alert.remove(), 500);
            }
        }, 5000);

        // Animate stats on load
        document.addEventListener('DOMContentLoaded', function() {
            const statNumbers = document.querySelectorAll('.stat-number');
            statNumbers.forEach(stat => {
                const target = parseInt(stat.textContent);
                if (!isNaN(target)) {
                    let current = 0;
                    const increment = target / 50;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            stat.textContent = target;
                            clearInterval(timer);
                        } else {
                            stat.textContent = Math.floor(current);
                        }
                    }, 20);
                }
            });
        });
    </script>
</body>
</html>
<?php mysqli_close($koneksi); ?>
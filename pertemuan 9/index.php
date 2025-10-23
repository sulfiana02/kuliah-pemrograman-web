<?php
include 'koneksi.php';
requireLogin();

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM diary WHERE user_id = $user_id ORDER BY tanggal DESC, created_at DESC";
$result = mysqli_query($koneksi, $query);
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
            background: linear-gradient(135deg, #87CEEB 0%, #B0E2FF 50%, #87CEEB 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            color: #1E90FF;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 2.8em;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.5);
            background: linear-gradient(45deg, #1E90FF, #4169E1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .header p {
            font-size: 1.2em;
            color: #4682B4;
        }
        .user-info {
            text-align: center;
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }
        .user-info span {
            color: #1E90FF;
            font-weight: 600;
            font-size: 1.1em;
        }
        .btn-logout {
            background: linear-gradient(45deg, #4169E1, #1E90FF);
            color: white;
            padding: 8px 15px;
            border-radius: 15px;
            text-decoration: none;
            font-size: 14px;
            margin-left: 10px;
            transition: all 0.3s ease;
        }
        .btn-logout:hover {
            background: linear-gradient(45deg, #1E90FF, #4169E1);
            transform: translateY(-2px);
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        .btn-tambah {
            background: linear-gradient(45deg, #1E90FF, #4169E1);
            border: 2px solid #1E90FF;
        }
        .btn-tambah:hover {
            background: linear-gradient(45deg, #4169E1, #1E90FF);
        }
        .btn-edit {
            background: linear-gradient(45deg, #4682B4, #1E90FF);
            padding: 8px 15px;
            font-size: 14px;
            border-radius: 15px;
        }
        .btn-edit:hover {
            background: linear-gradient(45deg, #1E90FF, #4682B4);
        }
        .btn-hapus {
            background: linear-gradient(45deg, #4169E1, #1E90FF);
            padding: 8px 15px;
            font-size: 14px;
            border-radius: 15px;
        }
        .btn-hapus:hover {
            background: linear-gradient(45deg, #1E90FF, #4169E1);
        }
        .action-bar {
            text-align: center;
            margin-bottom: 30px;
        }
        .diary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }
        .diary-card {
            background: linear-gradient(135deg, #E6F3FF, #D4EBFF);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 150, 255, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 2px solid #B0E2FF;
        }
        .diary-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 40px rgba(0, 150, 255, 0.3);
        }
        .diary-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #1E90FF, #4169E1, #4682B4);
        }
        .diary-card::after {
            content: '☁️';
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5em;
            opacity: 0.3;
        }
        .diary-title {
            color: #1E90FF;
            font-size: 1.4em;
            margin-bottom: 12px;
            border-bottom: 2px solid #B0E2FF;
            padding-bottom: 12px;
            font-weight: 600;
        }
        .diary-content {
            color: #4682B4;
            line-height: 1.7;
            margin-bottom: 18px;
            max-height: 120px;
            overflow: hidden;
            font-size: 0.95em;
        }
        .diary-date {
            color: #4169E1;
            font-size: 0.9em;
            margin-bottom: 18px;
            font-weight: 500;
        }
        .diary-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            border-top: 1px solid #B0E2FF;
            padding-top: 18px;
        }
        .empty-state {
            text-align: center;
            color: #1E90FF;
            padding: 60px 20px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            grid-column: 1 / -1;
        }
        .empty-state h3 {
            font-size: 1.8em;
            margin-bottom: 15px;
            color: #4169E1;
        }
        .empty-state p {
            font-size: 1.1em;
            color: #4682B4;
        }
        .alert {
            padding: 15px 20px;
            background: linear-gradient(135deg, #E6FFE6, #CCFFCC);
            color: #228B22;
            border-radius: 15px;
            margin-bottom: 25px;
            border: 2px solid #CCFFCC;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            font-weight: 500;
        }
        /* Collection of Animations */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideInLeft {
    from { transform: translateX(-100px); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

@keyframes slideInRight {
    from { transform: translateX(100px); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

@keyframes zoomIn {
    from { transform: scale(0.5); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

@keyframes flip {
    from { transform: rotateY(90deg); }
    to { transform: rotateY(0deg); }
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

/* Utility classes for animations */
.animate-fadeIn { animation: fadeIn 1s ease-out; }
.animate-slideInLeft { animation: slideInLeft 0.8s ease-out; }
.animate-slideInRight { animation: slideInRight 0.8s ease-out; }
.animate-zoomIn { animation: zoomIn 0.6s ease-out; }
.animate-flip { animation: flip 0.8s ease-out; }
.animate-shake { animation: shake 0.5s ease-in-out; }
    </style>
    <style>
    /* Animasi untuk cards */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-50px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-5px);
        }
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
        100% {
            transform: scale(1);
        }
    }

    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }
        100% {
            background-position: 1000px 0;
        }
    }

    /* Animasi untuk header */
    .header h1 {
        animation: bounce 2s infinite;
    }

    /* Animasi untuk cards dengan delay bertahap */
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

    /* Hover effects untuk cards */
    .diary-card:hover {
        animation: pulse 0.5s ease-in-out;
    }

    /* Animasi untuk tombol tambah */
    .btn-tambah {
        animation: pulse 2s infinite;
        position: relative;
        overflow: hidden;
    }

    .btn-tambah::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
        transform: rotate(45deg);
        animation: shimmer 3s infinite;
    }

    /* Animasi untuk user info */
    .user-info {
        animation: fadeInUp 0.8s ease-out;
    }

    /* Animasi untuk alert */
    .alert {
        animation: slideIn 0.5s ease-out;
    }

    /* Loading animation untuk empty state */
    .empty-state {
        animation: pulse 2s infinite;
    }

    /* Animasi untuk tombol aksi */
    .btn-edit, .btn-hapus {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-edit:hover, .btn-hapus:hover {
        transform: translateY(-2px) scale(1.1);
    }

    /* Particle background effect */
    .particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
    }

    .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        animation: floatParticle 20s infinite linear;
    }

    @keyframes floatParticle {
        0% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100px) rotate(360deg);
            opacity: 0;
        }
    }
</style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌊 Diary Harianku ☁️</h1>
            <p>💙 Catat setiap momen berharga dalam hidupmu ✨</p>
        </div>

        <div class="user-info">
            <span>👋 Halo, <?php echo $_SESSION['nama_lengkap']; ?>! (@<?php echo $_SESSION['username']; ?>)</span>
            <a href="logout.php" class="btn-logout">🚪 Logout</a>
        </div>

        <div class="action-bar">
            <a href="tambah.php" class="btn btn-tambah">+ Tambah Diary Baru</a>
        </div>

        <?php if (isset($_GET['pesan'])): ?>
            <div class="alert">
                <?php
                if ($_GET['pesan'] == 'tambah') echo "Diary berhasil ditambahkan!";
                elseif ($_GET['pesan'] == 'edit') echo "Diary berhasil diupdate!";
                elseif ($_GET['pesan'] == 'hapus') echo "Diary berhasil dihapus!";
                ?>
            </div>
        <?php endif; ?>

        <div class="diary-grid">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($diary = mysqli_fetch_assoc($result)): ?>
                    <div class="diary-card">
                        <h3 class="diary-title"><?php echo htmlspecialchars($diary['judul']); ?></h3>
                        <div class="diary-date">
                            📅 <?php echo date('d M Y', strtotime($diary['tanggal'])); ?>
                        </div>
                        <div class="diary-content">
                            <?php 
                            if (!empty($diary['isi_diary'])) {
                                echo nl2br(htmlspecialchars(substr($diary['isi_diary'], 0, 150)));
                                if (strlen($diary['isi_diary']) > 150) echo '...';
                            } else {
                                echo '<em style="color: #999;">Tidak ada catatan tambahan...</em>';
                            }
                            ?>
                        </div>
                        <div class="diary-actions">
                            <a href="edit.php?id=<?php echo $diary['id']; ?>" class="btn btn-edit">✏️ Edit</a>
                            <a href="hapus.php?id=<?php echo $diary['id']; ?>" class="btn btn-hapus" 
                               onclick="return confirm('Yakin ingin menghapus diary ini?')">🗑️ Hapus</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="empty-state">
                    <h3>📝 Belum ada diary</h3>
                    <p>Mulai catat hari-harimu dengan menekan tombol "Tambah Diary Baru"</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        setTimeout(function() {
            const alert = document.querySelector('.alert');
            if (alert) alert.style.display = 'none';
        }, 5000);
    </script>
    <script>
    // Particle background
    function createParticles() {
        const particlesContainer = document.createElement('div');
        particlesContainer.className = 'particles';
        document.body.appendChild(particlesContainer);

        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            
            // Random properties
            const size = Math.random() * 10 + 5;
            const left = Math.random() * 100;
            const animationDuration = Math.random() * 20 + 10;
            const animationDelay = Math.random() * 5;
            
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.left = `${left}vw`;
            particle.style.animationDuration = `${animationDuration}s`;
            particle.style.animationDelay = `${animationDelay}s`;
            
            particlesContainer.appendChild(particle);
        }
    }

    // Typing effect untuk header
    function typeWriter(element, text, speed = 100) {
        let i = 0;
        element.innerHTML = '';
        
        function type() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }
        type();
    }

    // Hover effect untuk cards
    function addCardHoverEffects() {
        const cards = document.querySelectorAll('.diary-card');
        
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
                this.style.boxShadow = '0 20px 40px rgba(0, 150, 255, 0.4)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
                this.style.boxShadow = '0 10px 30px rgba(0, 150, 255, 0.2)';
            });
        });
    }

    // Animated counter untuk statistics (jika ada)
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start);
            }
        }, 16);
    }

    // Scroll animations
    function initScrollAnimations() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        });

        document.querySelectorAll('.diary-card').forEach(card => {
            observer.observe(card);
        });
    }

    // Page load animations
    document.addEventListener('DOMContentLoaded', function() {
        // Create particle background
        createParticles();
        
        // Add hover effects to cards
        addCardHoverEffects();
        
        // Initialize scroll animations
        initScrollAnimations();
        
        // Animate header text
        const header = document.querySelector('.header h1');
        if (header) {
            const originalText = header.textContent;
            typeWriter(header, originalText, 150);
        }
        
        // Animate counters if exists
        const counters = document.querySelectorAll('.stat-number');
        counters.forEach(counter => {
            animateCounter(counter, parseInt(counter.textContent));
        });
    });

    // Real-time clock
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', { 
            hour: '2-digit', 
            minute: '2-digit',
            second: '2-digit'
        });
        const dateString = now.toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        const clockElement = document.getElementById('live-clock');
        if (clockElement) {
            clockElement.innerHTML = `🕒 ${timeString} <br>📅 ${dateString}`;
        }
    }

    // Tambahkan elemen clock di user-info (opsional)
    document.addEventListener('DOMContentLoaded', function() {
        const userInfo = document.querySelector('.user-info');
        if (userInfo) {
            const clockDiv = document.createElement('div');
            clockDiv.id = 'live-clock';
            clockDiv.style.marginTop = '10px';
            clockDiv.style.fontSize = '0.9em';
            clockDiv.style.color = '#4169E1';
            userInfo.appendChild(clockDiv);
            
            updateClock();
            setInterval(updateClock, 1000);
        }
    });
</script>
<!-- Loading Screen -->
<div id="loading-screen" style="
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #87CEEB 0%, #B0E2FF 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    transition: opacity 0.5s ease-out;
">
    <div style="text-align: center; color: white;">
        <div style="
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255,255,255,0.3);
            border-top: 5px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        "></div>
        <h3 style="margin-bottom: 10px;">Memuat Diary Harianmu...</h3>
        <p>🌊 Sedang menyiapkan kenangan indah ✨</p>
    </div>
</div>

<style>
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<script>
    // Hide loading screen when page is loaded
    window.addEventListener('load', function() {
        const loadingScreen = document.getElementById('loading-screen');
        setTimeout(() => {
            loadingScreen.style.opacity = '0';
            setTimeout(() => {
                loadingScreen.style.display = 'none';
            }, 500);
        }, 1000);
    });
</script>
</body>
</html>
<?php mysqli_close($koneksi); ?>
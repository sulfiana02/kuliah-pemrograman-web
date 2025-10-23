<?php
include 'koneksi.php';
requireLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi_diary = mysqli_real_escape_string($koneksi, $_POST['isi_diary']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    
    $query = "INSERT INTO diary (user_id, judul, isi_diary, tanggal) 
              VALUES ('$user_id', '$judul', '$isi_diary', '$tanggal')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?pesan=tambah");
        exit();
    } else {
        $error = "Error: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Diary Baru - Diary Harianku</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background: linear-gradient(135deg, #E6F3FF, #D4EBFF);
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(0, 150, 255, 0.3);
            width: 100%;
            max-width: 600px;
            border: 3px solid #B0E2FF;
            position: relative;
            overflow: hidden;
        }
        .form-container::before {
            content: '✨';
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 2em;
            opacity: 0.2;
        }
        .form-header {
            text-align: center;
            margin-bottom: 35px;
        }
        .form-header h1 {
            color: #1E90FF;
            margin-bottom: 10px;
            font-size: 2.2em;
            background: linear-gradient(45deg, #1E90FF, #4169E1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .form-header p {
            color: #4682B4;
            font-size: 1.1em;
        }
        .form-group {
            margin-bottom: 25px;
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
        }
        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }
        .form-group:nth-child(3) { animation-delay: 0.3s; }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #1E90FF;
            font-weight: 600;
            font-size: 1.1em;
        }
        .form-control {
            width: 100%;
            padding: 15px;
            border: 2px solid #B0E2FF;
            border-radius: 15px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            display: block;
        }
        .form-control:focus {
            outline: none;
            border-color: #1E90FF;
            box-shadow: 0 0 0 3px rgba(30, 144, 255, 0.2);
            background: white;
            transform: scale(1.02);
        }
        textarea.form-control {
            min-height: 200px;
            resize: vertical;
            font-family: inherit;
        }
        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 35px;
        }
        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            position: relative;
            overflow: hidden;
        }
        .btn-primary {
            background: linear-gradient(45deg, #1E90FF, #4169E1);
            color: white;
            border: 2px solid #1E90FF;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #4169E1, #1E90FF);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(30, 144, 255, 0.4);
        }
        .btn-secondary {
            background: linear-gradient(45deg, #87CEFA, #B0E2FF);
            color: #1E90FF;
            border: 2px solid #B0E2FF;
        }
        .btn-secondary:hover {
            background: linear-gradient(45deg, #B0E2FF, #87CEFA);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(135, 206, 250, 0.4);
        }
        .error {
            background: linear-gradient(135deg, #FFE6E6, #FFCCCC);
            color: #B22222;
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 25px;
            border: 2px solid #FFCCCC;
            text-align: center;
            font-weight: 500;
        }

        /* ANIMASI YANG DIPERBAIKI */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes formSlideIn {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes inputGlow {
            0% {
                box-shadow: 0 0 0 rgba(30, 144, 255, 0);
            }
            50% {
                box-shadow: 0 0 20px rgba(30, 144, 255, 0.5);
            }
            100% {
                box-shadow: 0 0 0 rgba(30, 144, 255, 0);
            }
        }

        .form-container {
            animation: formSlideIn 0.8s ease-out;
        }

        .form-control:focus {
            animation: inputGlow 1s ease-in-out;
        }

        /* Efek ripple untuk tombol */
        .btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.3s, height 0.3s;
        }

        .btn:hover::after {
            width: 300px;
            height: 300px;
        }

        /* Animasi untuk placeholder textarea */
        textarea.form-control::placeholder {
            transition: all 0.3s ease;
        }

        textarea.form-control:focus::placeholder {
            color: transparent;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1>✨ Tambah Diary Baru 🌊</h1>
            <p>📝 Isi detail diary harianmu 💙</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="error">❌ <?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="judul">Judul Diary:</label>
                <input type="text" id="judul" name="judul" required 
                       placeholder="Apa yang terjadi hari ini?" class="form-control">
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" required 
                       value="<?php echo date('Y-m-d'); ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="isi_diary">Isi Diary:</label>
                <textarea id="isi_diary" name="isi_diary" 
                          placeholder="✍️ Ceritakan pengalamanmu hari ini dengan detail...
                          
💭 Bagaimana perasaanmu?
🌟 Hal apa yang membuatmu bahagia?
📚 Pelajaran apa yang kamu dapat?
🎯 Rencana untuk besok?" 
                          rows="12" class="form-control"></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 Simpan Diary</button>
                <a href="index.php" class="btn btn-secondary">❌ Batal</a>
            </div>
        </form>
    </div>

    <script>
        // Animasi tambahan dengan JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            // Focus otomatis ke judul
            document.getElementById('judul').focus();
            
            // Animasi untuk form groups
            const formGroups = document.querySelectorAll('.form-group');
            formGroups.forEach((group, index) => {
                group.style.animationDelay = (index * 0.1) + 's';
            });
            
            // Efek ketik untuk placeholder textarea
            const textarea = document.getElementById('isi_diary');
            const originalPlaceholder = textarea.placeholder;
            
            textarea.addEventListener('focus', function() {
                this.placeholder = '✍️ Mulai menulis ceritamu di sini...';
            });
            
            textarea.addEventListener('blur', function() {
                if (this.value === '') {
                    this.placeholder = originalPlaceholder;
                }
            });
        });
    </script>
</body>
</html>
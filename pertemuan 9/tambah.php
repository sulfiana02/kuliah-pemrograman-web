<?php
include 'koneksi.php';
requireLogin();

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi_diary = mysqli_real_escape_string($koneksi, $_POST['isi_diary']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    
    $query = "INSERT INTO diary (user_id, judul, isi_diary, tanggal) 
              VALUES ($user_id, '$judul', '$isi_diary', '$tanggal')";
    
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
    <title>Tambah Diary - Personal Diary</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background: rgba(52, 73, 94, 0.9);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 700px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        .form-header {
            text-align: center;
            margin-bottom: 35px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .form-header h1 {
            color: #ecf0f1;
            margin-bottom: 10px;
            font-size: 2.2em;
            font-weight: 300;
            letter-spacing: 1px;
        }
        .form-header p {
            color: #bdc3c7;
            font-size: 1.1em;
        }
        .form-group {
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #ecf0f1;
            font-weight: 500;
            font-size: 1em;
        }
        .form-control {
            width: 100%;
            padding: 14px;
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
            min-height: 200px;
            resize: vertical;
            line-height: 1.6;
            font-family: inherit;
        }
        .char-counter {
            text-align: right;
            color: #95a5a6;
            font-size: 0.85em;
            margin-top: 8px;
            font-style: italic;
        }
        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 35px;
        }
        .btn {
            padding: 14px 35px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.3s ease;
            min-width: 150px;
        }
        .btn-primary {
            background: linear-gradient(45deg, #27ae60, #229954);
            color: white;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #229954, #27ae60);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
        }
        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: #bdc3c7;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #ecf0f1;
            transform: translateY(-2px);
        }
        .error {
            background: rgba(231, 76, 60, 0.2);
            color: #e74c3c;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            border: 1px solid rgba(231, 76, 60, 0.3);
            text-align: center;
            font-weight: 500;
        }
        .quick-dates {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .quick-date-btn {
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 6px;
            color: #bdc3c7;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .quick-date-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ecf0f1;
            transform: translateY(-1px);
        }
        .form-note {
            color: #95a5a6;
            font-size: 0.85em;
            margin-top: 8px;
            font-style: italic;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 30px 20px;
                margin: 10px;
            }
            .form-actions {
                flex-direction: column;
            }
            .btn {
                width: 100%;
            }
            .quick-dates {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1>Tambah Diary Baru</h1>
            <p>Simpan momen berharga dalam hidupmu</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="" id="diaryForm">
            <div class="form-group">
                <label for="judul">Judul Diary</label>
                <input type="text" id="judul" name="judul" required 
                       placeholder="Masukkan judul yang mencerminkan isi diary" 
                       class="form-control" autofocus>
                <div class="form-note">Buat judul yang deskriptif dan mudah diingat</div>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" required 
                       value="<?php echo date('Y-m-d'); ?>" class="form-control">
                <div class="quick-dates">
                    <button type="button" class="quick-date-btn" onclick="setToday()">Hari Ini</button>
                    <button type="button" class="quick-date-btn" onclick="setYesterday()">Kemarin</button>
                </div>
            </div>

            <div class="form-group">
                <label for="isi_diary">Isi Diary</label>
                <textarea id="isi_diary" name="isi_diary" 
                          placeholder="Tuliskan cerita, perasaan, atau pengalamanmu dengan bebas..." 
                          class="form-control"></textarea>
                <div class="char-counter">
                    <span id="charCount">0</span> karakter
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan Diary</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

    <script>
        // Character counter
        const textarea = document.getElementById('isi_diary');
        const charCount = document.getElementById('charCount');
        
        textarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });

        // Quick date buttons
        function setToday() {
            document.getElementById('tanggal').value = new Date().toISOString().split('T')[0];
        }

        function setYesterday() {
            const yesterday = new Date();
            yesterday.setDate(yesterday.getDate() - 1);
            document.getElementById('tanggal').value = yesterday.toISOString().split('T')[0];
        }

        // Form validation
        document.getElementById('diaryForm').addEventListener('submit', function(e) {
            const judul = document.getElementById('judul').value.trim();
            const tanggal = document.getElementById('tanggal').value;
            
            if (!judul) {
                e.preventDefault();
                alert('Judul diary tidak boleh kosong');
                return;
            }
            
            if (!tanggal) {
                e.preventDefault();
                alert('Tanggal harus diisi');
                return;
            }
        });

        // Auto-focus on title field
        document.getElementById('judul').focus();
    </script>
</body>
</html>
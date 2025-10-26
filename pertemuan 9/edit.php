<?php
include 'koneksi.php';
requireLogin();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM diary WHERE id = $id AND user_id = $user_id";
$result = mysqli_query($koneksi, $query);
$diary = mysqli_fetch_assoc($result);

if (!$diary) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isi_diary = mysqli_real_escape_string($koneksi, $_POST['isi_diary']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    
    $query = "UPDATE diary SET judul='$judul', isi_diary='$isi_diary', tanggal='$tanggal' WHERE id=$id AND user_id=$user_id";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php?pesan=edit");
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
    <title>Edit Diary - Personal Diary</title>
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
        .diary-info {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            border-left: 3px solid #3498db;
        }
        .diary-info p {
            color: #bdc3c7;
            font-size: 0.9em;
            margin-bottom: 5px;
        }
        .diary-info strong {
            color: #3498db;
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
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #2980b9, #3498db);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
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
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1>Edit Diary</h1>
            <p>Perbarui catatan harianmu</p>
        </div>

        <div class="diary-info">
            <p><strong>Diary ID:</strong> #<?php echo $diary['id']; ?></p>
            <p><strong>Dibuat:</strong> <?php echo date('d M Y H:i', strtotime($diary['created_at'])); ?></p>
            <?php if ($diary['updated_at'] != $diary['created_at']): ?>
                <p><strong>Terakhir diupdate:</strong> <?php echo date('d M Y H:i', strtotime($diary['updated_at'])); ?></p>
            <?php endif; ?>
        </div>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="" id="editForm">
            <div class="form-group">
                <label for="judul">Judul Diary</label>
                <input type="text" id="judul" name="judul" required 
                       value="<?php echo htmlspecialchars($diary['judul']); ?>" 
                       class="form-control" placeholder="Masukkan judul yang meaningful" autofocus>
                <div class="form-note">Judul yang baik mencerminkan isi diary</div>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" required 
                       value="<?php echo $diary['tanggal']; ?>" class="form-control">
                <div class="form-note">Tanggal ketika kejadian berlangsung</div>
            </div>

            <div class="form-group">
                <label for="isi_diary">Isi Diary</label>
                <textarea id="isi_diary" name="isi_diary" 
                          class="form-control" 
                          placeholder="Tuliskan cerita, perasaan, atau refleksimu..."><?php echo htmlspecialchars($diary['isi_diary']); ?></textarea>
                <div class="char-counter">
                    <span id="charCount"><?php echo strlen($diary['isi_diary']); ?></span> karakter
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Update Diary</button>
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

        // Form validation
        document.getElementById('editForm').addEventListener('submit', function(e) {
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
            
            // Confirm before updating
            if (!confirm('Apakah Anda yakin ingin menyimpan perubahan?')) {
                e.preventDefault();
            }
        });

        // Auto-focus on title field
        document.getElementById('judul').focus();
    </script>
</body>
</html>
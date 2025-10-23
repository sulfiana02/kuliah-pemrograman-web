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
    <title>Edit Diary - Diary Harianku</title>
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
            content: '🌊';
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
        }
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
        }
        .form-control:focus {
            outline: none;
            border-color: #1E90FF;
            box-shadow: 0 0 0 3px rgba(30, 144, 255, 0.2);
            background: white;
        }
        textarea.form-control {
            min-height: 180px;
            resize: vertical;
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
        }
        .btn-primary {
            background: linear-gradient(45deg, #4682B4, #1E90FF);
            color: white;
            border: 2px solid #4682B4;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #1E90FF, #4682B4);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(70, 130, 180, 0.4);
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
    /* Animasi untuk form container */
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

    /* Animasi untuk input fields */
    .form-control {
        transition: all 0.3s ease;
    }

    .form-control:focus {
        animation: inputGlow 1s ease-in-out;
    }

    /* Animasi bertahap untuk form groups */
    .form-group {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    .form-group:nth-child(1) { animation-delay: 0.1s; }
    .form-group:nth-child(2) { animation-delay: 0.2s; }
    .form-group:nth-child(3) { animation-delay: 0.3s; }
    .form-group:nth-child(4) { animation-delay: 0.4s; }

    /* Animasi untuk buttons */
    .btn-primary, .btn-secondary {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .btn-primary::after, .btn-secondary::after {
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

    .btn-primary:hover::after, .btn-secondary:hover::after {
        width: 300px;
        height: 300px;
    }
</style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h1>🌊 Edit Diary ✨</h1>
            <p>✏️ Update diary harianmu 💙</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="error">❌ <?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="judul">Judul Diary:</label>
                <input type="text" id="judul" name="judul" required 
                       value="<?php echo htmlspecialchars($diary['judul']); ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" required 
                       value="<?php echo $diary['tanggal']; ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="isi_diary">Isi Diary:</label>
                <textarea id="isi_diary" name="isi_diary" 
                          class="form-control"><?php echo htmlspecialchars($diary['isi_diary']); ?></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">💾 Update Diary</button>
                <a href="index.php" class="btn btn-secondary">❌ Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
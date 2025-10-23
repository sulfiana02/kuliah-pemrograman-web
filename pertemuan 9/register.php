<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    
    $check_query = "SELECT id FROM users WHERE username = '$username'";
    $check_result = mysqli_query($koneksi, $check_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        $error = "Username sudah digunakan!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO users (username, password, nama_lengkap, email) 
                  VALUES ('$username', '$hashed_password', '$nama_lengkap', '$email')";
        
        if (mysqli_query($koneksi, $query)) {
            $success = "Registrasi berhasil! Silakan login.";
        } else {
            $error = "Error: " . mysqli_error($koneksi);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Diary Harianku</title>
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
        .register-container {
            background: linear-gradient(135deg, #E6F3FF, #D4EBFF);
            padding: 50px;
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(0, 150, 255, 0.3);
            width: 100%;
            max-width: 500px;
            border: 3px solid #B0E2FF;
            text-align: center;
        }
        .register-header {
            margin-bottom: 40px;
        }
        .register-header h1 {
            color: #1E90FF;
            margin-bottom: 15px;
            font-size: 2.5em;
            background: linear-gradient(45deg, #1E90FF, #4169E1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .register-header p {
            color: #4682B4;
            font-size: 1.1em;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
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
            padding: 12px;
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
        .btn-register {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #1E90FF, #4169E1);
            color: white;
            border: none;
            border-radius: 15px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(30, 144, 255, 0.3);
            margin-bottom: 20px;
        }
        .btn-register:hover {
            background: linear-gradient(45deg, #4169E1, #1E90FF);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(30, 144, 255, 0.4);
        }
        .btn-login {
            display: block;
            padding: 12px;
            background: linear-gradient(45deg, #87CEFA, #B0E2FF);
            color: #1E90FF;
            text-decoration: none;
            border-radius: 15px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background: linear-gradient(45deg, #B0E2FF, #87CEFA);
            transform: translateY(-2px);
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
        .success {
            background: linear-gradient(135deg, #E6FFE6, #CCFFCC);
            color: #228B22;
            padding: 15px;
            border-radius: 15px;
            margin-bottom: 25px;
            border: 2px solid #CCFFCC;
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
    /* Animasi untuk container */
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

    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    @keyframes glow {
        0%, 100% {
            box-shadow: 0 20px 40px rgba(0, 150, 255, 0.3);
        }
        50% {
            box-shadow: 0 20px 40px rgba(0, 150, 255, 0.6);
        }
    }

    .login-container {
        animation: fadeInUp 0.8s ease-out;
    }

    .login-container:hover {
        animation: glow 2s ease-in-out infinite;
    }

    .btn-login, .btn-register {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .btn-login::before, .btn-register::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.5s;
    }

    .btn-login:hover::before, .btn-register:hover::before {
        left: 100%;
    }

    /* Animasi untuk input fields */
    .form-control {
        transition: all 0.3s ease;
    }

    .form-control:focus {
        transform: scale(1.02);
    }

    /* Animasi untuk header */
    .login-header h1 {
        animation: float 3s ease-in-out infinite;
    }
</style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1>🌟 Register</h1>
            <p>Buat akun diary barumu 🌊</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="error">❌ <?php echo $error; ?></div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
            <div class="success">✅ <?php echo $success; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nama_lengkap">👩‍💼 Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" required 
                       placeholder="Masukkan nama lengkap..." class="form-control">
            </div>

            <div class="form-group">
                <label for="username">👤 Username:</label>
                <input type="text" id="username" name="username" required 
                       placeholder="Buat username..." class="form-control">
            </div>

            <div class="form-group">
                <label for="email">📧 Email:</label>
                <input type="email" id="email" name="email" 
                       placeholder="Masukkan email (opsional)..." class="form-control">
            </div>

            <div class="form-group">
                <label for="password">🔒 Password:</label>
                <input type="password" id="password" name="password" required 
                       placeholder="Buat password..." class="form-control" minlength="6">
            </div>

            <button type="submit" class="btn-register">🌊 Daftar Sekarang</button>
            
            <a href="login.php" class="btn-login">← Sudah punya akun? Login di sini</a>
        </form>
    </div>
</body>
</html>
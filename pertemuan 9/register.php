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
    <title>Register - Personal Diary</title>
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
        .register-container {
            background: rgba(52, 73, 94, 0.9);
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 500px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }
        .register-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .register-header h1 {
            color: #ecf0f1;
            margin-bottom: 15px;
            font-size: 2.2em;
            font-weight: 300;
            letter-spacing: 1px;
        }
        .register-header p {
            color: #bdc3c7;
            font-size: 1.1em;
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
        .btn-register {
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
            margin-bottom: 20px;
        }
        .btn-register:hover {
            background: linear-gradient(45deg, #229954, #27ae60);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
        }
        .btn-login {
            display: block;
            padding: 12px;
            background: rgba(255, 255, 255, 0.1);
            color: #bdc3c7;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .btn-login:hover {
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
        .success {
            background: rgba(39, 174, 96, 0.2);
            color: #27ae60;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            border: 1px solid rgba(39, 174, 96, 0.3);
            text-align: center;
            font-weight: 500;
        }
        .form-note {
            color: #95a5a6;
            font-size: 0.85em;
            margin-top: 5px;
            font-style: italic;
        }
        .password-requirements {
            background: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
            border-left: 3px solid #3498db;
        }
        .password-requirements h4 {
            color: #ecf0f1;
            margin-bottom: 8px;
            font-size: 0.9em;
            font-weight: 600;
        }
        .password-requirements ul {
            color: #bdc3c7;
            font-size: 0.8em;
            padding-left: 20px;
        }
        .password-requirements li {
            margin-bottom: 3px;
        }

        @media (max-width: 768px) {
            .register-container {
                padding: 30px 20px;
                margin: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1>Buat Akun Baru</h1>
            <p>Mulai catat perjalanan hidupmu</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" required 
                       placeholder="Masukkan nama lengkap Anda" class="form-control" autofocus>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required 
                       placeholder="Pilih username unik" class="form-control">
                <div class="form-note">Minimal 3 karakter, huruf dan angka saja</div>
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" 
                       placeholder="email@contoh.com (opsional)" class="form-control">
                <div class="form-note">Opsional - untuk pemulihan akun</div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required 
                       placeholder="Buat password yang kuat" class="form-control" minlength="6">
                
                <div class="password-requirements">
                    <h4>Persyaratan Password:</h4>
                    <ul>
                        <li>Minimal 6 karakter</li>
                        <li>Disarankan kombinasi huruf dan angka</li>
                    </ul>
                </div>
            </div>

            <button type="submit" class="btn-register">Daftar Sekarang</button>
            
            <a href="login.php" class="btn-login">← Sudah punya akun? Login di sini</a>
        </form>
    </div>

    <script>
        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const username = document.getElementById('username').value;
            
            if (password.length < 6) {
                e.preventDefault();
                alert('Password harus minimal 6 karakter');
                return;
            }
            
            if (username.length < 3) {
                e.preventDefault();
                alert('Username harus minimal 3 karakter');
                return;
            }
        });

        // Auto-hide messages after 5 seconds
        setTimeout(function() {
            const messages = document.querySelectorAll('.error, .success');
            messages.forEach(msg => {
                if (msg) {
                    msg.style.opacity = '0';
                    msg.style.transform = 'translateY(-20px)';
                    setTimeout(() => msg.remove(), 500);
                }
            });
        }, 5000);
    </script>
</body>
</html>
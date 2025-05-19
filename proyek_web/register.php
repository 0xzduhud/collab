<?php
include "koneksi.php";

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Cek apakah username sudah digunakan
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Username sudah digunakan, silakan pilih yang lain.";
    } else {
        // Simpan ke database
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $query)) {
            $success = "Registrasi berhasil! Silakan login.";
        } else {
            $error = "Registrasi gagal: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register User</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            background: url('assets/bg1.jpg');
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-box {
            background: rgba(0, 0, 0, 0.6);
            
            padding: 40px;
            border-radius: 15px;
            width: 300px;
            color: #fff;
            
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            outline: none;
            
        }
        button {
            
            width: 100%;
            padding: 12px;
            background-color: #00cc99;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
        }
        
        
        .message {
            margin-top: 15px;
            color: green;
        }
        .error {
            color: #ff6666;
            margin-top: 10px;
            font-size: 14px;
        }
        a {
            
            margin-top: 15px;
            text-decoration: underline;
            color: #007BFF;
        }
    </style>
</head>
<body>

    <div class="register-box">
        <h2>Registrasi User</h2>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="register">Register</button><br>
        </form>
        <?php 
            if (isset($success)) echo "<div class='message'>$success</div>"; 
            if (isset($error)) echo "<div class='error'>$error</div>"; 
        ?><br>
        <a href="login_user.php">Sudah punya akun? Login di sini</a>
    </div>

</body>
</html>

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
        body {
            font-family: Arial, sans-serif;
            background-color: #eef;
            text-align: center;
            padding-top: 100px;
        }
        .register-box {
            background-color: white;
            padding: 30px;
            display: inline-block;
            border-radius: 10px;
            box-shadow: 0 0 10px #aaa;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            margin: 10px;
            width: 80%;
        }
        button {
            padding: 10px 20px;
            margin-top: 10px;
        }
        .message {
            margin-top: 15px;
            color: green;
        }
        .error {
            margin-top: 15px;
            color: red;
        }
        a {
            display: block;
            margin-top: 15px;
            text-decoration: none;
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
            <button type="submit" name="register">Register</button>
        </form>
        <?php 
            if (isset($success)) echo "<div class='message'>$success</div>"; 
            if (isset($error)) echo "<div class='error'>$error</div>"; 
        ?>
        <a href="login_user.php">Sudah punya akun? Login di sini</a>
    </div>

</body>
</html>

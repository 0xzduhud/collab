<?php

include "koneksi.php";
session_start();
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["login"] = true;
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $username;
        header("location: dashboard_user.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login User</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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
        .login-box {
            background: rgba(0, 0, 0, 0.6);
            
            padding: 40px;
            border-radius: 15px;
            width: 300px;
            color: #fff;
            
        }
        .login-box h2 {
            margin-bottom: 25px;
            font-weight: 600;
            font-size: 24px;
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
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }
        
        .register-link {
            display: block;
            margin-top: 15px;
            color: #00ccff;
            text-decoration: none;
            font-size: 14px;
            text-decoration: underline;
        }

        .error {
            color: #ff6666;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login User</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" value="login" name="login">Login</button>
    </form>
    <a href="register.php" class="register-link">Belum punya akun? Daftar di sini</a>
    <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
</div>

</body>
</html>

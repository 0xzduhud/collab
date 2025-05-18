<?php
session_start();
include "koneksi.php"; // Pastikan file koneksi sudah benar

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard_admin.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
           background-color: #343a40;
            text-align: center;
            padding-top: 100px;
            
        }
        .login-box {
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
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>Login Admin</h2>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
        </form>
        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
    </div>

</body>
</html>

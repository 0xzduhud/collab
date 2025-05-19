<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    die("Anda harus login untuk menambahkan komentar.");
}

$handphone_id = $_POST['handphone_id'];
$user_id = $_SESSION['user_id'];
$isi = mysqli_real_escape_string($conn, $_POST['isi']);

// Proses upload gambar
$gambar_nama = null;
if (isset($_FILES['gambar_komentar']) && $_FILES['gambar_komentar']['error'] === UPLOAD_ERR_OK) {
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    $file_tmp = $_FILES['gambar_komentar']['tmp_name'];
    $file_name = $_FILES['gambar_komentar']['name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (in_array($file_ext, $allowed_ext)) {
        $gambar_nama = uniqid('komen_', true) . '.' . $file_ext;
        $upload_path = 'uploads_komentar/' . $gambar_nama;

        // Pindahkan file ke folder uploads_komentar
        if (!move_uploaded_file($file_tmp, $upload_path)) {
            die("Gagal mengupload gambar.");
        }
    } else {
        die("Format gambar tidak didukung.");
    }
}

// Query menggunakan prepared statement
$query = "INSERT INTO diskusi (handphone_id, user_id, isi, gambar_komentar, created_at)
          VALUES (?, ?, ?, ?, NOW())";
$stmt = $conn->prepare($query);
$stmt->bind_param("iiss", $handphone_id, $user_id, $isi, $gambar_nama);
$stmt->execute();

// Kembali ke halaman detail HP
header("Location: detail_hp.php?id=$handphone_id");
exit;
?>

<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    die("Anda harus login untuk menambahkan komentar.");
}

$handphone_id = $_POST['handphone_id'];
$user_id = $_SESSION['user_id'];
$isi = mysqli_real_escape_string($conn, $_POST['isi']);

$query = "INSERT INTO diskusi (handphone_id, user_id, isi) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("iis", $handphone_id, $user_id, $isi);
$stmt->execute();

// Kembali ke halaman detail HP
header("Location: detail_hp.php?id=$handphone_id");
exit;
?>

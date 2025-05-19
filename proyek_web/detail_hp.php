<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];
$hp = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk_hp WHERE handphone_id=$id"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail HP - <?= $hp['nama'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="assets/<?= $hp['gambar'] ?>" class="img-fluid rounded-start" alt="<?= $hp['nama'] ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title"><?= $hp['nama'] ?></h3>
                    <p class="card-text"><strong>Harga:</strong> Rp<?= number_format($hp['harga']) ?></p>
                    <p><strong>Merk:</strong> <?= $hp['merk'] ?></p>
                    <p><strong>Chipset:</strong> <?= $hp['chipset'] ?></p>
                    <p><strong>RAM/ROM:</strong> <?= $hp['ram_rom'] ?></p>
                    <p><strong>Baterai:</strong> <?= $hp['kapasitasbatre'] ?></p>
                    <p><strong>OS:</strong> <?= $hp['os'] ?></p>
                    <p><strong>Layar:</strong> <?= $hp['ukuran_refreshrate'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <h4>Diskusi Pengguna</h4>

    <!-- Form Komentar -->
    <?php if (isset($_SESSION['user_id'])): ?>
    <form action="tambah_diskusi.php" method="POST" enctype="multipart/form-data" class="mb-4">
    <input type="hidden" name="handphone_id" value="<?= $hp['handphone_id'] ?>">
    <div class="mb-3">
        <textarea name="isi" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>
    </div>
    <div class="mb-3">
        <input type="file" name="gambar_komentar" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
    <?php else: ?>
    <div class="alert alert-warning">Silakan login untuk ikut berdiskusi.</div>
    <?php endif; ?>

    <!-- Komentar -->
    <?php
    $diskusi = mysqli_query($conn, "SELECT d.*, u.username FROM diskusi d JOIN users u ON d.user_id = u.user_id WHERE d.handphone_id = $id ORDER BY d.created_at DESC");
    while ($d = mysqli_fetch_assoc($diskusi)): ?>
        <div class="card mb-2">
            <div class="card-body">
                <h6 class="card-subtitle mb-1 text-muted"><?= $d['username'] ?> - <?= $d['created_at'] ?></h6>
                <p class="card-text"><?= nl2br(htmlspecialchars($d['isi'])) ?></p>

                <?php if (!empty($d['gambar_komentar'])): ?>
                <img src="uploads_komentar/<?= htmlspecialchars($d['gambar_komentar']) ?>" class="img-fluid mt-2" style="max-height:200px;" alt="Komentar gambar">
            <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>

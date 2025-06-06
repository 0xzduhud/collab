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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="style.css" rel="stylesheet"> 
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .card-custom {
            background-color: #121212;
            border: 1px solid #333;
            border-radius: 12px;
            padding: 20px;
        }
        .form-control, .form-control:focus {
            background-color: #1e1e1e;
            color: #fff;
            border: 1px solid #444;
        }
        .form-text {
            color: #bbb;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .card-subtitle {
            color: #aaa;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container my-5">
    <div class="card-custom mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="assets/<?= $hp['gambar'] ?>" class="img-fluid rounded" alt="<?= $hp['nama'] ?>">
            </div>
            <div class="col-md-8">
                <div class="ps-3">
                    <h3><?= $hp['nama'] ?></h3>
                    <div class="border-bottom py-2 d-flex">
                        <strong style="border-right:1px solid #555; min-width:120px;">Harga:</strong>
                        <span class="ps-3 flex-grow-1">Rp<?= number_format($hp['harga']) ?></span>
                    </div>
                    <div class="border-bottom py-2 d-flex">
                        <strong style="border-right:1px solid #555; min-width:120px;">Merk:</strong>
                        <span class="ps-3 flex-grow-1"><?= $hp['merk'] ?></span>
                    </div>
                    <div class="border-bottom py-2 d-flex">
                        <strong style="border-right:1px solid #555; min-width:120px;">Chipset:</strong>
                        <span class="ps-3 flex-grow-1"><?= $hp['chipset'] ?></span>
                    </div>
                    <div class="border-bottom py-2 d-flex">
                        <strong style="border-right:1px solid #555; min-width:120px;">RAM/ROM:</strong>
                        <span class="ps-3 flex-grow-1"><?= $hp['ram_rom'] ?></span>
                    </div>
                    <div class="border-bottom py-2 d-flex">
                        <strong style="border-right:1px solid #555; min-width:120px;">Baterai:</strong>
                        <span class="ps-3 flex-grow-1"><?= $hp['kapasitasbatre'] ?></span>
                    </div>
                    <div class="border-bottom py-2 d-flex">
                        <strong style="border-right:1px solid #555; min-width:120px;">OS:</strong>
                        <span class="ps-3 flex-grow-1"><?= $hp['os'] ?></span>
                    </div>
                    <div class="py-2 d-flex">
                        <strong style="border-right:1px solid #555; min-width:120px;">Layar:</strong>
                        <span class="ps-3 flex-grow-1"><?= $hp['ukuran_refreshrate'] ?></span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <h4>Diskusi Pengguna</h4>

    <?php if (isset($_SESSION['user_id'])): ?>
    <form action="tambah_diskusi.php" method="POST" enctype="multipart/form-data" class="mb-4">
        <input type="hidden" name="handphone_id" value="<?= $hp['handphone_id'] ?>">
        <div class="mb-3">
            <textarea name="isi" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>
        </div>
        <div class="mb-3">
            <input type="file" name="gambar_komentar" class="form-control" accept="image/*">
            <small class="form-text">Opsional: Upload gambar (max 2MB)</small>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
    <?php else: ?>
        <div class="alert alert-warning">Silakan login untuk ikut berdiskusi.</div>
    <?php endif; ?>

    <?php
    $diskusi = mysqli_query($conn, "SELECT d.*, u.username FROM diskusi d JOIN users u ON d.user_id = u.user_id WHERE d.handphone_id = $id ORDER BY d.created_at DESC");
    while ($d = mysqli_fetch_assoc($diskusi)): ?>
        <div class="card-custom mb-3">
            <h6 class="card-subtitle mb-1"><?= $d['username'] ?> - <?= $d['created_at'] ?></h6>
            <p><?= nl2br(htmlspecialchars($d['isi'])) ?></p>
            <?php if (!empty($d['gambar_komentar'])): ?>
                <img src="uploads_komentar/<?= htmlspecialchars($d['gambar_komentar']) ?>" class="img-fluid mt-2" style="max-height:200px;" alt="Komentar gambar">
            <?php endif; ?>
        </div>
    <?php endwhile; ?>
</div>

</body>
</html>

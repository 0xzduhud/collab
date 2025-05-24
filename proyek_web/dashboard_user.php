<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login_user.php");
    exit();
}

require 'koneksi.php';

$keyword = strtolower(trim($_GET['keyword'] ?? ''));
$brand = strtolower(trim($_GET['brand'] ?? ''));
$min_harga = filter_input(INPUT_GET, 'min_harga', FILTER_VALIDATE_INT, ['options' => ['default' => 0]]);
$max_harga = filter_input(INPUT_GET, 'max_harga', FILTER_VALIDATE_INT, ['options' => ['default' => PHP_INT_MAX]]);
$sort = $_GET['sort'] ?? '';

$query = "SELECT * FROM produk_hp WHERE 1";

if ($keyword) {
    $query .= " AND LOWER(nama) LIKE '%$keyword%'";
}
if ($brand) {
    $query .= " AND LOWER(nama) LIKE '%$brand%'";
}
$query .= " AND harga >= $min_harga AND harga <= $max_harga";

if ($sort === 'asc') {
    $query .= " ORDER BY harga ASC";
} elseif ($sort === 'desc') {
    $query .= " ORDER BY harga DESC";
}

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Gadget Finder - Rekomendasi HP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #0d0d0d;
            font-family: 'Inter', sans-serif;
            color: #fff;
        }
        .navbar {
            background-color: #111;
            border-bottom: 1px solid #222;
        }
        .form-control, .form-select {
            background-color: #1a1a1a;
            border: 1px solid #333;
            color: #fff;
        }
        .form-control::placeholder {
            color: #888;
        }
        .btn-warning {
            background-color: #f0ad4e;
            border: none;
            font-weight: 600;
        }
        .btn-warning:hover {
            background-color: #e69728;
        }
        .card {
            background-color: #1a1a1a;
            border: none;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.4);
        }
        .card-img-top {
            height: 220px;
            object-fit: contain;
            background-color: #fff;
            padding: 15px;
        }
        .filter-box {
            background-color: #141414;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            border: 1px solid #2c2c2c;
        }
        .section-title {
            font-weight: 700;
            color: #f0ad4e;
            margin-bottom: 10px;
        }
        .product-title {
            font-weight: 600;
        }
        .text-light-muted {
            color: #ccc;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold text-warning" href="dashboard_user.php">Gadget Finder</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
      <ul class="navbar-nav mb-2 mb-lg-0 gap-2">
        <li class="nav-item">
          <form class="d-flex" method="GET" action="">
            <input class="form-control me-2" type="search" placeholder="Cari HP..." name="keyword" value="<?= htmlspecialchars($keyword) ?>">
            <button class="btn btn-warning" type="submit">Cari</button>
          </form>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="btn btn-outline-light">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-4">
    <h2 class="text-center section-title">Rekomendasi HP Terbaik</h2>
    <form method="GET" class="row g-3 filter-box">
        <div class="col-md-3">
            <label for="brand" class="form-label">Merek:</label>
            <select name="brand" id="brand" class="form-select">
                <option value="">Semua</option>
                <option value="xiaomi" <?= $brand === 'xiaomi' ? 'selected' : '' ?>>Xiaomi</option>
                <option value="oppo" <?= $brand === 'oppo' ? 'selected' : '' ?>>Oppo</option>
                <option value="realme" <?= $brand === 'realme' ? 'selected' : '' ?>>Realme</option>
                <option value="samsung" <?= $brand === 'samsung' ? 'selected' : '' ?>>Samsung</option>
                <option value="vivo" <?= $brand === 'vivo' ? 'selected' : '' ?>>Vivo</option>
                <option value="iphone" <?= $brand === 'iphone' ? 'selected' : '' ?>>iPhone</option>
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label">Harga Min:</label>
            <input type="number" name="min_harga" class="form-control" placeholder="1.000.000" value="<?= htmlspecialchars($min_harga) ?>">
        </div>
        <div class="col-md-2">
            <label class="form-label">Harga Max:</label>
            <input type="number" name="max_harga" class="form-control" placeholder="10.000.000" value="<?= htmlspecialchars($max_harga === PHP_INT_MAX ? '' : $max_harga) ?>">
        </div>
        <div class="col-md-3">
            <label class="form-label">Urutkan:</label>
            <select name="sort" class="form-select">
                <option value="">Default</option>
                <option value="asc" <?= $sort === 'asc' ? 'selected' : '' ?>>Harga Termurah</option>
                <option value="desc" <?= $sort === 'desc' ? 'selected' : '' ?>>Harga Termahal</option>
            </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-warning w-100">Filter</button>
        </div>
    </form>

    <div class="row mt-4">
        <?php if (mysqli_num_rows($result) === 0): ?>
            <p class="text-center text-light-muted">Tidak ada produk ditemukan dengan filter tersebut.</p>
        <?php else: ?>
            <?php while ($hp = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="assets/<?= htmlspecialchars($hp['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($hp['nama']) ?>">
                        <div class="card-body text-center">
                            <h5 class="product-title"><?= htmlspecialchars($hp['nama']) ?></h5>
                            <p class="text-warning fw-semibold">Rp <?= number_format($hp['harga'], 0, ',', '.') ?></p>
                            <a href="detail_hp.php?id=<?= $hp['handphone_id'] ?>" class="btn btn-outline-warning btn-sm">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

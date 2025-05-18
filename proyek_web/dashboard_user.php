<?php
require 'koneksi.php';

// Ambil parameter GET dan bersihkan
$keyword = strtolower(trim($_GET['keyword'] ?? ''));
$brand = strtolower(trim($_GET['brand'] ?? ''));
$min_harga = filter_input(INPUT_GET, 'min_harga', FILTER_VALIDATE_INT, ['options' => ['default' => 0]]);
$max_harga = filter_input(INPUT_GET, 'max_harga', FILTER_VALIDATE_INT, ['options' => ['default' => PHP_INT_MAX]]);
$sort = $_GET['sort'] ?? '';

// Query dasar
$query = "SELECT * FROM produk_hp WHERE 1";

// Filter nama/brand
if ($keyword) {
    $query .= " AND LOWER(nama) LIKE '%$keyword%'";
}
if ($brand) {
    $query .= " AND LOWER(nama) LIKE '%$brand%'";
}

// Filter harga
$query .= " AND harga >= $min_harga AND harga <= $max_harga";

// Urutan harga
if ($sort === 'asc') {
    $query .= " ORDER BY harga ASC";
} elseif ($sort === 'desc') {
    $query .= " ORDER BY harga DESC";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Filter HP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
            background-color: #fff;
            padding: 10px;
        }
        body {
            background-color: #343a40;
        }
    </style>
</head>
<body class="text-white">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container justify-content-center">
    <a class="navbar-brand fw-bold mx-auto" href="dashboard_user.php">Gadget Finder</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
      <ul class="navbar-nav mb-2 mb-lg-0 align-items-center gap-3">
        <li class="nav-item">
          <form class="d-flex" method="GET" action="">
            <input class="form-control me-2" type="search" placeholder="Cari HP..." name="keyword" value="<?= htmlspecialchars($keyword) ?>">
            <button class="btn btn-outline-warning" type="submit">Search</button>
          </form>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<div class="container my-4">
    <h2 class="text-center">Gadget Finder</h2>
    <form method="GET" class="row g-3 align-items-center p-3 rounded">
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
        <div class="col-md-3">
            <label class="form-label">Harga Minimum:</label>
            <input type="number" name="min_harga" class="form-control" placeholder="Contoh: 1000000" value="<?= htmlspecialchars($min_harga) ?>">
        </div>
        <div class="col-md-3">
            <label class="form-label">Harga Maksimum:</label>
            <input type="number" name="max_harga" class="form-control" placeholder="Contoh: 5000000" value="<?= htmlspecialchars($max_harga === PHP_INT_MAX ? '' : $max_harga) ?>">
        </div>
        <div class="col-md-3">
            <label class="form-label">Urutkan Harga:</label>
            <select name="sort" class="form-select">
                <option value="">Default</option>
                <option value="asc" <?= $sort === 'asc' ? 'selected' : '' ?>>Harga Terendah ke Tertinggi</option>
                <option value="desc" <?= $sort === 'desc' ? 'selected' : '' ?>>Harga Tertinggi ke Terendah</option>
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-warning w-100">Filter</button>
        </div>
    </form>

    <hr class="bg-light">

    <div class="row">
        <?php if (mysqli_num_rows($result) == 0): ?>
            <p class="text-center">Tidak ada produk yang sesuai dengan filter.</p>
        <?php else: ?>
            <?php while ($hp = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="assets/<?= htmlspecialchars($hp['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($hp['nama']) ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= htmlspecialchars($hp['nama']) ?></h5>
                            <p class="card-text">Rp <?= number_format($hp['harga'], 0, ',', '.') ?></p>
                            <a href="detail_hp.php?id=<?= $hp['handphone_id'] ?>" class="btn btn-primary btn-sm">Lihat Detail & Diskusi</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

</body>
</html>

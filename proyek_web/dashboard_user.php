<?php
// Data HP dari berbagai brand
$xiaomis = [
    ["nama" => "Xiaomi Redmi Note 12", "harga" => 1399999, "gambar" => "xiaominote12.jpeg"],
    ["nama" => "Xiaomi Redmi 13", "harga" => 1750000, "gambar" => "xiaomi13.png"],
    ["nama" => "Xiaomi Redmi Note 13 Pro", "harga" => 2099999, "gambar" => "xiaominote13pro.png"],
    ["nama" => "Xiaomi 14", "harga" => 3299000, "gambar" => "xiaomi14.jpg"],
    ["nama" => "Xiaomi 14 Pro", "harga" => 3899000, "gambar" => "xiaomi14pro.png"],
    ["nama" => "Xiaomi 15", "harga" => 4799900, "gambar" => "xiaomi15.png"],
];

$oppos = [
    ["nama" => "Oppo A3", "harga" => 1349999, "gambar" => "oppoa3.png"],
    ["nama" => "Oppo A76", "harga" => 2199999, "gambar" => "oppoa76.jpg"],
    ["nama" => "Oppo A78", "harga" => 2799999, "gambar" => "oppoa78.png"],
    ["nama" => "Oppo A96", "harga" => 3549000, "gambar" => "oppoa96.jpg"],
    ["nama" => "Oppo Reno 6", "harga" => 4199000, "gambar" => "opporeno6.jpg"],
    ["nama" => "Oppo Reno 11", "harga" => 4999000, "gambar" => "opporeno11.png"],
];

$realmes = [
    ["nama" => "Realme C21", "harga" => 1099999, "gambar" => "realmec21.png"],
    ["nama" => "Realme C35", "harga" => 1249999, "gambar" => "realmec35.jpg"],
    ["nama" => "Realme C53", "harga" => 1649000, "gambar" => "realmec53.jpg"],
    ["nama" => "Realme C63", "harga" => 2100000, "gambar" => "realmec63.jpg"],
    ["nama" => "Realme Note 50", "harga" => 2750000, "gambar" => "realmenote50.jpg"],
    ["nama" => "Realme 11 Pro", "harga" => 2650000, "gambar" => "realme11pro.jpeg"],
];

$samsungs = [
    ["nama" => "Samsung A16", "harga" => 2799999, "gambar" => "samsunga16.jpg"],
    ["nama" => "Samsung A25", "harga" => 3450000, "gambar" => "samsunga25.jpg"],
    ["nama" => "Samsung A35", "harga" => 4399999, "gambar" => "samsunga35.jpg"],
    ["nama" => "Samsung A13", "harga" => 2149000, "gambar" => "samsunga13.jpg"],
    ["nama" => "Samsung S21", "harga" => 5799990, "gambar" => "samsungs21.jpg"],
    ["nama" => "Samsung Note 20 Ultra", "harga" => 16299000, "gambar" => "samsungnote20ultra.jpg"],
];

$vivos = [
    ["nama" => "Vivo V19", "harga" => 1479999, "gambar" => "vivov19.jpg"],
    ["nama" => "Vivo Y23", "harga" => 1899999, "gambar" => "vivoy23.jpg"],
    ["nama" => "Vivo Y27", "harga" => 2199999, "gambar" => "vivoy27.jpeg"],
    ["nama" => "Vivo V40", "harga" => 3249000, "gambar" => "vivov40.jpg"],
    ["nama" => "Vivo Y85", "harga" => 6499999, "gambar" => "vivoy85.jpg"],
    ["nama" => "Vivo Z Series", "harga" => 1299999, "gambar" => "vivozseries.jpg"],
];

$iphones = [
    ["nama" => "Iphone 11", "harga" => 54999000, "gambar" => "iphone11.jpg"],
    ["nama" => "Iphone 13", "harga" => 84999000, "gambar" => "iphone13.jpg"],
    ["nama" => "Iphone 14 Pro", "harga" => 134999000, "gambar" => "iphone14pro.jpg"],
    ["nama" => "Iphone 15", "harga" => 10599000, "gambar" => "iphone15.jpg"],
    ["nama" => "Iphone 16", "harga" => 14499000, "gambar" => "iphone16.jpg"],
    ["nama" => "Iphone 16 Pro", "harga" => 18999000, "gambar" => "iphone16pro.jpg"],
];

// Gabungkan semua produk
$semua_hp = array_merge($xiaomis, $oppos, $realmes, $samsungs, $vivos, $iphones);

// Ambil parameter GET dan bersihkan
$brand = strtolower(trim($_GET['brand'] ?? ''));
$min_harga = filter_input(INPUT_GET, 'min_harga', FILTER_VALIDATE_INT, ['options' => ['default' => 0]]);
$max_harga = filter_input(INPUT_GET, 'max_harga', FILTER_VALIDATE_INT, ['options' => ['default' => PHP_INT_MAX]]);

$sort = $_GET['sort'] ?? '';

// Filter produk
$filtered_hp = array_filter($semua_hp, function ($hp) use ($brand, $min_harga, $max_harga) {
    $matchBrand = !$brand || stripos($hp['nama'], $brand) !== false;
    $matchHarga = $hp['harga'] >= $min_harga && $hp['harga'] <= $max_harga;
    return $matchBrand && $matchHarga;
});
// Urutkan hasil jika ada pilihan sort
if ($sort === 'asc') {
    usort($filtered_hp, fn($a, $b) => $a['harga'] <=> $b['harga']);
} elseif ($sort === 'desc') {
    usort($filtered_hp, fn($a, $b) => $b['harga'] <=> $a['harga']);
}
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

<div class="container my-4">
    <h2 class="text-center">Gadget Finder</h2>
    <form method="GET" class="row g-3 align-items-center bg-dark p-3 rounded">
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
        <?php if (empty($filtered_hp)): ?>
            <p class="text-center">Tidak ada produk yang sesuai dengan filter.</p>
        <?php else: ?>
            <?php foreach ($filtered_hp as $hp): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= $hp['gambar'] ?>" class="card-img-top" alt="<?= $hp['nama'] ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $hp['nama'] ?></h5>
                            <p class="card-text">Rp <?= number_format($hp['harga'], 0, ',', '.') ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
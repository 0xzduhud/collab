<?php
$xiaomis = [
    [
        "nama" => "Xiaomi Redmi Note 12",
        "harga" => 1399999,
        "gambar" => "xiaominote12.jpeg"
    ],
    [
        "nama" => "Xiaomi Redmi 13",
        "harga" => 1750000,
        "gambar" => "xiaomi13.png"
    ],
    [
        "nama" => "Xiaomi Redmi Note 13 Pro",
        "harga" => 2099999,
        "gambar" => "xiaominote13pro.png"
        
    ],
    [
        "nama" => "Xiaomi 14",
        "harga" => 3299000,
        "gambar" => "xiaomi14.jpg"
    ],
    [
        "nama" => "Xiaomi 14 Pro",
        "harga" => 3899000,
        "gambar" => "xiaomi14pro.png"
    ],
    [
        "nama" => "Xiaomi 15",
        "harga" => 4799900,
        "gambar" => "xiaomi15.png"
    ],
];

$oppos = [
    [
        "nama" => "Oppo A3",
        "harga" => 1349999,
        "gambar" => "oppoa3.png"
    ],
    [
        "nama" => "Oppo A76",
        "harga" => 2199999,
        "gambar" => "oppoa76.jpg"
    ],
    [
        "nama" => "Oppo A78",
        "harga" => 2799999,
        "gambar" => "oppoa78.png"
        
    ],
    [
        "nama" => "Oppo A96",
        "harga" => 3549000,
        "gambar" => "oppoa96.jpg"
    ],
    [
        "nama" => "Oppo Reno 6",
        "harga" => 4199000,
        "gambar" => "opporeno6.jpg"
    ],
    [
        "nama" => "Oppo Reno 11",
        "harga" => 4999000,
        "gambar" => "opporeno11.png"
    ],
];

$realmes = [
    [
        "nama" => "Realme C21",
        "harga" => 1099999,
        "gambar" => "realmec21.png"
    ],
    [
        "nama" => "Realme C35",
        "harga" => 1249999,
        "gambar" => "realmec35.jpg"
    ],
    [
        "nama" => "Realme C53",
        "harga" => 1649000,
        "gambar" => "realmec53.jpg"
        
    ],
    [
        "nama" => "Realme C63",
        "harga" => 2100000,
        "gambar" => "realmec63.jpg"
    ],
    [
        "nama" => "Realme Note 50",
        "harga" => 2750000,
        "gambar" => "realmenote50.jpg"
    ],
    [
        "nama" => "Realme 11 Pro",
        "harga" => 2650000,
        "gambar" => "realme11pro.jpeg"
    ],
];

$samsungs = [
    [
        "nama" => "Samsung A16",
        "harga" => 2799999,
        "gambar" => "samsunga16.jpg"
    ],
    [
        "nama" => "Samsung A25",
        "harga" => 3450000,
        "gambar" => "samsunga25.jpg"
    ],
    [
        "nama" => "Samsung A35",
        "harga" => 4399999,
        "gambar" => "samsunga35.jpg"
        
    ],
    [
        "nama" => "Samsung A13",
        "harga" => 2149000,
        "gambar" => "samsunga13.jpg"
    ],
    [
        "nama" => "Samsung S21",
        "harga" => 5799990,
        "gambar" => "samsungs21.jpg"
    ],
    [
        "nama" => "Samsung Note 20 Ultra",
        "harga" => 16299000,
        "gambar" => "samsungnote20ultra.jpg"
    ],
];

$vivos = [
    [
        "nama" => "Vivo V19",
        "harga" => 1479999,
        "gambar" => "vivov19.jpg"
    ],
    [
        "nama" => "Vivo Y23",
        "harga" => 1899999,
        "gambar" => "vivoy23.jpg"
    ],
    [
        "nama" => "Vivo Y27",
        "harga" => 2199999,
        "gambar" => "vivoy27.jpeg"
        
    ],
    [
        "nama" => "Vivo V40",
        "harga" => 3249000,
        "gambar" => "vivov40.jpg"
    ],
    [
        "nama" => "Vivo Y85",
        "harga" => 6499999,
        "gambar" => "vivoy85.jpg"
    ],
    [
        "nama" => "Vivo Z Series",
        "harga" => 1299999,
        "gambar" => "vivozseries.jpg"
    ],
];

$iphones = [
    [
        "nama" => "Iphone 11",
        "harga" => 54999000,
        "gambar" => "iphone11.jpg"
    ],
    [
        "nama" => "Iphone 13",
        "harga" => 84999000,
        "gambar" => "iphone13.jpg"
    ],
    [
        "nama" => "Iphone 14 Pro",
        "harga" => 134999000,
        "gambar" => "iphone14pro.jpg"
        
    ],
    [
        "nama" => "Iphone 15",
        "harga" => 10599000,
        "gambar" => "iphone15.jpg"
    ],
    [
        "nama" => "Iphone 16",
        "harga" => 14499000,
        "gambar" => "iphone16.jpg"
    ],
    [
        "nama" => "Iphone 16 Pro",
        "harga" => 18999000,
        "gambar" => "iphone16pro.jpg"
    ],
];
// Gabungkan semua data
$semua_hp = array_merge($xiaomis, $oppos, $realmes, $samsungs, $vivos, $iphones);

// Ambil parameter dari form
$brand = $_GET['brand'] ?? '';
$max_harga = $_GET['max_harga'] ?? '';

// Filter berdasarkan brand dan harga
$filtered_hp = array_filter($semua_hp, function($hp) use ($brand, $max_harga) {
    $matchBrand = true;
    $matchHarga = true;

    if ($brand) {
        $matchBrand = stripos($hp['nama'], $brand) !== false;
    }

    if ($max_harga) {
        $matchHarga = $hp['harga'] <= $max_harga;
    }

    return $matchBrand && $matchHarga;
});

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
.card-img-top {
  width: 100%;
  height: 200px; /* atau 250px sesuai selera */
  object-fit: contain;
  background-color: #fff; /* agar terlihat rapi di dalam card */
  padding: 10px; /* opsional, agar gambar tidak mentok */
}

</style>

<body background="background.png">

    <nav class="navbar navbar-expand-lg bg-light ">
        <div class="container-fluid">
          <a class="navbar-brand text-black" > <img src="gadget.jpg" alt="Navbar" height="30px">Gadget Finder</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-center align-items-center" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active text-black" aria-current="page" href="#layanan">Xiaomi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-black" href="#obat">Oppo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-black" href="#pemesanan">Realme</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-black" href="#pemesanan">Vivo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-black" href="#pemesanan">Samsung</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-black" href="#pemesanan">Iphone</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-black" href="#pemesanan">Flashsale</a>
              </li>
              <li class="nav-item">
                <div class="search-container d-flex align-items-center ms-3">
                  <input type="text" id="searchBox" placeholder="Search..." class="form-control form-control-sm me-1">
                  <span class="search-icon" onclick="toggleSearch()">🔍</span>
                </div>
              </li>
              
            </ul>
          </div>
        </div>
    </nav>
    <br>
    <br>

<form method="GET">
    <label style="color: #fff;">Filter Merek:</label>
    <select name="brand">
        <option value="">Semua</option>
        <option value="xiaomi">Xiaomi</option>
        <option value="oppo">Oppo</option>
        <option value="realme">Realme</option>
        <option value="samsung">Samsung</option>
        <option value="vivo">Vivo</option>
        <option value="iphone">iPhone</option>
    </select>

    <label style="color: aliceblue;">Harga Maksimal:</label>
    <input type="number" name="max_harga" placeholder="Contoh: 5000000">

    <button type="submit">Filter</button>
</form>
<div style="display: flex; flex-wrap: wrap; gap: 20px;">
<?php foreach ($filtered_hp as $hp): ?>
    <div style="border: 1px solid #ccc; padding: 10px; width: 200px;">
        <img src="<?= $hp['gambar'] ?>" style="width:200px;height:200px;object-fit:contain;">

        <strong><?= $hp['nama'] ?></strong><br>
        Rp <?= number_format($hp['harga'], 0, ',', '.') ?>
    </div>
<?php endforeach; ?>
</div>


<br>

    <section id="xiaomi">
    <h2 style="margin-left: 100px; color: aliceblue;">XIAOMI</h2>
    <div class="container bg-danger py-4"	>
      <div class="row justify-content-center">
        <?php foreach($xiaomis as $xiaomi) { ?>
            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $xiaomi['gambar'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $xiaomi["nama"] ?></h5>
                        <p class="card-text text-center">Rp <?= number_format($xiaomi["harga"], 0, ',', '.') ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
      </div>
    </div>
    <br>

    </section>
    <br>


    <section id="oppo">
    <h2 style="margin-left: 100px; color: aliceblue;">OPPO</h2>
    <div class="container bg-danger py-4"	>
      <div class="row justify-content-center">
        <?php foreach($oppos as $oppo) { ?>
            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $oppo['gambar'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $oppo["nama"] ?></h5>
                        <p class="card-text text-center">Rp <?= number_format($oppo["harga"], 0, ',', '.') ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
      </div>
    </div>
    <br>
    </section>
    <br>
    <br>


    <section id="vivo">
    <h2 style="margin-left: 100px; color: aliceblue;">VIVO</h2>
    <div class="container bg-danger py-4">
      <div class="row justify-content-center">
        <?php foreach($vivos as $vivo) { ?>
            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $vivo['gambar'] ?>" class="card-img-top" sizes="19" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $vivo["nama"] ?></h5>
                        <p class="card-text text-center">Rp <?= number_format($vivo["harga"], 0, ',', '.') ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
      </div>
    </div>
    <br>
    </section>
    <br>

    <section id="realme">
    <h2 style="margin-left: 100px; color: aliceblue;">REALME</h2>
    <div class="container bg-danger py-4">
      <div class="row justify-content-center">
        <?php foreach($realmes as $realme) { ?>
            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $realme['gambar'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $realme["nama"] ?></h5>
                        <p class="card-text text-center">Rp <?= number_format($realme["harga"], 0, ',', '.') ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
      </div>
    </div>
    <br>
    </section>
    <br>

    <section id="samsung">
    <h2 style="margin-left: 100px; color: aliceblue;">SAMSUNG</h2>
    <div class="container bg-danger py-4">
      <div class="row justify-content-center">
        <?php foreach($samsungs as $samsung) { ?>
            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $samsung['gambar'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $samsung["nama"] ?></h5>
                        <p class="card-text text-center">Rp <?= number_format($samsung["harga"], 0, ',', '.') ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
      </div>
    </div>
    <br>
    </section>
    <br>

    <section id="iphone">
    <h2 style="margin-left: 100px; color: aliceblue;">IPHONE</h2>
    <div class="container bg-danger py-4">
      <div class="row justify-content-center">
        <?php foreach($iphones as $iphone) { ?>
            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $iphone['gambar'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $iphone["nama"] ?></h5>
                        <p class="card-text text-center">Rp <?= number_format($iphone["harga"], 0, ',', '.') ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
      </div>
    </div>
    <br>
    </section>
</body>
</html>
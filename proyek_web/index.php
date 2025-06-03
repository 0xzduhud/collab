<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Beranda | Gadget Finder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background: linear-gradient(135deg, #1f2937, #111827);
      color: white;
      transition: filter 0.3s ease;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .hero {
      padding: 100px 20px;
      text-align: center;
      background: 
        linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.75));
        
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.4);
    }

    .hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
    }

    .hero p {
      font-size: 1.4rem;
      margin: 20px 0 30px;
    }
    .cta-button {
      font-size: 1.25rem;
      padding: 12px 36px;
      border-radius: 50px;
      transition: 0.3s ease;
    }
    .cta-button:hover {
      background-color: #084298;
      color: #fff;
    }
    /* buat overlay */
    .overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      backdrop-filter: blur(10px);
      background-color: rgba(0, 0, 0, 0.55);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      visibility: hidden;
      opacity: 0;
      transition: all 0.3s ease;
    }
    .overlay.active {
      visibility: visible;
      opacity: 1;
    }

    .custom-modal {
      background: #222;
      padding: 30px 35px;
      border-radius: 16px;
      text-align: center;
      box-shadow: 0 10px 30px rgba(0,0,0,0.6);
      max-width: 400px;
      width: 90%;
      color: white;
      z-index: 10000;
    }
    .custom-modal h2 {
      margin-bottom: 25px;
      font-weight: 600;
      letter-spacing: 0.02em;
    }
    .custom-modal .btn {
      margin: 12px 10px;
      padding: 12px 28px;
      font-size: 1.1rem;
      border-radius: 50px;
      transition: opacity 0.3s ease;
    }
    .custom-modal .btn:hover {
      opacity: 0.85;
    }
    .btn-login-normal, .btn-login-dev {
      background-color: #0d6efd;
      border: none;
      color: white;
    }

    /* style buat keunggulan fitur */
    .feature-icon {
      width: 60px;
      height: 60px;
      object-fit: contain;
      margin-bottom: 15px;
      filter: drop-shadow(0 1px 2px rgba(0,0,0,0.4));
    }

    .col-md-4 {
      transition: transform 0.3s ease;
    }
    .col-md-4:hover {
      transform: translateY(-10px);
    }

    .bg-dark.p-4.rounded {
      background-color: #1e293b !important;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }

    /* style buat produk unggulan */
    .produk-unggulan {
      padding: 40px 0;
      border-radius: 12px;
      color: white;
      margin-bottom: 50px;
    }

    .produk-unggulan h2 {
      font-weight: 700;
      margin-bottom: 30px;
      text-align: center;
    }

    .produk-list {
      display: flex;
      justify-content: center;
      gap: 30px;
      flex-wrap: wrap;
    }

    .produk-list .card {
      width: 220px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.25);
      transition: transform 0.3s ease;
    }

    .produk-list .card:hover {
      transform: translateY(-8px);
    }

    .produk-list .card-img-top {
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      height: 220px;
      object-fit: contain;
      background-color: white;
    }

    .produk-list .card-body {
      text-align: center;
    }

    /* bagian testimoni */
    .card.bg-dark.text-white.h-100 {
      background-color: #1e293b !important;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.4);
      transition: transform 0.3s ease;
    }
    .card.bg-dark.text-white.h-100:hover {
      transform: translateY(-8px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.55);
    }
    .card-img-top {
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }

    /* footer */
    footer.bg-dark.text-white.text-center.py-4.mt-5 {
      background: linear-gradient(135deg,rgb(0, 3, 10),rgb(0, 3, 10));
      font-size: 0.9rem;
      letter-spacing: 0.02em;
    }

  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Gadget Finder</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto fw-semibold">
        <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#keunggulan">Keunggulan</a></li>
        <li class="nav-item"><a class="nav-link" href="#testimoni">Testimoni</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- HERO SECTION -->
<div class="container my-5 hero">
  <div class="text-center text-white">
    <h1>Bingung Mau Beli HP Apa?</h1>
    <p>Cari HP terbaik sesuai kebutuhan dan budget kamu di sini!</p>
    <button class="btn btn-warning cta-button" onclick="showOverlay()">Mulai Cari HP</button>
  </div>
</div>

<!-- FITUR TAMBAHAN -->
<div class="container my-5">
  <h2 class="text-center mb-4" id="keunggulan">Keunggulan Gadget Finder?</h2>
  <div class="row text-center">
    <div class="col-md-4 mb-4">
      <div class="bg-dark p-4 rounded">
        <img src="assets/cepat.png" alt="Cepat" class="feature-icon">
        <h5>Cepat dan Mudah</h5>
        <p>Cari dan temukan HP idamanmu hanya dalam beberapa klik. </p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="bg-dark p-4 rounded">
        <img src="assets/data.jpg" alt="Lengkap" class="feature-icon">
        <h5>Data Lengkap</h5>
        <p>Berbagai merek dan harga tersedia dari yang termurah hingga premium.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="bg-dark p-4 rounded">
        <img src="assets/trust.jpg" alt="Terpercaya" class="feature-icon">
        <h5>Terpercaya</h5>
        <p>Website informatif yang bisa kamu andalkan sebelum membeli HP.</p>
      </div>
    </div>
  </div>
</div>

<!-- PRODUK UNGGULAN -->
<section class="produk-unggulan">
  <div class="container">
    <h2>Produk Unggulan</h2>
    <div class="produk-list">
      <?php
        $query = "SELECT * FROM produk_hp LIMIT 4";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="card">
          <img src="assets/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama']) ?>" class="card-img-top" />
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['nama']) ?></h5>
            <p class="card-text"><?= htmlspecialchars($row['merk']) ?> Rp<?= number_format($row['harga'], 0, ',', '.') ?></p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- SECTION TESTIMONI -->
<div class="container my-5">
  <h2 class="text-center mb-4" id="testimoni">Apa Kata Mereka?</h2>
  <div class="row g-4 justify-content-center">

    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark text-white h-100">
        <img src="assets/zduhud.jpg" class="card-img-top" alt="Foto User 1" style="object-fit: cover; height: 200px;">
        <div class="card-body d-flex flex-column justify-content-between">
          <div>
            <h5 class="card-title mb-0">Zduhud gokgok</h5>
          </div>
          <p class="card-text mt-2">"Situs ini membantu banget buat cari HP yang sesuai budget dan kebutuhan saya."</p>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark text-white h-100">
        <img src="assets/kanza.jpg" class="card-img-top" alt="Foto User 2" style="object-fit: cover; height: 200px;">
        <div class="card-body d-flex flex-column justify-content-between">
          <div>
            <h5 class="card-title mb-0">Kanza icikiwir</h5>
          </div>
          <p class="card-text mt-2">"Informasinya lengkap dan tampilannya mudah digunakan. Saya jadi bisa bandingin HP dengan cepat."</p>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark text-white h-100">
        <img src="assets/maul.jpg" class="card-img-top" alt="Foto User 3" style="object-fit: cover; height: 200px;">
        <div class="card-body d-flex flex-column justify-content-between">
          <div>
            <h5 class="card-title mb-0">Maulana kalcer</h5>
          </div>
          <p class="card-text mt-2">"Sangat terbantu! Sekarang bisa lihat HP baru dan spesifikasinya tanpa harus keliling toko."</p>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- LOGIN OVERLAY -->
<div class="overlay" id="loginOverlay">
  <div class="custom-modal">
    <h2>Login terlebih dahulu</h2>
    <a href="login_user.php" class="btn btn-login-normal">Login Akun User</a>
    <a href="login_admin.php" class="btn btn-login-dev">Login Akun Dev</a>
  </div>
</div>

<script>
  function showOverlay() {
    document.getElementById('loginOverlay').classList.add('active');
  }

  window.onclick = function(event) {
    const overlay = document.getElementById('loginOverlay');
    if (event.target === overlay) {
      overlay.classList.remove('active');
    }
  }
</script>

<footer class="bg-dark text-white text-center py-4 mt-5">
  <p>&copy; <?= date('Y') ?> Gadget Finder. All rights reserved.</p>
</footer>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Beranda | Gadget Finder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #343a40;
      color: white;
      transition: filter 0.3s ease;
    }

    .hero {
      padding: 100px 20px;
      text-align: center;
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)), url('bg-hp.jpg') center/cover no-repeat;
      border-radius: 10px;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .hero p {
      font-size: 1.3rem;
      margin: 20px 0;
    }

    .cta-button {
      font-size: 1.2rem;
      padding: 10px 30px;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      backdrop-filter: blur(10px);
      background-color: rgba(0, 0, 0, 0.5);
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
      padding: 30px;
      border-radius: 16px;
      text-align: center;
      box-shadow: 0 10px 30px rgba(0,0,0,0.4);
      max-width: 400px;
      width: 90%;
      color: white;
      z-index: 10000;
    }

    .custom-modal h2 {
      margin-bottom: 20px;
    }

    .custom-modal .btn {
      margin: 10px;
      padding: 10px 20px;
      font-size: 1.1rem;
    }

    .btn-login-normal {
      background-color: #0d6efd;
      border: none;
      border-radius: 50px;
      color: white;
    }

    .btn-login-dev {
      background-color: #0d6efd;
      border: none;
      border-radius: 50px;
      color: white;
    }

    .custom-modal .btn:hover {
      opacity: 0.9;
    }

.hero {
  background-image: url('assets/background1.jpg'); /* Ini path dari index.php ke gambar */
  background-size: cover;
  background-position: center;
  border-radius: 15px;
  padding: 100px 20px;
  color: white;
}
.feature-icon {
  width: 60px;
  height: 60px;
  object-fit: contain;
  margin-bottom: 15px;
}

.col-md-4 {
    transition: 0.3s;
}

.col-md-4:hover {
    transform: translateY(-10px);
}


  </style>
</head>
<body background="assets/background.png">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">Gadget Finder</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
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
        <p>Temukan HP idamanmu hanya dalam beberapa klik.</p>
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

<!-- SECTION TESTIMONI (DIBAWAH FITUR) -->
<div class="container my-5">
  <h2 class="text-center mb-4" id="testimoni">Apa Kata Mereka?</h2>
  <div class="row g-4 justify-content-center">

    <!-- Testimoni 1 -->
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark text-white h-100">
        <img src="assets/zduhud.jpg" class="card-img-top" alt="Foto User 1" style="object-fit: cover; height: 200px;">
        <div class="card-body d-flex flex-column justify-content-between">
          <div>
            <h5 class="card-title mb-0">Zduhud Anjay</h5>
          </div>
          <p class="card-text mt-2">"Situs ini membantu banget buat cari HP yang sesuai budget dan kebutuhan saya."</p>
        </div>
      </div>
    </div>

    <!-- Testimoni 2 -->
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark text-white h-100">
        <img src="assets/kanza.jpg" class="card-img-top" alt="Foto User 2" style="object-fit: cover; height: 200px;">
        <div class="card-body d-flex flex-column justify-content-between">
          <div>
            <h5 class="card-title mb-0">Kanza</h5>
          </div>
          <p class="card-text mt-2">"Informasinya lengkap dan tampilannya mudah digunakan. Saya jadi bisa bandingin HP dengan cepat."</p>
        </div>
      </div>
    </div>

    <!-- Testimoni 3 -->
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card bg-dark text-white h-100">
        <img src="assets/maul.jpg" class="card-img-top" alt="Foto User 3" style="object-fit: cover; height: 200px;">
        <div class="card-body d-flex flex-column justify-content-between">
          <div>
            <h5 class="card-title mb-0">Maulana</h5>
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

  // Klik di luar modal untuk menutup
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

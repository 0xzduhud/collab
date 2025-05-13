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

  </style>
</head>
<body>

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
  <h2 class="text-center mb-4">Kenapa Memilih Gadget Finder?</h2>
  <div class="row text-center">
    <div class="col-md-4 mb-4">
      <div class="bg-dark p-4 rounded">
        <img src="icon1.png" alt="Cepat" width="50" class="mb-3">
        <h5>Cepat dan Mudah</h5>
        <p>Temukan HP idamanmu hanya dalam beberapa klik.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="bg-dark p-4 rounded">
        <img src="icon2.png" alt="Lengkap" width="50" class="mb-3">
        <h5>Data Lengkap</h5>
        <p>Berbagai merek dan harga tersedia dari yang termurah hingga premium.</p>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="bg-dark p-4 rounded">
        <img src="icon3.png" alt="Terpercaya" width="50" class="mb-3">
        <h5>Terpercaya</h5>
        <p>Website informatif yang bisa kamu andalkan sebelum membeli HP.</p>
      </div>
    </div>
  </div>
</div>

<!-- LOGIN OVERLAY -->
<div class="overlay" id="loginOverlay">
  <div class="custom-modal">
    <h2>Login terlebih dahulu</h2>
    <a href="login_user.php" class="btn btn-login-normal">Login Akun Normal</a>
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

</body>
</html>

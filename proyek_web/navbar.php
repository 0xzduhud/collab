<?php
$keyword = strtolower(trim($_GET['keyword'] ?? ''));
?>
<style>
  .navbar {
            background-color: #111;
            border-bottom: 1px solid #222;
             font-family: 'Inter', sans-serif;
        }
</style>

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
          <form class="d-flex" method="GET" action="dashboard_user.php">
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

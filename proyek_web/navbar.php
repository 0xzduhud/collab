<?php
$keyword = strtolower(trim($_GET['keyword'] ?? ''));
?>

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
          <form class="d-flex" method="GET" action="dashboard_user.php">
            <input class="form-control me-2" type="search" placeholder="Cari HP..." name="keyword" value="<?= htmlspecialchars($keyword) ?>">
            <button class="btn btn-outline-warning" type="submit">Search</button>
          </form>
        </li>
        <li class="nav-item">
            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

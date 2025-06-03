<?php
$keyword = strtolower(trim($_GET['keyword'] ?? ''));

function isAdmin() {
    return isset($_SESSION['login']) && $_SESSION['login'] === true && isset($_SESSION['admin']);
}
?>

<style>
  .navbar {
    background-color: #111;
    border-bottom: 1px solid #222;
    font-family: 'Inter', sans-serif;
  }
  .navbar .form-control {
  background-color: #1a1a1a !important;  
  border: 1px solid #333 !important;
  color: #fff !important;                
}

.navbar .form-control::placeholder {
  color: #fff !important;                
  opacity: 1;                          }

.navbar-brand {
  font-family: 'Poppins', sans-serif !important;
  font-weight: 600;
  font-size: 1.5rem; 
  color: #ffc107 !important; 
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
      <ul class="navbar-nav mb-2 mb-lg-0 gap-2 align-items-center">
        <li class="nav-item">
          <form class="d-flex" method="GET" action="dashboard_user.php">
            <input class="form-control me-2" type="search" placeholder="Cari HP..." name="keyword" value="<?= htmlspecialchars($keyword) ?>">
            <button class="btn btn-warning" type="submit">Cari</button>
          </form>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="btn btn-outline-light">Logout</a>
        </li>
        <li class="nav-item">
          <?php if (isAdmin()): ?>
            <a href="dashboard_admin.php" class="nav-link btn btn-outline-warning text-warning px-3">Admin</a>
          <?php else: ?>
            <span class="nav-link btn btn-outline-secondary text-muted px-3" title="Anda bukan admin" style="cursor: default;">Admin</span>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>
</nav>


<?php

session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login_admin.php");
    exit();
}
require 'koneksi.php';

// Ambil data dari tabel
$result = mysqli_query($conn, "SELECT * FROM produk_hp");

// Tambahkan data baru
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar']; // Nama file gambar saja
    $merk = $_POST['merk'];
    $chipset = $_POST['chipset'];
    $ram_rom = $_POST['ram_rom'];
    $kapasitasbatre = $_POST['kapasitasbatre'];
    $os = $_POST['os'];
    $ukuran_refresh = $_POST['ukuran_refresh'];
    mysqli_query($conn, "INSERT INTO produk_hp (nama, harga, gambar, merk, chipset, ram_rom, kapasitasbatre, os, ukuran_refreshrate) VALUES ('$nama', '$harga', '$gambar' , '$merk' , '$chipset', '$ram_rom' , '$kapasitasbatre' , '$os' , '$ukuran_refresh')");
    header("Location: dashboard_admin.php");
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM produk_hp WHERE id = $id");
    header("Location: dashboard_admin.php");
}

// Update data
if (isset($_POST['update'])) {
    $id = $_POST['handphone_id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $merk = $_POST['merk'];
    $chipset = $_POST['chipset'];
    $ram_rom = $_POST['ram_rom'];
    $kapasitasbatre = $_POST['kapasitasbatre'];
    $os = $_POST['os'];
    $ukuran_refresh = $_POST['ukuran_refresh'];
    mysqli_query($conn, "UPDATE produk_hp SET nama='$nama', harga='$harga', gambar='$gambar', merk='$merk' , chipset='$chipset' , ram_rom='$ram_rom' , kapasitasbatre='$kapasitasbatre' , os='$os' , ukuran_refreshrate='$ukuran_refresh' WHERE handphone_id=$id");
    header("Location: dashboard_admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <?php include 'navbar.php'; ?>

<div class="container my-4">
    <h2 class="mb-4">Dashboard Admin</h2>

    <!-- Form Tambah Produk -->
    <div class="card bg-secondary mb-4">
        <div class="card-header">Tambah Produk Baru</div>
        <div class="card-body">
            <form method="POST" class="row g-3">
                <div class="col-md-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama HP" required>
                </div>
                <div class="col-md-3">
                    <input type="number" name="harga" class="form-control" placeholder="Harga" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="gambar" class="form-control" placeholder="Nama file gambar (contoh: hp1.jpg)" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="merk" class="form-control" placeholder="Merk" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="chipset" class="form-control" placeholder="Chipset" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="ram_rom" class="form-control" placeholder="RAM/ROM" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="kapasitasbatre" class="form-control" placeholder="Kapasitas Batre" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="os" class="form-control" placeholder="OS" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="ukuran_refresh" class="form-control" placeholder="Ukuran/Refresh rate" required>
                </div>
                <div class="col-md-3">
                    <button type="submit" name="tambah" class="btn btn-success w-100">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Produk -->
    <div class="card bg-secondary">
        <div class="card-header">Daftar Produk</div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover text-center mb-0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Merk</th>
                            <th>Chipset</th>
                            <th>RAM/ROM</th>
                            <th>Kapasitas Batre</th>
                            <th>OS</th>
                            <th>Ukuran/Refresh Rate</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <form method="POST">
                                <input type="hidden" name="handphone_id" value="<?= $row['handphone_id'] ?>">
                                <td><input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>"></td>
                                <td><input type="number" name="harga" class="form-control" value="<?= $row['harga'] ?>"></td>
                                <td><input type="text" name="gambar" class="form-control" value="<?= $row['gambar'] ?>"></td>
                                <td><input type="text" name="merk" class="form-control" value="<?= $row['merk'] ?>"></td>
                                <td><input type="text" name="chipset" class="form-control" value="<?= $row['chipset'] ?>"></td>
                                <td><input type="text" name="ram_rom" class="form-control" value="<?= $row['ram_rom'] ?>"></td>
                                <td><input type="text" name="kapasitasbatre" class="form-control" value="<?= $row['kapasitasbatre'] ?>"></td>
                                <td><input type="text" name="os" class="form-control" value="<?= $row['os'] ?>"></td>
                                <td><input type="text" name="ukuran_refresh" class="form-control" value="<?= $row['ukuran_refreshrate'] ?>"></td>
                                <td>
                                    <button type="submit" name="update" class="btn btn-warning btn-sm mb-1">Update</button>
                                    <a href="?hapus=<?= $row['handphone_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                                </td>
                            </form>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
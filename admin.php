<?php
session_start();
include 'dashboard_stats.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Simpan ke variabel untuk penggunaan di HTML
$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | Admin Bintang Furniture</title>
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="icon" href="file_foto/my_logo_transparant.png">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="#"><?= $username ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-success elevation-4">
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Bintang Furniture Admin</span>
    </a>
    <div class="sidebar">
      <nav>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
          <li class="nav-item">
            <a href="admin" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a>
          </li>
          <li class="nav-item">
            <a href="tampilan_product_admin.php" class="nav-link"><i class="nav-icon fas fa-box"></i><p>Product Data</p></a>
          </li>
          <li class="nav-item">
            <a href="pesanan_admin.php" class="nav-link"><i class="nav-icon fas fa-shopping-cart"></i><p>Order Data</p></a>
          </li>
          <li class="nav-item">
            <a href="pelanggan_admin.php" class="nav-link"><i class="nav-icon fas fa-users"></i><p>Customer Data</p></a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0">Dashboard</h1>
        <p>Selamat datang, <strong><?= $username ?></strong>!</p>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $totalProduk; ?></h3>
                <p>Total Product</p>
              </div>
              <div class="icon"><i class="fas fa-box"></i></div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $totalPesanan; ?></h3>
                <p>Total Order</p>
              </div>
              <div class="icon"><i class="fas fa-shopping-cart"></i></div>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $totalPelanggan; ?></h3>
                <p>Total Customer</p>
              </div>
              <div class="icon"><i class="fas fa-users"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="main-footer text-center">
    <strong>© 2025 Bintang Furniture</strong>
  </footer>
</div>

<!-- Scripts -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>

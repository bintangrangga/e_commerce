<?php
session_start();
include 'function.php';

// Simpan ke variabel untuk penggunaan di HTML
$username = htmlspecialchars($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Product | Admin Bintang Furniture</title>
  <!-- AdminLTE CSS -->
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
            <a href="admin.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="tampilan_product_admin.php" class="nav-link active">
              <i class="nav-icon fas fa-box"></i><p>Product Data</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pesanan_admin.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i><p>Order Data</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pelanggan_admin.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i><p>Customer Data</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <h1 class="m-0">Add New Products</h1>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Product Form</h3>
          </div>
          <!-- form start -->
          <form action="proses_tambah_produk.php" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label for="nama_produk">Product Name</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_product" placeholder="Example: study table" required>
              </div>
              <div class="form-group">
                <label for="harga">Price</label>
                <input type="number" class="form-control" id="harga" name="harga_product" placeholder="Example: 1500000" required>
              </div>
              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="kategori" name="category" required>
                  <option value="">-- Select Category --</option>
                  <option value="sofa">Sofa</option>
                  <option value="table">Table</option>
                  <option value="cupboard">Cupboard</option>
                </select>
              </div>
              <div class="form-group">
                <label for="deskripsi">Product Description</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Write a product description..." required></textarea>
              </div>
              <div class="form-group">
                <label for="image">Product Photos</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Product</button>
              <a href="tampilan_product_admin.php" class="btn btn-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="main-footer text-center">
    <strong>© 2025 Bintang Furniture</strong>
  </footer>

</div>

<!-- AdminLTE Scripts -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>

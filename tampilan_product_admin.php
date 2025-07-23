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
  <title>Product Data | Admin Bintang Furniture </title>
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
        <h1 class="m-0">Product Data</h1>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">

        <!-- Tombol Tambah Produk -->
        <div class="mb-3">
          <a href="tambah_produk_admin.php" class="btn btn-success"><i class="fas fa-plus"></i>Add Product</a>
        </div>

        <!-- Tabel Produk -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Product List</h3>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Number</th>
                  <th>Image Product</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM product ORDER BY id_product DESC");
                    while ($data = mysqli_fetch_assoc($query)) :
                ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td>
                    <img src="file_foto/<?= $data['image']; ?>" alt="<?= $data['image']; ?>" width="70">
                  </td>
                  <td><?= htmlspecialchars($data['nama_product']); ?></td>
                  <td>Rp <?= number_format($data['harga_product'], 0, ',', '.'); ?></td>
                  <td><?= htmlspecialchars($data['category']); ?></td>
                  <td>
                    <a href="edit_produk_admin.php?id_product=<?= $data['id_product']; ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Edit</a>
                    <a href="hapus_product_admin.php?id_product=<?= $data['id_product']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus produk?')"><i class="fas fa-trash"></i>Delete</a>
                  </td>
                </tr>
                <?php endwhile; ?>
                <!-- Tambahkan baris produk lainnya sesuai kebutuhan -->
              </tbody>
            </table>
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

<!-- AdminLTE Scripts -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>

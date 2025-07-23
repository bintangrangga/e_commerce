<?php
session_start();
require 'function.php';

if (isset($_POST['id_product']) && isset($_POST['aksi'])) {
  $id_product = intval($_POST['id_product']);
  $aksi = $_POST['aksi'];

  // Ambil jumlah produk saat ini dari database
  $ambil = $conn->query("SELECT * FROM orders WHERE id_product = $id_product LIMIT 1");

  if ($ambil && $ambil->num_rows > 0) {
    $data = $ambil->fetch_assoc();
    $jumlah = intval($data['jumlah']);

      // Update jumlah sesuai aksi
      if ($aksi == 'tambah') {
        $jumlah++;
      } else if ($aksi == 'kurang') {
        $jumlah = max(1, $jumlah - 1); // Minimal jumlah adalah 1
      }

      // Simpan ke database
      $update = $conn->query("UPDATE orders SET jumlah = $jumlah WHERE id_product = $id_product");
      if (!$update) {
      echo "Gagal update: " . $conn->error;
      exit;
      }

    // Sinkronkan session
    $_SESSION['orders'][$id_product] = $jumlah;
  }
}

header("Location: cart.php");
exit;
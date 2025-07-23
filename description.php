<?php
require 'function.php';

// mendapatkan id_produk dari url
$id_product = $_GET["id_product"];

// Query ambil data 
$ambil = $conn->query("SELECT * FROM product WHERE id_product='$id_product'");
$detail = $ambil->fetch_assoc();

// Simpan referer untuk tombol back
$back_url = $_SERVER['HTTP_REFERER'] ?? 'dashboard.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Product Detail | Bintang Furniture</title>
  <link rel="stylesheet" href="css/description.css" />
  <link rel="icon" href="file_foto/my_logo_transparant.png">
</head>
<body>
  <section class="product-detail">
    <div class="image-container">
      <img src="file_foto/<?= $detail["image"]; ?>" alt="Sofa Japandi" />
    </div>
    <div class="desc-container">
      <h3>PRODUCT DETAIL</h3>
      <p> <?= $detail["deskripsi"]; ?> </p>
      <!-- Tombol kembali -->
      <a href="<?= $back_url; ?>" class="back-btn">Back</a>
    </div>
  </section>
</body>
</html>
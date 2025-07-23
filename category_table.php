<?php
require 'function.php';

$product = query ("SELECT * FROM product WHERE category = 'table'");

if (isset($_POST["cari_kategori_table"])) {
  $product = cari_kategori_table($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Table category | Bintang Furniture</title>
  <link rel="icon" href="file_foto/my_logo_transparant.png">
  <link rel="stylesheet" href="css/category_table.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
  <header class="navbar">
  <div class="navbar-left">
    <img src="file_foto/my_logo.png" alt="Bintang Furniture Logo" class="logo-img" />
    <nav>
      <a href="dashboard.php">dashboard</a>
      <a href="#category_table.php" class="active">category</a>
      <a href="about_us.php">about us</a>
    </nav>
  </div>
  <div class="navbar-right">
    <form action="" method = "POST">
      <div class="search-box">
        <input type="text" name = "keyword" placeholder="Search..." />
        <button class="search-btn" name = "cari_kategori_table">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </form>
    <button class="cart-btn" ><a href="cart.php" style="text-decoration: none;">🛒</a></button>
   <button class="logout-btn"><a href="logout.php">logout</a></button>
  </div>
</header>

  <!-- Product Section -->
  <section class="product-section green">
    <h1>BINTANG FURNITURE</h1>
    <h2>product</h2>
    <div class="product-grid">
      <?php foreach ($product as $row): ?>
      <div class="product-card">
        <a href="description.php?id_product=<?= $row["id_product"]; ?>"><img src="file_foto/<?php echo $row ["image"]?>" alt="Table 1" /></a>
        <p><?php echo $row ["nama_product"]?></p>
        <p>Rp. <?php echo number_format($row ["harga_product"], 0, ',', '.');?></p>
        <div class="btn-group">
          <button class="button-cart">
           <a href="keranjang.php?id_product=<?= $row["id_product"]; ?>">add to cart</a>
          </button>
        </div>
      </div>
      <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Welcome Section -->
  <section class="welcome">
    <img src="file_foto/category_room.avif" alt="Welcome Image" />
    <p>
      Welcome to Our Store! Make Every Corner of Your Home the Most Comfortable Place for You and Your Family
    </p>
  </section>

  <!-- Product Section (repeat) -->
  <section class="product-section green">
    <h2>product</h2>
    <div class="product-grid">
     <?php foreach ($product as $row): ?>
      <div class="product-card">
        <a href="description.php?id_product=<?= $row["id_product"]; ?>"><img src="file_foto/<?php echo $row ["image"]?>" alt="Table 1" /></a>
        <p><?php echo $row ["nama_product"]?></p>
        <p>Rp.<?php echo number_format($row ["harga_product"], 0, ',', '.');?></p>
        <div class="btn-group">
          <button class="button-cart"><a href="keranjang.php?id_product=<?= $row["id_product"]; ?>">add to cart</a></button>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

 <!-- Footer -->
<footer class="footer">
  <div class="footer-container">
    <div class="footer-column">
      <h3>bintang furniture</h3>
      <p>
        This website helps you to get furniture items that suit your needs.
        Be the first to get information on discounts and attractive offers from Bintang Furniture
      </p>
    </div>
    <div class="footer-column" style="margin-left: 150px;">
      <h3>website features</h3>
      <ul>
        <li><a href="about_us.php">about us</a></li>
        <li><a href="dashboard.php">dashboard</a></li>
        <li><a href="dashboard.php">category</a></li>
      </ul>
      <div class="social-icons">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-tiktok"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
      </div>
    </div>
    <div class="footer-column">
      <h3>contact us</h3>
      <p><strong>phone:</strong><br> 0857-4611-3335 <br> monday–sunday | 10.00 am – 10.00 pm</p>
      <p><strong>email:</strong><br> bintangfurnitures@gmail.com <br> monday–sunday | 10.00 am – 10.00 pm</p>
    </div>
  </div>
</footer>

</body>
</html>
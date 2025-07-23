<?php
session_start();
require 'function.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

$id_user = $_SESSION['id_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Bintang Furniture</title>
  <link rel="icon" href="file_foto/my_logo_transparant.png">
  <link rel="stylesheet" href="cart.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<header class="navbar">
  <div class="navbar-left">
    <img src="file_foto/my_logo.png" alt="Bintang Furniture Logo" class="logo-img" />
    <nav>
      <a href="dashboard.php">dashboard</a>
      <a href="dashboard.php">category</a>
      <a href="about_us.php">about us</a>
    </nav>
  </div>
  <div class="navbar-right">
    <div class="search-box">
      <input type="text" placeholder="Search..." />
      <button class="search-btn">
        <i class="fas fa-search"></i>
      </button>
    </div>
    <button class="cart-btn"><a href="cart.php" style="text-decoration: none;">🛒</a></button>
    <button class="logout-btn"><a href="logout.php">logout</a></button>
  </div>
</header>

<section class="cart-section">
  <div class="cart-container">
    <h1 class="cart-heading">BINTANG FURNITURE</h1>
    <div class="cart-title">
      <h2>Your shopping cart</h2>
      <p>click, collect, and own</p>
      <p style="margin-left: 700px; margin-top: -37px">Amount</p>
      <p style="margin-left: 900px; margin-top: -35px">Subtotal</p>
    </div>
  </div>

  <?php 
    $total = 0;
    $data_orders = $conn->query("SELECT * FROM orders WHERE id_user = '$id_user'");

    if ($data_orders->num_rows === 0) {
        echo "<p style='text-align: center; margin-top: 40px;'>Keranjang kamu masih kosong 🛒</p>";
    }

    while ($order = $data_orders->fetch_assoc()):
        $id_product = $order['id_product'];
        $jumlah = $order['jumlah'];

        $ambil = $conn->query("SELECT * FROM product WHERE id_product = $id_product");
        $pecah = $ambil->fetch_assoc();

        $subharga = $pecah['harga_product'] * intval($jumlah);
        $total += $subharga;
  ?>
  <div class="cart-item">
    <div class="product-card" style="margin-left: 130px;"> 
      <img src="file_foto/<?= htmlspecialchars($pecah['image']); ?>" alt="Produk" class="product-image" style="height: 100px;">
      <div class="product-info">
        <p class="product-title" style="width: 300px;"><?= htmlspecialchars($pecah['nama_product']); ?></p>
        <p class="product-price">Rp. <?= number_format($pecah['harga_product'], 0, ',', '.'); ?></p>
      </div>
    </div>

    <div class="quantity" style="margin-left: 800px; margin-top: 65px; position: absolute;">
      <button class="qty-btn" onclick="submitJumlah('kurang', <?= $id_product ?>)">−</button>
      <span class="qty-value"><?= $jumlah ?></span>
      <button class="qty-btn" onclick="submitJumlah('tambah', <?= $id_product ?>)">+</button>
      <form id="form-jumlah-<?= $id_product ?>" action="update_jumlah.php" method="POST" style="display: none;">
        <input type="hidden" name="id_product" id="id_product_<?= $id_product ?>">
        <input type="hidden" name="aksi" id="aksi_<?= $id_product ?>">
      </form>
    </div>

    <div class="total-price" style="margin-left: 1020px; margin-top: 73px">
      Rp. <?= number_format($subharga, 0, ',', '.'); ?>
    </div>

    <div class="checkout-area" style="margin-left: 985px; position: absolute; margin-top: 150px">
      <form method="POST" action="" style="margin: 0;">
        <input type="hidden" name="id_product" value="<?= $id_product; ?>">
        <a href="hapus_cart.php?id_product=<?= $id_product;?>" class="delete-btn" style="text-decoration:none; color: white;">🗑</a>
      </form>
      <button class="checkout-btn"><a href="payment.php?id_product=<?= $id_product; ?>" style="text-decoration: none; color: #355d49;">Checkout</a></button>
    </div>
  </div>
  <?php endwhile; ?>

  <?php if ($data_orders->num_rows > 0): ?>
    <div class="cart-summary" style="margin-left: 985px; margin-top: 35px; font-weight:bold;">
      Total: Rp. <?= number_format($total, 0, ',', '.'); ?>
    </div>
  <?php endif; ?>

</section>

<script>
  function submitJumlah(aksi, id_product) {
    document.getElementById('id_product_' + id_product).value = id_product;
    document.getElementById('aksi_' + id_product).value = aksi;
    document.getElementById('form-jumlah-' + id_product).submit();
  }
</script>

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
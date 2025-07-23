<?php
session_start();
include 'function.php';

$showPopup = false; // Kontrol untuk popup

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_payment'])) {
    $full_name = htmlspecialchars($_POST['full_name']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $address = htmlspecialchars($_POST['address']);
    $detail_address = htmlspecialchars($_POST['detail_address']);

    if (isset($_GET['id_product'])) {
        $id_product = intval($_GET['id_product']);
        $order = $conn->query("SELECT jumlah FROM orders WHERE id_product = $id_product LIMIT 1");

        if ($order && $order->num_rows > 0) {
            $dataOrder = $order->fetch_assoc();
            $jumlah = intval($dataOrder['jumlah']);

            $produk = $conn->query("SELECT harga_product FROM product WHERE id_product = $id_product LIMIT 1");
            if ($produk && $produk->num_rows > 0) {
                $dataProduk = $produk->fetch_assoc();
                $harga_product = intval($dataProduk['harga_product']);
                $subharga = $harga_product;
                $totalbelanja = $harga_product * $jumlah;

                $stmt = $conn->prepare("INSERT INTO transaksi (full_name, phone_number, address, detail_address, id_product, jumlah, subharga, totalbelanja) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssiiii", $full_name, $phone_number, $address, $detail_address, $id_product, $jumlah, $subharga, $totalbelanja);
                $stmt->execute();
                $stmt->close();

                // Hapus pesanan dari tabel orders setelah checkout
                $conn->query("DELETE FROM orders WHERE id_product = $id_product AND id_user = ".$_SESSION['id_user']);

                $showPopup = true; // Tampilkan popup
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment | Bintang Furniture</title>
  <link rel="stylesheet" href="css/payment.css"/>
  <link rel="icon" href="file_foto/my_logo_transparant.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>

<style>
.popup-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.7);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
}

.popup-box {
  background: white;
  padding: 30px;
  border-radius: 10px;
  text-align: center;
  max-width: 400px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.popup-box h2 {
  margin-bottom: 10px;
  color: #355d49;
}

.popup-box p {
  margin-bottom: 20px;
  color: #355d49;
}

.close-btn {
  display: inline-block;
  background-color: #355d49;
  color: white;
  padding: 10px 20px;
  border-radius: 8px;
  text-decoration: none;
}
</style>

<body>
  <header class="navbar">
  <div class="navbar-left">
    <img src="file_foto/my_logo.png" alt="Bintang Furniture Logo" class="logo-img"/>
    <nav>
      <a href="dashboard.php">dashboard</a>
      <a href="dashboard.php">category</a>
      <a href="about_us.php">about us</a>
    </nav>
  </div>
  <div class="navbar-right">
    <div class="search-box">
      <input type="text" placeholder="Search..."/>
      <button class="search-btn">
        <i class="fas fa-search"></i>
      </button>
    </div>
    <button class="cart-btn" ><a href="cart.php" style="text-decoration: none;">🛒</a></button>
    <button class="logout-btn"><a href="logout.php">logout</a></button>
  </div>
</header>

<!-- Checkout Form -->
<section class="checkout-form">
  <h2>BINTANG FURNITURE</h2>
  <p class="section-title">Your destination address</p>
  
  <form method = "POST">
    <div class="form-row">
      <input type="text" placeholder="Full name" name="full_name" required/>
      <input type="text" placeholder="Phone number" name="phone_number" required/>
    </div>
    <input type="text" placeholder="Province, City, District, Postal code" name="address" required />
    <input type="text" placeholder="Street name, Building, House number" name="detail_address" required/>
    <!-- Tombol submit -->
    <button type="submit" name="submit_payment" class="submit-btn">Place Holder</button>
    <!-- Popup -->
    <?php if ($showPopup): ?>
      <div id="popup-success" class="popup-overlay" style="display: flex;">
        <div class="popup-box">
          <h2>Pembayaran Berhasil</h2>
          <p>Terima kasih telah berbelanja di Bintang Furniture!</p>
          <a href="dashboard.php" class="close-btn">Kembali ke Dashboard</a>
        </div>
      </div>
    <?php endif; ?>
  </form>
</section>

<!-- Summary -->
<?php
$totalbelanja = 0;

// Cek apakah user ingin melihat ringkasan 1 produk berdasarkan GET id_product (yang sudah di-checkout)
if (isset($_GET['id_product'])) {
  $id_product = intval($_GET['id_product']);

  // Ambil data dari tabel orders (bukan session)
  $order = $conn->query("SELECT jumlah FROM orders WHERE id_product = $id_product LIMIT 1");

  if ($order && $order->num_rows > 0) {
    $dataOrder = $order->fetch_assoc();
    $jumlah = $dataOrder['jumlah'];

    // Ambil harga satuan dari tabel product
    $produk = $conn->query("SELECT * FROM product WHERE id_product = $id_product");
    if ($produk && $produk->num_rows > 0) {
      $pecah = $produk->fetch_assoc();
      $subharga = $pecah['harga_product'] * $jumlah;
      $totalbelanja = $subharga;
?>
<section class="summary">
  <h3>Summary</h3>
  <div class="summary-details">
    <p>Subtotal of furniture items <span>Rp. <?= number_format($pecah['harga_product']) ?></span></p>
    <p>Number of products <span><?= $jumlah; ?></span></p>
    <p>Shipping Subtotal <span>Rp. <?= number_format($subharga); ?></span></p>
  </div>
  <div class="total">
    <p>Total payment:</p>
    <h2>Rp.<?= number_format($totalbelanja); ?></h2>
  </div>
</section>
<?php
    }
  } else {
    echo "<p style='text-align:center;'>Produk tidak ditemukan dalam data pesanan.</p>";
  }
}
?>

<!-- Transfer Info -->
<section class="bank-info">
  <p>just transfer, here is the account number:</p>
  <h3>0549753195</h3>
  <p>a/n bintang rangga</p>
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
<script>
  function showPopup() {
    document.getElementById("popup-success").style.display = "flex";
  }
</script>
</body>
</html>
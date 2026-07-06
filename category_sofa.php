<?php
require 'function.php';

$product = query("SELECT * FROM product WHERE category = 'sofa'");

if (isset($_POST["cari_kategori_sofa"])) {
  $product = cari_kategori_sofa($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sofa Category | Bintang Furniture</title>

  <link rel="icon" href="file_foto/my_logo_transparant.png">
  <link rel="stylesheet" href="css/category_sofa.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<style>
  /* Dropdown container */
  .dropdown {
    position: relative;
    display: inline-block;
  }

  /* Dropdown button */
  .dropbtn {
    background: none;
    border: none;
    color: black;
    font-size: 16px;
    cursor: pointer;
    padding: 8px 15px;
    margin-left: -25px;
    text-transform: capitalize;
  }

  .dropbtn i {
    margin-left: 5px;
  }

  /* Dropdown menu */
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #1b1b1b;
    min-width: 150px;
    border-radius: 5px;
    overflow: hidden;
    z-index: 99;
  }

  .dropdown-content a {
    display: block;
    padding: 10px 15px;
    color: white;
    text-decoration: none;
    text-transform: capitalize;
  }

  .dropdown-content a:hover {
    background-color: #333;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropdown:hover .dropbtn {
    color: #000;
  }

  .button-detail{
    background:#EFB95F;
    color:#000;
    text-decoration:none;
    padding:2px 8px;
    border-radius:10px;
    font-size:14px;
    font-weight:bold;
    transition:.3s;
  }

  /* Responsive */
  @media (max-width:768px) {

    .navbar {
      flex-direction: column;
      align-items: flex-start;
    }

    .navbar-left,
    .navbar-right {
      width: 100%;
      justify-content: space-between;
      margin: .5rem 0;
    }

    nav {
      flex-wrap: wrap;
    }

  }
</style>

<body>

  <header class="navbar">

    <div class="navbar-left">

      <img src="file_foto/my_logo.png"
        alt="Bintang Furniture Logo"
        class="logo-img">

      <nav>

        <a href="dashboard.php">dashboard</a>

        <div class="dropdown">

          <button class="dropbtn">
            category
            <i class="fa-solid fa-caret-down"></i>
          </button>

          <div class="dropdown-content">
            <a href="category_sofa.php">sofa</a>
            <a href="category_table.php">table</a>
            <a href="category_cupboard.php">cupboard</a>
          </div>

        </div>

        <a href="about_us.php">about us</a>

      </nav>

    </div>

    <div class="navbar-right">

      <form action="" method="POST">

        <div class="search-box">

          <input
            type="text"
            name="keyword"
            placeholder="Search...">

          <button
            class="search-btn"
            name="cari_kategori_sofa">

            <i class="fas fa-search"></i>

          </button>

        </div>

      </form>

      <button class="cart-btn">
        <a href="cart.php" style="text-decoration:none;">🛒</a>
      </button>

      <button class="logout-btn">
        <a href="logout.php">logout</a>
      </button>

    </div>

  </header>


  <!-- ================= Product Section ================= -->

  <section class="product-section green">

    <h1>BINTANG FURNITURE</h1>
    <h2>product</h2>

    <div class="product-grid">

      <?php foreach ($product as $row): ?>

        <div class="product-card">

          <a href="description.php?id_product=<?= $row['id_product']; ?>">
            <img src="file_foto/<?= $row['image']; ?>" alt="Product">
          </a>

          <p><?= $row["nama_product"]; ?></p>

          <p>
            Rp.
            <?= number_format($row["harga_product"], 0, ',', '.'); ?>
          </p>

          <div class="btn-group">

            <a class="button-detail"
              href="description.php?id_product=<?= $row['id_product']; ?>">
              Detail Product
            </a>

            <form action="keranjang.php" method="get">
              <input type="hidden" name="id_product"
                value="<?= $row['id_product']; ?>">

              <button class="button-cart" type="submit">
                Add to Cart
              </button>
            </form>

          </div>

        </div>

      <?php endforeach; ?>

    </div>

  </section>


  <!-- ================= Welcome ================= -->

  <section class="welcome">

    <img src="file_foto/category_room.avif" alt="Welcome Image">

    <p>
      Welcome to Our Store! Make Every Corner of Your Home
      the Most Comfortable Place for You and Your Family
    </p>

  </section>


  <!-- ================= Product Section ================= -->

  <section class="product-section green">

    <h2>product</h2>

    <div class="product-grid">

      <?php foreach ($product as $row): ?>

        <div class="product-card">

          <a href="description.php?id_product=<?= $row['id_product']; ?>">
            <img src="file_foto/<?= $row['image']; ?>" alt="Product">
          </a>

          <p><?= $row["nama_product"]; ?></p>

          <p>
            Rp.
            <?= number_format($row["harga_product"], 0, ',', '.'); ?>
          </p>

          <div class="btn-group">

            <a class="button-detail"
              href="description.php?id_product=<?= $row['id_product']; ?>">
              Detail Product
            </a>

            <form action="keranjang.php" method="get">
              <input type="hidden" name="id_product"
                value="<?= $row['id_product']; ?>">

              <button class="button-cart" type="submit">
                Add to Cart
              </button>
            </form>

          </div>

        </div>

      <?php endforeach; ?>

    </div>

  </section>


  <!-- ================= Footer ================= -->

  <footer class="footer">

    <div class="footer-container">

      <div class="footer-column">

        <h3>bintang furniture</h3>

        <p>
          This website helps you to get furniture items
          that suit your needs.
          Be the first to get information on discounts
          and attractive offers from Bintang Furniture.
        </p>

      </div>

      <div class="footer-column" style="margin-left:150px;">

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

        <p>
          <strong>Phone:</strong><br>
          0857-4611-3335<br>
          Monday–Sunday | 10.00 AM – 10.00 PM
        </p>

        <p>
          <strong>Email:</strong><br>
          bintangfurnitures@gmail.com<br>
          Monday–Sunday | 10.00 AM – 10.00 PM
        </p>

      </div>

    </div>

  </footer>

</body>

</html>
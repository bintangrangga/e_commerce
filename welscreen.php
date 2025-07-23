<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Bintang Furniture</title>
  <link rel="icon" href="file_foto/my_logo_transparant.png">
  <link rel="stylesheet" href="css/dashboard.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
  <header class="navbar">
  <div class="navbar-left">
    <img src="file_foto/my_logo.png" alt="Bintang Furniture Logo" class="logo-img" />
    <nav>
      <a href="login.php" class="active">dashboard</a>
      <a href="login.php">category</a>
      <a href="login.php">about us</a>
    </nav>
  </div>
  <div class="navbar-right">
    <div class="search-box">
      <input type="text" placeholder="Search..." />
      <button class="search-btn">
        <i class="fas fa-search"></i>
      </button>
    </div>
    <button class="cart-btn" ><a href="login.php" style="text-decoration: none;">🛒</a></button>
    <button class="logout-btn"><a href="login.php">login</a></button>
  </div>
</header>

  <section class="hero">
    <div class="hero-content">
      <h1>BINTANG FURNITURE</h1>
      <button><a href="login.php" class="shopnow">shop now</a></button>
    </div>
  </section>

  <section class="categories" id="category">
    <h2>furniture categorys</h2>
    <div class="category-grid">
      <div class="category-item">
        <img src="file_foto/sofa_category.jpg" alt="Sofa" />
        <a href="login.php">sofa</a>
      </div>
      <div class="category-item">
        <img src="file_foto/table_category.jpg" alt="Table" />
        <a href="login.php">table</a>
      </div>
      <div class="category-item">
        <img src="file_foto/cupboard_category.jpg" alt="Cupboard" />
        <a href="login.php">cupboard</a>
      </div>
    </div>
  </section>

  <section class="product-highlight">
  <div class="product-image">
    <img src="file_foto/view_product.jpg" alt="view_product"/>
  </div>
  <div class="product-text">
    <p>
      a safe, comfortable and<br>
      inexpensive piece of furniture
    </p>
    <a href="login.php" class="view-button">view all product</a>
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
        <li><a href="login.php">about us</a></li>
        <li><a href="login.php">dashboard</a></li>
        <li><a href="login.php">category</a></li>
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

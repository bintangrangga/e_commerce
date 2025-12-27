<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us | Bintang Furniture</title>
  <link rel="icon" href="file_foto/my_logo_transparant.png">
  <link rel="stylesheet" href="css/about_us.css" />
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

/* Dropdown box */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #1b1b1b;
  min-width: 150px;
  border-radius: 5px;
  overflow: hidden;
  z-index: 99;
}

/* Dropdown item */
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

/* Show dropdown on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change text color of main dropdown when hovered */
.dropdown:hover .dropbtn {
  color: #000000; /* bebas kamu ganti */
}

/* Responsive tweaks */
@media (max-width: 768px) {
  .navbar {
    flex-direction: column;
    align-items: flex-start;
  }

  .navbar-left,
  .navbar-right {
    width: 100%;
    justify-content: space-between;
    margin: 0.5rem 0;
  }

  nav {
    flex-wrap: wrap;
  }
}
</style>
<body>
  <header class="navbar">
  <div class="navbar-left">
    <img src="file_foto/my_logo.png" alt="Bintang Furniture Logo" class="logo-img" />
    <nav>
      <a href="dashboard.php">dashboard</a>
      <div class="dropdown">
            <button class="dropbtn">category <i class="fa-solid fa-caret-down"></i></button>
            <div class="dropdown-content">
              <a href="category_sofa.php">sofa</a>
              <a href="category_table.php">table</a>
              <a href="category_cupboard.php">cupboard</a>
            </div>
      </div>
      <a href="#about_us.php" class="active">about us</a>
    </nav>
  </div>
  <div class="navbar-right">
    <div class="search-box">
      <input type="text" placeholder="Search..." />
      <button class="search-btn">
        <i class="fas fa-search"></i>
      </button>
    </div>
    <button class="cart-btn" ><a href="cart.php" style="text-decoration: none;">🛒</a></button>
    <button class="logout-btn"><a href="logout.php">logout</a></button>
  </div>
</header>

 <!-- About Section -->
  <section class="about">
    <h1>BINTANG FURNITURE</h1>
    <h3>furniture for the modern world</h3>
    <p>
      Bintang furniture is a website that provides furniture purchasing services that are
      specifically developed to meet everyone's furniture needs. Offering all modern, cool,
      and comfortable furniture. In order to develop this product, we work with professional
      craftsmen. The name bintang furniture is taken from the owner himself, namely bintang rangga.
    </p>
    <img src="file_foto/about_us.jpg" alt="plants" class="plants-image" />
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
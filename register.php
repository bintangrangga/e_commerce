<?php
include ("function.php");
if (isset($_POST["register"])) {
  if (register($_POST) >0) {
    echo "<script> 
              alert('registration successful');
          </script>";
      header("location:login.php");
  } else {
    echo mysqli_error($conn); 
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration | Bintang Furniture</title>
  <link rel="icon" href="file_foto/my_logo_transparant.png">
  <link rel="stylesheet" href="css/registrasi.css" />
</head>
<body>
  <section class="register-container">
    <div class="logo-side">
      <img src="file_foto/my_logo.png" alt="Bintang Furniture Logo" />
    </div>
    <div class="form-side">
      <form class="register-form" method="POST">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required placeholder="enter your email"/>
        <small>*Must filled</small>

        <label for="username">Username</label>
        <input type="text" id="username" name="username" required placeholder="enter your username"/>
        <small>*Must filled</small>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="enter your password" />
        <small>*Must filled</small>

        <div class="form-footer">
          <button type="submit" name="register">Sign Up</button>
        </div>
      </form>
    </div>
  </section>
</body>
</html>
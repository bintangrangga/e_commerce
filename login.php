<?php
session_start();
require 'function.php';

// Tampilkan error jika ada di session
$login_error = "";
if (isset($_SESSION['error'])) {
    $login_error = $_SESSION['error'];
    unset($_SESSION['error']);
}

// Proses login jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = htmlspecialchars(trim($_POST["username"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                // SET SEMUA SESSION YANG DIPERLUKAN
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];

                // Arahkan sesuai role
                if ($row['role'] === 'admin') {
                    header("Location: admin.php");
                    exit;
                } elseif ($row['role'] === 'user') {
                    header("Location: dashboard.php");
                    exit;
                } else {
                    $_SESSION['error'] = "Role tidak dikenali.";
                    header("Location: login.php");
                    exit;
                }
            } else {
                $_SESSION['error'] = "Password salah!";
                header("Location: login.php");
                exit;
            }
        } else {
            $_SESSION['error'] = "Username tidak ditemukan!";
            header("Location: login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Harap isi semua field.";
        header("Location: login.php");
        exit;
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Bintang Furniture</title>
    <link rel="icon" href="file_foto/my_logo_transparant.png">
  <link rel="stylesheet" href="css/login.css" />
</head>
<body>
    <?php if (!empty($login_error)) : ?>
      <script>alert("<?= htmlspecialchars($login_error) ?>");</script>
    <?php endif; ?>
    <section class="login-container">
    <div class="logo-side">
      <img src="file_foto/my_logo.png" alt="Bintang Furniture Logo" />
    </div>
    <div class="form-side">
      <form class="login-form" method="POST" action="login.php">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required placeholder="enter your username"/>
        <small>*Must filled</small>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="enter your password" />
        <small>*Must filled</small>

        <p class="register-link">don't have an account yet? 
          <a class="register-button" href="register.php">register</a>
        </p>

        <div class="form-footer">
          <button type="submit" name="login">Login</button>
        </div>
      </form>
    </div>
  </section>
</body>
</html>
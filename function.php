<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "ecommerce_furniture"; 

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
    }
    return $rows;
}
    
function register($data) {
    global $conn;

    $email = mysqli_real_escape_string($conn, trim($data['email']));
    $username = mysqli_real_escape_string($conn, trim($data['username']));
    $password = mysqli_real_escape_string($conn, trim($data['password']));

    // // Cegah username mengandung kata "admin" (tanpa case sensitive)
    if (preg_match('/admin/i', $username)) {
        echo "<script>alert('Registrasi ditolak! Username tidak boleh mengandung kata \"admin\".');</script>";
        return false;
    }

    // Cek apakah username sudah ada
    $cek = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Username sudah terdaftar!');</script>";
        return false;
    }

    // Buat hash password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan default role 'user'
    $query = "INSERT INTO user (email, username, password, role) VALUES ('$email', '$username', '$password_hash', 'user')";

    if (mysqli_query($conn, $query)) {
        header("Location: login.php");
        exit;
    } else {
        echo "<script>alert('Registrasi gagal!');</script>";
        return false;
    }
}

function loginUser($conn, $username, $password) {
    // Mulai session jika belum aktif
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Siapkan statement untuk ambil data user
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah username ditemukan
    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verifikasi password yang diinput dengan hash dari database
        if (password_verify($password, $row['password'])) {
            // Simpan data user ke session
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // Arahkan user ke halaman sesuai role
            if ($row['role'] === 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: dashboard.php");
            }
            exit;
        } else {
            // Password salah
            $_SESSION['error'] = "Password salah!";
            header("Location: login.php");
            exit;
        }
    } else {
        // Username tidak ditemukan
        $_SESSION['error'] = "Username tidak ditemukan!";
        header("Location: login.php");
        exit;
    }

    $stmt->close();
}

function cari_kategori_sofa($keyword) {
    $keyword = htmlspecialchars($keyword);
    
    $query = "SELECT * FROM product 
              WHERE category = 'sofa' AND 
              (nama_product LIKE '%$keyword%' 
              OR harga_product LIKE '%$keyword%')";

    return query($query); 
}

function cari_kategori_table($keyword) {
    $keyword = htmlspecialchars($keyword);
    
    $query = "SELECT * FROM product 
              WHERE category = 'table' AND 
              (nama_product LIKE '%$keyword%' 
              OR harga_product LIKE '%$keyword%')";

    return query($query); 
}

function cari_kategori_cupboard($keyword) {
    $keyword = htmlspecialchars($keyword);
    
    $query = "SELECT * FROM product 
              WHERE category = 'cupboard' AND 
              (nama_product LIKE '%$keyword%' 
              OR harga_product LIKE '%$keyword%')";

    return query($query); 
}
?>
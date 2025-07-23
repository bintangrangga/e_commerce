<?php
include 'function.php'; // koneksi ke database

// Ambil data dari form
$id_product    = $_POST['id_product'];
$nama_product  = mysqli_real_escape_string($conn, $_POST['nama_product']);
$harga_product = mysqli_real_escape_string($conn, $_POST['harga_product']);
$category      = mysqli_real_escape_string($conn, $_POST['category']);
$deskripsi     = mysqli_real_escape_string($conn, $_POST['deskripsi']);

// Ambil data produk lama
$queryLama = mysqli_query($conn, "SELECT * FROM product WHERE id_product='$id_product'");
$dataLama = mysqli_fetch_assoc($queryLama);
$fotoLama = $dataLama['image'];

// Cek apakah user upload foto baru
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
  $namaFile = $_FILES['foto']['name'];
  $tmpFile = $_FILES['foto']['tmp_name'];

  $ekstensi = pathinfo($namaFile, PATHINFO_EXTENSION);
  $namaBaru = uniqid() . '.' . $ekstensi;
  $pathUpload = "file_foto/" . $namaBaru;

  // Hapus foto lama kalau ada
  if ($fotoLama && file_exists("file_foto/" . $fotoLama)) {
    unlink("file_foto/" . $fotoLama);
  }

  // Upload foto baru
  move_uploaded_file($tmpFile, $pathUpload);

  // Update dengan foto baru
  $query = "UPDATE product SET 
              nama_product='$nama_product',
              harga_product='$harga_product',
              category='$category',
              deskripsi='$deskripsi',
              image='$namaBaru'
            WHERE id_product='$id_product'";
} else {
  // Update tanpa mengubah foto
  $query = "UPDATE product SET 
              nama_product='$nama_product',
              harga_product='$harga_product',
              category='$category',
              deskripsi='$deskripsi'
            WHERE id_product='$id_product'";
}

// Eksekusi query
if (mysqli_query($conn, $query)) {
  echo "<script>
    alert('Produk berhasil diperbarui!');
    window.location.href = 'tampilan_product_admin.php';
  </script>";
} else {
  echo "Gagal update produk: " . mysqli_error($conn);
}
?>

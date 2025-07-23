<?php
include 'function.php'; // Koneksi ke database

if (isset($_GET['id_product'])) {
  $id_product = $_GET['id_product'];

  // Ambil data produk dulu (untuk hapus foto)
  $query = mysqli_query($conn, "SELECT * FROM product WHERE id_product='$id_product'");
  $data = mysqli_fetch_assoc($query);

  if ($data) {
    $foto = $data['file_foto'];

    // Hapus dari database
    $hapus = mysqli_query($conn, "DELETE FROM product WHERE id_product='$id_product'");

    if ($hapus) {
      // Hapus file foto jika ada
      if ($foto && file_exists("file_foto/" . $foto)) {
        unlink("file_foto/" . $foto);
      }

      echo "<script>
        alert('Produk berhasil dihapus!');
        window.location.href = 'tampilan_product_admin.php';
      </script>";
    } else {
      echo "<script>
        alert('Gagal menghapus produk!');
        window.history.back();
      </script>";
    }

  } else {
    echo "<script>
      alert('Produk tidak ditemukan!');
      window.history.back();
    </script>";
  }
} else {
  echo "<script>
    alert('ID produk tidak dikirim!');
    window.history.back();
  </script>";
}
?>

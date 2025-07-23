<?php
include 'function.php';

// cek jika tombol submit ditekan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ambil data dari form
    $nama = htmlspecialchars($_POST['nama_product']);
    $harga = intval($_POST['harga_product']);
    $kategori = htmlspecialchars($_POST['category']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    // cek jika file gambar diupload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $namaFile = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];
        $ext = pathinfo($namaFile, PATHINFO_EXTENSION);
        $namaBaru = uniqid('produk_') . '.' . $ext; // contoh: produk_654abc1d2.jpg
        $folderTujuan = 'file_foto/' . $namaBaru;

        // pindahkan file ke folder tujuan
        if (move_uploaded_file($tmpName, $folderTujuan)) {
            // masukkan data ke database
            $query = "INSERT INTO product (nama_product, harga_product, category, deskripsi, image)
                      VALUES ('$nama', '$harga', '$kategori', '$deskripsi', '$namaBaru')";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Produk berhasil ditambahkan!'); window.location='tampilan_product_admin.php';</script>";
            } else {
                echo "<script>alert('Gagal menambahkan produk: " . mysqli_error($conn) . "'); history.back();</script>";
            }
        } else {
            echo "<script>alert('Gagal mengupload gambar.'); history.back();</script>";
        }
    } else {
        echo "<script>alert('Gambar produk wajib diunggah.'); history.back();</script>";
    }
} else {
    echo "<script>alert('Akses tidak sah.'); window.location='tampilan_product_admin.php';</script>";
}
?>

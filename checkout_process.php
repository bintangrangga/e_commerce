<?php
session_start();
require 'function.php'; // pastikan $conn sudah tersedia

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_product = intval($_POST['id_product']);
    $jumlah = intval($_POST['jumlah']);
    $total_price = intval($_POST['total_price']);

    $query = "INSERT INTO product (id_product, jumlah, total_price)
              VALUES ('$id_product', '$jumlah', '$total_price')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Checkout berhasil disimpan!'); window.location='payment.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan checkout: " . mysqli_error($conn) . "');</script>";
    }
}
?>
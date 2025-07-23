<?php
session_start();
require 'function.php';

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

$id_user = $_SESSION['id_user'];
$id_product = $_GET['id_product'] ?? null;

if ($id_product) {
    // Hapus dari database
    $conn->query("DELETE FROM orders WHERE id_user = '$id_user' AND id_product = '$id_product'");
    
    echo "<script>alert('Produk dihapus dari keranjang');</script>";
    echo "<script>location='cart.php';</script>";
} else {
    echo "<script>alert('ID produk tidak ditemukan');</script>";
    echo "<script>location='cart.php';</script>";
}
?>
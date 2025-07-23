<?php
include 'function.php'; // koneksi ke database

// Hitung jumlah produk
$queryProduk = mysqli_query($conn, "SELECT COUNT(*) AS total_produk FROM product");
$dataProduk = mysqli_fetch_assoc($queryProduk);
$totalProduk = $dataProduk['total_produk'];

// Hitung jumlah pesanan
$queryPesanan = mysqli_query($conn, "SELECT COUNT(*) AS total_pesanan FROM transaksi");
$dataPesanan = mysqli_fetch_assoc($queryPesanan);
$totalPesanan = $dataPesanan['total_pesanan'];

// Hitung jumlah pelanggan
$queryPelanggan = mysqli_query($conn, "SELECT COUNT(*) AS total_pelanggan FROM user");
$dataPelanggan = mysqli_fetch_assoc($queryPelanggan);
$totalPelanggan = $dataPelanggan['total_pelanggan'];
?>

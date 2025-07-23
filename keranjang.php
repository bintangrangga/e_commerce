<?php
session_start();
require 'function.php'; // koneksi harus ada

if (isset($_GET['id_product']) && is_numeric($_GET['id_product'])) {
    $id_product = intval($_GET['id_product']);
    $id_user = $_SESSION['id_user'] ?? null;

    if (!$id_user) {
        // Jika user belum login, alihkan
        header("Location: login.php");
        exit();
    }

    // Simpan ke session
    if (!isset($_SESSION['product'])) {
        $_SESSION['product'] = [];
    }

    if (isset($_SESSION['product'][$id_product])) {
        $_SESSION['product'][$id_product]++;
    } else {
        $_SESSION['product'][$id_product] = 1;
    }

    $jumlah = $_SESSION['product'][$id_product];
    $tanggal_order = date("Y-m-d H:i:s");

    // Cek apakah produk ini sudah ada dalam orders user ini
    $cek = $conn->query("SELECT * FROM orders WHERE id_product = '$id_product' AND id_user = '$id_user'");
    if ($cek->num_rows > 0) {
        $conn->query("UPDATE orders SET jumlah = '$jumlah', tanggal_order = '$tanggal_order' WHERE id_product = '$id_product' AND id_user = '$id_user'");
    } else {
        $conn->query("INSERT INTO orders (id_user, id_product, jumlah, tanggal_order) VALUES ('$id_user', '$id_product', '$jumlah', '$tanggal_order')");
    }

    header("Location: cart.php");
    exit();
} else {
    header("Location: dashboard.php");
    exit();
}
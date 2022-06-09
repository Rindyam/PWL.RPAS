<?php

require_once('../function/helper.php');
require_once('../function/koneksi.php');

$nm_brg = $_POST['nm_brg'];
$merk = $_POST['merk'];
$pemasok = $_POST['pemasok'];
$harga = $_POST['harga'];
$stock = $_POST['stock'];

// Pengecekan kelengkapan data
if (empty($nm_brg) || empty($merk) || empty($pemasok) || empty($harga) || empty($stock)) {
    header("location: " . BASE_URL . 'dashboard.php?page=create&process=failed');
} else {
    mysqli_query($koneksi, "INSERT INTO barang(nm_brg, merk, pemasok, harga, stock) VALUES ('$nm_brg', '$merk', '$pemasok', '$harga', '$stock')");
    header("location: " . BASE_URL . 'dashboard.php?page=home&process=success');
}
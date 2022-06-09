<?php

require_once('../function/helper.php');
require_once('../function/koneksi.php');

$nm_brg = $_POST['nm_brg'];
$merk = $_POST['merk'];
$pemasok = $_POST['pemasok'];
$harga = $_POST['harga'];
$stock = $_POST['stock'];
$id = $_POST['id'];

if (empty($nm_brg) || empty($merk) || empty($pemasok) || empty($harga) || empty($stock)) {
    header("location: " . BASE_URL . 'dashboard.php?page=create&process=failed');
} else {
    mysqli_query($koneksi, "UPDATE barang SET nm_brg='$nm_brg', merk = '$merk', pemasok='$pemasok', harga = '$harga', stock = '$stock' WHERE id='$id'");
    header("location: " . BASE_URL . 'dashboard.php?page=home&edits=success');
}
<?php
require_once('function/helper.php');
require_once('function/koneksi.php');

$edits =  isset($_GET['edits']) ? ($_GET['esits']) : false;
if ($_SESSION["id"] == null) {
    header("location: " . BASE_URL);
    exit();
}

$id =  isset($_GET['id']) ? ($_GET['id']) : false;
$error =  isset($_GET['emptyform']) ? ($_GET['emptyform']) : false;
$barang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM barang WHERE id=$id"));


?>


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <?php 
                if ($error == 'true') : ?>
                    <div class="alert alert-danger" role="alert">
                        Proses gagal, pastikan semua formulir terisi
                    </div>
                <?php endif; ?>
                <div class="row">
                    <h1 style="text-align: center; color: #185ADB;">Edit Barang</h1>
                </div>
                <form method="POST" action="<?= BASE_URL . 'process/process_edit.php' ?>">
                    <input name="id" value="<?= $barang['id'] ?>" type="hidden">
                    <div class="mb-3">
                        <label for="nm_brg" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nm_brg" name="nm_brg" value="<?= $barang['nm_brg'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="merk" class="form-label">Merk</label>
                        <input type="text" class="form-control" id="merk" name="merk" value="<?= $barang['merk']?>">
                    </div>
                    <div class="mb-3">
                        <label for="pemasok" class="form-label">Pemasok</label>
                        <input type="text" class="form-control" id="pemasok" name="pemasok" value="<?= $barang['pemasok']?>">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="harga" class="form-control" id="harga" name="harga" value="<?= $barang['harga']?>">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" value="<?= $barang['stock']?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
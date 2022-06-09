<?php

require_once('function/koneksi.php');

$process = isset($_GET['process']) ? ($_GET['process']) : false;
$status = isset($_GET['status']) ? ($_GET['status']) : false;
$edits =  isset($_GET['edits']) ? ($_GET['edits']) : false;
?>


<?php if ($process == 'success') : ?>
    <div class="alert alert-success" role="alert">
        Data behasil dimasukan
    </div>

<?php endif; ?>
<?php if ($edits == 'success') : ?>
    <div class="alert alert-success" role="alert">
        Data behasil diedit
    </div>

<?php endif; ?>
<?php if ($status == 'success') : ?>
    <div class="alert alert-success" role="alert">
        Data behasil dihapus
    </div>

<?php endif; ?>

<!-- mengambil data dari database -->
<?php

$barang = mysqli_query($koneksi, "SELECT * FROM barang");

?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table" style="width: 1260px">
                    <thead>
                        <tr style="background-color: #0099FF; ">
                            <th scope="col" style="width: 100px;">#</th>
                            <th scope="col" style="width: 200px;">Nama Barang</th>
                            <th scope="col" style="width: 120px;">Merk</th>
                            <th scope="col" style="width: 200px;">Pemasok</th>
                            <th scope="col" style="width: 160px;">Harga</th>
                            <th scope="col" style="width: 300px;">Stock</th>
                            <th scope="col" style="width: 180px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($barang as $p) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $p['nm_brg'] ?></td>
                                <td><?= $p['merk'] ?></td>
                                <td><?= $p['pemasok'] ?></td>
                                <td><?= $p['harga'] ?></td>
                                <td><?= $p['stock'] ?></td>
                                <td>
                                    <a class="btn btn-danger badge" href="<?= BASE_URL . 'process/process_delete.php?id=' . $p['id'] ?>">Delete</a>
                                    <a class="btn btn-info badge" href="<?= BASE_URL . 'dashboard.php?page=edit&id=' . $p['id'] ?>">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
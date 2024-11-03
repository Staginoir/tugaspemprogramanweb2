<?php
require_once '../../../config/database.php';
require_once '../../../app/models/pelanggan.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize model
$modelPelanggan = new Pelanggan($db);
$dataPelanggan = $modelPelanggan->getAllPelanggan();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../../../app/views/viewindex.php">Home</a>
                </li>
                <li class="nav-item "> 
                    <a class="nav-link " href="../barang/viewbarang.php">Barang</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="../pelanggan/viewpelanggan.php">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../transaksi/viewtransaksi.php">Transaksi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container mt-5">
        <h2 class="text-center">Daftar Pelanggan</h2>
        <a href="pelangganadd.php" class="btn btn-info mb-3">Tambah Pelanggan</a>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($dataPelanggan as $pelanggan) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pelanggan['id_plg']; ?></td>
                        <td><?= $pelanggan['nama_plg']; ?></td>
                        <td><?= $pelanggan['alamat']; ?></td>
                        <td>
                            <a href="pelangganedit.php?id_plg=<?= $pelanggan['id_plg']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="pelanggandelete.php?id_plg=<?= $pelanggan['id_plg']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

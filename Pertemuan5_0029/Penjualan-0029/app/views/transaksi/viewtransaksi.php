<?php
require_once '../../../config/database.php';
require_once '../../../app/models/transaksi.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize model
$modelTransaksi = new Transaksi($db);
$dataTransaksi = $modelTransaksi->getAllTransaksi();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
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
                <li class="nav-item ">
                    <a class="nav-link " href="../pelanggan/viewpelanggan.php">Pelanggan</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link actuve" href="../transaksi/viewtransaksi.php">Transaksi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container mt-5">
        <h2 class="text-center">Daftar Transaksi</h2>
        <a href="transaksiadd.php" class="btn btn-info mb-3">Tambah Transaksi</a>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>Kode Barang</th>
                    <th>ID Pelanggan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($dataTransaksi as $transaksi) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $transaksi['id']; ?></td>
                        <td><?= $transaksi['kode_brg']; ?></td>
                        <td><?= $transaksi['id_plg']; ?></td>
                        <td><?= $transaksi['jumlah']; ?></td>
                        <td><?= $transaksi['total_harga']; ?></td>
                        <td><?= $transaksi['tanggal']; ?></td>
                        <td>
                            <a href="transaksidetail.php?id=<?= $transaksi['id']; ?>" class="btn btn-primary btn-sm">Detail</a>
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

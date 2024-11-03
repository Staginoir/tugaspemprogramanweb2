<?php
require_once '../../../config/database.php';
require_once '../../../app/models/transaksi.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize model
$modelTransaksi = new Transaksi($db);

// Check if 'id' is provided in URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $transaksi = $modelTransaksi->getTransaksiById($id); // Fetch data for the given transaction ID
} else {
    echo "ID transaksi tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Detail Transaksi</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID Transaksi</th>
                <td><?= $transaksi['id']; ?></td>
            </tr>
            <tr>
                <th>Kode Barang</th>
                <td><?= $transaksi['kode_brg']; ?></td>
            </tr>
            <tr>
                <th>ID Pelanggan</th>
                <td><?= $transaksi['id_plg']; ?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td><?= $transaksi['jumlah']; ?></td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td><?= $transaksi['total_harga']; ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?= $transaksi['tanggal']; ?></td>
            </tr>
        </table>
        <a href="viewtransaksi.php" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>

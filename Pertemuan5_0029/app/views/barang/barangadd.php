<?php
require_once '../../../config/database.php';
require_once '../../../app/models/barang.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize model
$modelBarang = new Barang($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $kode_brg = $_POST['kode_brg'];
    $nama_brg = $_POST['nama_brg'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Add barang to the database
    $modelBarang->addBarang($kode_brg, $nama_brg, $harga, $stok);

    // Redirect back to viewbarang.php
    header("Location: viewbarang.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Tambah Barang</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="kode_brg">Kode Barang</label>
                <input type="text" class="form-control" id="kode_brg" name="kode_brg" required>
            </div>
            <div class="form-group">
                <label for="nama_brg">Nama Barang</label>
                <input type="text" class="form-control" id="nama_brg" name="nama_brg" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="viewbarang.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

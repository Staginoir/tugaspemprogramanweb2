<?php
require_once '../../../config/database.php';
require_once '../../../app/models/pelanggan.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize model
$modelPelanggan = new Pelanggan($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $id_plg = $_POST['id_plg'];
    $nama_plg = $_POST['nama_plg'];
    $alamat = $_POST['alamat'];

    // Add pelanggan to the database
    $modelPelanggan->addPelanggan($id_plg, $nama_plg, $alamat);

    // Redirect back to viewpelanggan.php
    header("Location: viewpelanggan.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Tambah Pelanggan</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="id_plg">ID Pelanggan</label>
                <input type="text" class="form-control" id="id_plg" name="id_plg" required>
            </div>
            <div class="form-group">
                <label for="nama_plg">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_plg" name="nama_plg" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="viewpelanggan.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>

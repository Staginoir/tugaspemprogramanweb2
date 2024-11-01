<?php
require_once '../../../config/database.php';
require_once '../../../app/models/pelanggan.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize model
$modelPelanggan = new Pelanggan($db);

// Check if 'id_plg' is provided in URL
if (isset($_GET['id_plg'])) {
    $id_plg = $_GET['id_plg'];
    $pelanggan = $modelPelanggan->getPelangganById($id_plg); // Fetch data for the given id_plg

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get form data
        $nama_plg = $_POST['nama_plg'];
        $alamat = $_POST['alamat'];

        // Update pelanggan data
        $modelPelanggan->updatePelanggan($id_plg, $nama_plg, $alamat);

        // Redirect back to viewpelanggan.php
        header("Location: viewpelanggan.php");
        exit();
    }
} else {
    echo "ID pelanggan tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Pelanggan</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="id_plg">ID Pelanggan</label>
                <input type="text" class="form-control" id="id_plg" name="id_plg" value="<?= $pelanggan['id_plg']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama_plg">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_plg" name="nama_plg" value="<?= $pelanggan['nama_plg']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required><?= $pelanggan['alamat']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="viewpelanggan.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>

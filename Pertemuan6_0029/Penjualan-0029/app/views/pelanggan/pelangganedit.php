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
    <title>Aplikasi Penjualan | Edit Pelanggan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../../public/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../public/dist/css/adminlte.min.css">
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Pelanggan</h3>
                    </div>
                    <!-- form start -->
                    <form action="" method="POST">
                        <div class="card-body">
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
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-primary">Simpan Perubahan</button>
                            <a href="viewpelanggan.php" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    <footer class="main-footer text-left mt-5">
        <strong>&copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>. All rights reserved.</strong>
        <div class="float-right d-none d-sm-inline">
            <b>Version</b> 3.2.0
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

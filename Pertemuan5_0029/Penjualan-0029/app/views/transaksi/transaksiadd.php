<?php
require_once '../../../config/database.php';
require_once '../../../app/models/transaksi.php';
require_once '../../../app/models/barang.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Cek apakah ada parameter 'kode_brg' untuk menangani AJAX
if (isset($_GET['kode_brg'])) {
    $modelBarang = new Barang($db);

    $kode_brg = $_GET['kode_brg'];
    $barang = $modelBarang->getBarangByKode($kode_brg);

    if ($barang) {
        echo json_encode(['success' => true, 'harga' => $barang['harga']]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit();
}

// Initialize Transaksi model
$modelTransaksi = new Transaksi($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $kode_brg = $_POST['kode_brg'];
    $id_plg = $_POST['id_plg'];
    $jumlah = $_POST['jumlah'];
    $total_harga = $_POST['total_harga'];
    
    // Set current datetime for `tanggal`
    $tanggal = date('Y-m-d H:i:s');

    // Add transaksi to the database
    $modelTransaksi->addTransaksi(null, $kode_brg, $id_plg, $jumlah, $total_harga, $tanggal);

    // Redirect back to viewtransaksi.php
    header("Location: viewtransaksi.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Tambah Transaksi</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="kode_brg">Kode Barang</label>
                <input type="text" class="form-control" id="kode_brg" name="kode_brg" required onchange="fetchHarga()">
            </div>
            <div class="form-group">
                <label for="id_plg">ID Pelanggan</label>
                <input type="text" class="form-control" id="id_plg" name="id_plg" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" required oninput="calculateTotal()">
            </div>
            <div class="form-group">
                <label for="total_harga">Total Harga</label>
                <input type="number" class="form-control" id="total_harga" name="total_harga" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="viewtransaksi.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script>
        let hargaBarang = 0;

        function fetchHarga() {
            const kodeBrg = document.getElementById('kode_brg').value;
            fetch(`transaksiadd.php?kode_brg=${kodeBrg}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        hargaBarang = data.harga;
                        calculateTotal();
                    } else {
                        alert('Kode barang tidak ditemukan');
                    }
                })
                .catch(error => console.error('Error fetching price:', error));
        }

        function calculateTotal() {
            const jumlah = document.getElementById('jumlah').value;
            const totalHarga = document.getElementById('total_harga');
            totalHarga.value = hargaBarang * jumlah;
        }
    </script>
</body>
</html>

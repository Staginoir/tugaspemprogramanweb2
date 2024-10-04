<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Diskon Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: skyblue;
        }
        h2 {
            color: #2c3e50;
            text-align: center;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        .result {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .result h3 {
            color: #2c3e50;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <h2>Kalkulator Diskon Belanja</h2>
    <form method="post">
        <label for="totalBelanja">Total Belanja (Rp):</label>
        <input type="number" id="totalBelanja" name="totalBelanja" required min="0">
        
        <label for="member">Status Member:</label>
        <select id="member" name="member">
            <option value="1">Member</option>
            <option value="0">Bukan Member</option>
        </select>
        
        <input type="submit" value="Hitung Total">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $totalBelanja = $_POST["totalBelanja"];
        $Member = $_POST["member"] == "1";

        echo "<div class='result'>";
        echo "<h3>Hasil Perhitungan:</h3>";
        echo "<p>Total belanja : Rp ". number_format($totalBelanja, 0, ',', '.'). "</p>";
        echo "<p>Status: " . ($Member ? "Member Aktif" : "Bukan Member") . "</p>";

        $totalAkhir = hitungDiskon($totalBelanja, $Member);
        echo "<p><strong>Total Bayar : Rp " . number_format($totalAkhir, 0, ',', '.') . "</strong></p>";
        echo "</div>";
    }

    function hitungDiskon($totalBelanja, $Member) {
        $diskon = 0;
        if ($Member) {
            $diskon = 0.10; // Diskon untuk member 10%
            // Diskon tambahan belanja lebih dari ketentuan total belanja untuk member
            if ($totalBelanja > 1000000) {
                $diskon += 0.15; // +15%
            } elseif ($totalBelanja >= 500000) {
                $diskon += 0.10; // +10%
            } 
        } else {
            // Diskon untuk bukan member
            if ($totalBelanja >= 1000000) {
                $diskon = 0.10; // 10%
            } elseif ($totalBelanja >= 500000) {
                $diskon = 0.05; // 5%
            }
        }
        // Menghitung total setelah diskon
        $totalSetelahDiskon = $totalBelanja - ($totalBelanja * $diskon);
        return $totalSetelahDiskon;
    }
    ?>
</body>
</html>
<?php
    $totalBelanja = 1000000; // Masukkan total belanja 
    $Member = true; // Masukkan status member (true untuk member, false untuk bukan member)
    echo "Total belanja : Rp ". number_format($totalBelanja, 0, ',', '.');
    echo "<br/>";
    if ($Member == true) {
        echo "Member Aktif";
    }else{
        echo "Bukan Member";
    }
    echo "<br/>";
$totalAkhir = hitungDiskon($totalBelanja, $Member);
echo "Total belanja setelah diskon : Rp " . number_format($totalAkhir, 0, ',', '.');

function hitungDiskon($totalBelanja, $Member) {
    $diskon = 0;
    if ($Member) {
        // Diskon untuk member
        if ($totalBelanja > 1000000) {
            $diskon = 0.15; // 15%
        } elseif ($totalBelanja >= 500000) {
            $diskon = 0.10; // 10%
        } else {
            $diskon = 0.10; // Potongan member 10%
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

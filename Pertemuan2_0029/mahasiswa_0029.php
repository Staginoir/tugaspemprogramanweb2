<?php

// Kelas Mahasiswa
class Mahasiswa {
    public $nama;
    public $nim;
    public $jurusan;
    public $ips = [];
    public $ipk;

    public function __construct($nama, $nim, $jurusan, $ips) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
        $this->ips = $ips;
        $this->ipk = $this->hitungIPK();
    }

    public function cetakInfo() {
        echo "Nama: $this->nama<br>";
        echo "NIM: $this->nim<br>";
        echo "Jurusan: $this->jurusan<br>";
        echo "IPK: " . number_format($this->ipk, 2) . "<br>";
    }

    public function hitungIPK() {
        $total = array_sum($this->ips);
        return $total / count($this->ips);
    }
}

// Kelas Mahasiswa Sarjana (S1)
class MahasiswaSarjana extends Mahasiswa {
    public $judulSkripsi;
    public $tahunSelesai;

    public function __construct($nama, $nim, $jurusan, $ips, $judulSkripsi, $tahunSelesai) {
        parent::__construct($nama, $nim, $jurusan, $ips);
        $this->judulSkripsi = $judulSkripsi;
        $this->tahunSelesai = $tahunSelesai;
    }

    // Cetak info dengan tambahan tahun penyelesaian
    public function cetakInfo() {
        parent::cetakInfo();
        echo "Judul Skripsi: $this->judulSkripsi<br>";
        echo "Tahun Penyelesaian: $this->tahunSelesai<br>";
    }
}

// Kelas Mahasiswa Magister (S2)
class MahasiswaMagister extends Mahasiswa {
    public $judulTesis;
    public $pembimbing;

    public function __construct($nama, $nim, $jurusan, $ips, $judulTesis, $pembimbing) {
        parent::__construct($nama, $nim, $jurusan, $ips);
        $this->judulTesis = $judulTesis;
        $this->pembimbing = $pembimbing;
    }

    // Cetak info dengan tambahan pembimbing tesis
    public function cetakInfo() {
        parent::cetakInfo();
        echo "Judul Tesis: $this->judulTesis<br>";
        echo "Pembimbing: $this->pembimbing<br>";
    }
}

// Kelas Mahasiswa Doktor (S3)
class MahasiswaDoktor extends Mahasiswa {
    public $judulDisertasi;
    public $tanggalSidang;

    public function __construct($nama, $nim, $jurusan, $ips, $judulDisertasi, $tanggalSidang) {
        parent::__construct($nama, $nim, $jurusan, $ips);
        $this->judulDisertasi = $judulDisertasi;
        $this->tanggalSidang = $tanggalSidang;
    }

    // Cetak info dengan tambahan tanggal sidang disertasi
    public function cetakInfo() {
        parent::cetakInfo();
        echo "Judul Disertasi: $this->judulDisertasi<br>";
        echo "Tanggal Sidang: $this->tanggalSidang<br>";
    }
}

// Kelas Jurusan
class Jurusan {
    public $namaJurusan;
    public $daftarMahasiswa = [];

    public function __construct($namaJurusan) {
        $this->namaJurusan = $namaJurusan;
    }

    public function tambahMahasiswa(Mahasiswa $mhs) {
        $this->daftarMahasiswa[] = $mhs;
    }

    public function cetakDaftarMahasiswa() {
        echo "Daftar Mahasiswa di Jurusan $this->namaJurusan:<br>";
        foreach ($this->daftarMahasiswa as $mahasiswa) {
            $mahasiswa->cetakInfo();
            echo "<br>";
        }
    }
}

// Main Program
$ipsMhs1 = [3.5, 3.6, 3.7, 3.8];
$mhs1 = new MahasiswaSarjana("Kevin Manunggal", "12345", "Informatika", $ipsMhs1, "Sistem Pakar", 2020);

$ipsMhs2 = [3.8, 3.9, 4.0];
$mhs2 = new MahasiswaMagister("Sari Putri Diana", "67890", "Informatika", $ipsMhs2, "Artificial Intelligence", "Dr. Suharto");

$ipsMhs3 = [3.9, 4.0];
$mhs3 = new MahasiswaDoktor("Andi Brama Wijaya", "54321", "Informatika", $ipsMhs3, "Machine Learning", "12 Juni 2023");

$jurusanInformatika = new Jurusan("Informatika");
$jurusanInformatika->tambahMahasiswa($mhs1);
$jurusanInformatika->tambahMahasiswa($mhs2);
$jurusanInformatika->tambahMahasiswa($mhs3);

$jurusanInformatika->cetakDaftarMahasiswa();

?>

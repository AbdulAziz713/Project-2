<?php
// Mulai sesi
session_start();
require '../db-connect.php';

// Cek otorisasi
if (!isset($_SESSION['role'])) {
    echo '<script>alert("Required Login Authorization!");window.location="login/login.php";</script>';
    exit();
}

// Debugging sesi (hapus setelah selesai)
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
// exit();

// Ambil data sesi
$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Guest';
$username = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
$telepon = isset($_SESSION['telepon']) ? $_SESSION['telepon'] : 'Guest';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'Guest';

// Ambil ID pengguna dari sesi
$id_pelanggan = isset($_SESSION['id']) ? $_SESSION['id'] : null;

// Proses form jika dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_paket = isset($_POST['id_paket']) ? $_POST['id_paket'] : '';
    $nama_pelanggan = isset($_POST['nama_pelanggan']) ? $_POST['nama_pelanggan'] : '';
    $tanggal_acara = isset($_POST['tanggal_acara']) ? $_POST['tanggal_acara'] : '';
    $lokasi = isset($_POST['lokasi']) ? $_POST['lokasi'] : '';

    // Validasi data
    if (empty($id_paket) || empty($nama_pelanggan) || empty($tanggal_acara) || empty($lokasi) || empty($id_pelanggan)) {
        echo "<script>alert('Harap isi semua data yang diperlukan.');window.location='confirm.php';</script>";
        exit();
    }

    // Data layanan dan harga sesuai paket
    $paketList = [
        1 => ['Mawar Package', 15000000],
        2 => ['Melati Package', 18000000],
        3 => ['Anggrek Package', 22000000],
        4 => ['Tulip Package', 25000000],
        5 => ['Lily Package', 35000000],
        6 => ['Lavender Package', 38000000],
        7 => ['Dahlia Package', 40000000],
    ];

    // Pastikan id_paket valid
    if (!isset($paketList[$id_paket])) {
        echo "<script>alert('Paket tidak valid!');window.location='confirm.php';</script>";
        exit();
    }

    $layanan = $paketList[$id_paket][0];
    $harga = $paketList[$id_paket][1];

    // Sanitasi input untuk menghindari SQL Injection
    $id_pelanggan = mysqli_real_escape_string($koneksi, $id_pelanggan);
    $id_paket = mysqli_real_escape_string($koneksi, $id_paket);
    $nama_pelanggan = mysqli_real_escape_string($koneksi, $nama_pelanggan);
    $layanan = mysqli_real_escape_string($koneksi, $layanan);
    $harga = mysqli_real_escape_string($koneksi, $harga);
    $lokasi = mysqli_real_escape_string($koneksi, $lokasi);
    $tanggal_acara = mysqli_real_escape_string($koneksi, $tanggal_acara);

    // Query insert ke tabel pesanan
    $query = "INSERT INTO pesanan (id_pelanggan, id_paket, nama_pelanggan, layanan, harga, lokasi, tgl_pernikahan, status, keterangan)
              VALUES ('$id_pelanggan', '$id_paket', '$nama_pelanggan', '$layanan', '$harga', '$lokasi', '$tanggal_acara', 'Menunggu Pembayaran', '')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>alert('Pesanan berhasil dibuat.');window.location='pembayaran.php';</script>";
    } else {
        die("Query Error: " . mysqli_error($koneksi));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($username); ?> - Irma Wedding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Pemesanan Paket Wedding Organizer</h1>

        <!-- Form Pemesanan -->
        <form method="POST" action="">
            <!-- Pilih Paket -->
            <div class="mb-3">
                <label for="paket" class="form-label">Pilih Paket</label>
                <select id="paket" name="id_paket" class="form-select" required>
                    <option value="" disabled selected>Pilih salah satu...</option>
                    <option value="1">Mawar Package - Rp15.000.000</option>
                    <option value="2">Melati Package - Rp18.000.000</option>
                    <option value="3">Anggrek Package - Rp22.000.000</option>
                    <option value="4">Tulip Package - Rp25.000.000</option>
                    <option value="5">Lily Package - Rp35.000.000</option>
                    <option value="6">Lavender Package - Rp38.000.000</option>
                    <option value="7">Dahlia Package - Rp40.000.000</option>
                </select>
            </div>

            <!-- Isi Data Pemesan -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pemesan</label>
                <input type="text" id="nama" name="nama_pelanggan" class="form-control" value="<?php echo htmlspecialchars($nama); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="noTelepon" class="form-label">Nomor Telepon</label>
                <input type="tel" id="noTelepon" class="form-control" value="<?php echo htmlspecialchars($telepon); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="tanggalAcara" class="form-label">Tanggal Acara</label>
                <input type="date" id="tanggalAcara" name="tanggal_acara" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi Acara</label>
                <input type="text" id="lokasi" name="lokasi" class="form-control" placeholder="Masukkan lokasi acara" required>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Konfirmasi Pemesanan</button>
            </div>
        </form>
    </div>
</body>
</html>

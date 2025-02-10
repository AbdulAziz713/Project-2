<?php
// Mulai sesi dan koneksi database
session_start();
require '../db-connect.php';

// Periksa jika pengguna belum login
if (!isset($_SESSION['role'])) {
    echo '<script>alert("Required Login Authorization!");window.location="login/login.php";</script>';
    exit();
}

// Ambil data pesanan terbaru berdasarkan ID pelanggan
$id_pelanggan = isset($_SESSION['id']) ? $_SESSION['id'] : null;

$query = "SELECT * FROM pesanan WHERE id_pelanggan = '$id_pelanggan' ORDER BY id_pesanan DESC LIMIT 1";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $pesanan = mysqli_fetch_assoc($result);
} else {
    echo '<script>alert("Tidak ada pesanan ditemukan.");window.location="index.php";</script>';
    exit();
}

// Proses form jika dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pesanan = $pesanan['id_pesanan'];
    $metode_pembayaran = isset($_POST['metode_pembayaran']) ? $_POST['metode_pembayaran'] : '';
    $status_pembayaran = 'Menunggu Konfirmasi'; // Status awal
    $bukti_pembayaran = '';

    // Upload bukti pembayaran
    if (!empty($_FILES['bukti_pembayaran']['name'])) {
        $target_dir = "../assets/img/bukti_pembayaran/";
        $file_name = basename($_FILES['bukti_pembayaran']['name']);
        $target_file = $target_dir . time() . "_" . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi format file
        $valid_types = ['jpg', 'jpeg', 'png', 'pdf'];
        if (in_array($file_type, $valid_types)) {
            if (move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], $target_file)) {
                $bukti_pembayaran = $target_file;
            } else {
                echo '<script>alert("Gagal mengunggah bukti pembayaran.");</script>';
            }
        } else {
            echo '<script>alert("Format file tidak valid. Harap unggah file JPG, JPEG, PNG, atau PDF.");</script>';
        }
    }

    // Validasi data
    if (empty($metode_pembayaran) || empty($bukti_pembayaran)) {
        echo '<script>alert("Harap lengkapi semua data.");</script>';
    } else {
        // Simpan data pembayaran ke tabel pembayaran
        $query = "INSERT INTO pembayaran (id_pesanan, metode_pembayaran, status_pembayaran, bukti_pembayaran) 
                  VALUES ('$id_pesanan', '$metode_pembayaran', '$status_pembayaran', '$bukti_pembayaran')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo '<script>alert("Pembayaran berhasil dikirim. Menunggu konfirmasi.");window.location="../index.php";</script>';
        } else {
            die("Query Error: " . mysqli_error($koneksi));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Irma Wedding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Pembayaran</h1>
        <div class="card mt-4">
            <div class="card-header bg-info text-white">
                <h5>Ringkasan Pesanan</h5>
            </div>
            <div class="card-body">
                <p><strong>Nama Pemesan:</strong> <?php echo htmlspecialchars($pesanan['nama_pelanggan']); ?></p>
                <p><strong>Paket:</strong> <?php echo htmlspecialchars($pesanan['Layanan']); ?></p>
                <p><strong>Harga:</strong> Rp<?php echo number_format($pesanan['Harga'], 0, ',', '.'); ?></p>
                <p><strong>Lokasi Acara:</strong> <?php echo htmlspecialchars($pesanan['lokasi']); ?></p>
                <p><strong>Tanggal Acara:</strong> <?php echo htmlspecialchars($pesanan['tgl_pernikahan']); ?></p>
            </div>
        </div>

        <form method="POST" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
    <label for="metode_pembayaran" class="form-label">Pilih Metode Pembayaran</label>
    <select id="metode_pembayaran" name="metode_pembayaran" class="form-select" required onchange="updatePaymentDetails()">
        <option value="" disabled selected>Pilih salah satu...</option>
        <option value="Transfer Bank">Transfer Bank</option>
        <option value="E-Wallet">E-Wallet (Gopay/OVO/DANA)</option>
        <option value="Qris">QRis</option>
    </select>
</div>

<div id="payment-details" class="border p-3 rounded bg-light" style="display: none;">
    <!-- Detail metode pembayaran akan muncul di sini -->
</div>


            <div class="mb-3">
                <label for="bukti_pembayaran" class="form-label">Unggah Bukti Pembayaran</label>
                <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="form-control" accept=".jpg, .jpeg, .png, .pdf" required>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Kirim Pembayaran</button>
            </div>
        </form>
    </div>
</body>
<script>
    function updatePaymentDetails() {
        const paymentDetailsDiv = document.getElementById('payment-details');
        const selectedMethod = document.getElementById('metode_pembayaran').value;

        let details = '';
        switch (selectedMethod) {
            case 'Transfer Bank':
                details = `
                    <h6>Transfer Bank</h6>
                    <p>Silakan transfer ke salah satu rekening berikut:</p>
                    <ul>
                        <li>BCA: 1234567890 a.n Irma Wedding</li>
                        <li>Mandiri: 0987654321 a.n Irma Wedding</li>
                    </ul>
                `;
                break;
            case 'E-Wallet':
                details = `
                    <h6>E-Wallet</h6>
                    <p>Scan QR berikut untuk melakukan pembayaran:</p>
                    <img src="../assets/img/qr-code-example.png" alt="QR Code" class="img-fluid" style="max-width: 200px;">
                    <p>GOPAY</p>
                    <img src="../assets/img/qr-code-example.png" alt="QR Code" class="img-fluid" style="max-width: 200px;">
                    <p>OVO</p>
                    <img src="../assets/img/qr-code-example.png" alt="QR Code" class="img-fluid" style="max-width: 200px;">
                    <p>DANA</p>
                `;
                break;
                case 'Qris':
                details = `
                    <h6>QRis</h6>
                    <p>Scan QR berikut untuk melakukan pembayaran:</p>
                    <img src="../assets/img/qr-code-example.png" alt="QR Code" class="img-fluid" style="max-width: 200px;">
                `;
                break;
            default:
                details = '';
        }

        if (details) {
            paymentDetailsDiv.innerHTML = details;
            paymentDetailsDiv.style.display = 'block';
        } else {
            paymentDetailsDiv.style.display = 'none';
        }
    }
</script>

</html>

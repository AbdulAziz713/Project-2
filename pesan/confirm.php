<?php
// File: getPaket.php
header('Content-Type: application/json');

// Koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'wedding_organizer');

if ($koneksi->connect_error) {
    die(json_encode(['error' => 'Database connection failed']));
}

// Ambil id_paket dari URL
$idPaket = $_GET['id'];

// Query untuk mendapatkan detail paket
$query = "SELECT * FROM packages WHERE id_paket = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param('i', $idPaket);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode($data);
} else {
    echo json_encode(['error' => 'Paket tidak ditemukan']);
}

$stmt->close();
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Wedding Organizer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Pemesanan Paket Wedding Organizer</h1>

        <!-- Contoh tombol Pilih Paket -->
<div class="card">
    <h5 class="card-title">Mawar Package</h5>
    <p class="card-text">Rp15.000.000</p>
    <button class="btn btn-warning pilih-paket" data-id-paket="1">Pilih Paket</button>
</div>

<!-- Form Pemesanan -->
<form id="formPemesanan" class="mt-5">
    <div class="mb-3">
        <label for="paket" class="form-label">Nama Paket</label>
        <input type="text" id="paket" class="form-control" readonly>
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga Paket</label>
        <input type="text" id="harga" class="form-control" readonly>
    </div>
    <div class="mb-3">
        <label for="fasilitas" class="form-label">Fasilitas</label>
        <textarea id="fasilitas" class="form-control" rows="5" readonly></textarea>
    </div>
    <button type="submit" class="btn btn-success">Konfirmasi Pemesanan</button>
</form>
            <!-- Konfirmasi Pesanan -->
            <div class="mb-3">
                <h5>Ringkasan Pesanan</h5>
                <p id="ringkasanPesanan" class="border p-3">Pilih paket dan isi data untuk melihat ringkasan.</p>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between">
                <button type="button" id="btnLihatRingkasan" class="btn btn-primary">Lihat Ringkasan</button>
                <button type="submit" id="btnKonfirmasi" class="btn btn-success" disabled>Konfirmasi Pemesanan</button>
            </div>
        </form>
    </div>

    <!-- Script -->
    <script>
    // Event listener untuk tombol "Pilih Paket"
    document.querySelectorAll('.pilih-paket').forEach(button => {
        button.addEventListener('click', function () {
            const idPaket = this.getAttribute('data-id-paket');

            // Kirim permintaan ke backend
            fetch(`/getPaket/${idPaket}`)
                .then(response => response.json())
                .then(data => {
                    // Isi form dengan data dari backend
                    document.getElementById('paket').value = data.nama_paket;
                    document.getElementById('harga').value = data.harga;
                    document.getElementById('fasilitas').value = data.fasilitas;
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>
    <script>
        document.getElementById('btnLihatRingkasan').addEventListener('click', function () {
            const paket = document.getElementById('paket').value;
            const nama = document.getElementById('nama').value;
            const email = document.getElementById('email').value;
            const noTelepon = document.getElementById('noTelepon').value;
            const tanggalAcara = document.getElementById('tanggalAcara').value;
            const lokasi = document.getElementById('lokasi').value;

            if (paket && nama && email && noTelepon && tanggalAcara && lokasi) {
                const paketText = document.getElementById('paket').options[document.getElementById('paket').selectedIndex].text;
                document.getElementById('ringkasanPesanan').innerHTML = `
                    <strong>Paket:</strong> ${paketText}<br>
                    <strong>Nama:</strong> ${nama}<br>
                    <strong>Email:</strong> ${email}<br>
                    <strong>Telepon:</strong> ${noTelepon}<br>
                    <strong>Tanggal Acara:</strong> ${tanggalAcara}<br>
                    <strong>Lokasi:</strong> ${lokasi}
                `;
                document.getElementById('btnKonfirmasi').disabled = false;
            } else {
                alert('Mohon isi semua data!');
            }
        });

        document.getElementById('formPemesanan').addEventListener('submit', function (event) {
            event.preventDefault();
            alert('Pesanan berhasil dikonfirmasi!');
            this.reset();
            document.getElementById('ringkasanPesanan').innerHTML = 'Pilih paket dan isi data untuk melihat ringkasan.';
            document.getElementById('btnKonfirmasi').disabled = true;
        });
    </script>
</body>
</html>

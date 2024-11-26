<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Pembayaran</h1>

        <!-- Form Pembayaran -->
        <form id="payment-form">
            <!-- Pilihan Metode Pembayaran -->
            <div class="mb-4">
                <label for="paymentMethod" class="form-label">Pilih Metode Pembayaran:</label>
                <select class="form-select" id="paymentMethod" required>
                    <option value="" selected disabled>Pilih metode...</option>
                    <option value="transfer">Transfer Bank</option>
                    <option value="credit_card">Kartu Kredit</option>
                    <option value="e_wallet">E-Wallet</option>
                </select>
            </div>

            <!-- Instruksi Transfer Bank -->
            <div class="mb-4 d-none" id="bankTransferDetails">
                <p>Silakan transfer ke nomor rekening berikut:</p>
                <ul>
                    <li>Bank: ABC</li>
                    <li>Nomor Rekening: 123456789</li>
                    <li>Atas Nama: Wedding Organizer</li>
                </ul>
                <p>Setelah transfer, unggah bukti pembayaran Anda:</p>
                <input type="file" class="form-control" id="uploadProof" accept="image/*" required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary w-100">Kirim Pembayaran</button>
        </form>

        <!-- Notifikasi -->
        <div class="mt-4" id="notification" style="display: none;">
            <div class="alert alert-success" role="alert">
                Pembayaran Anda berhasil dikirim! Harap tunggu verifikasi.
            </div>
        </div>
    </div>

    <script>
        const paymentMethod = document.getElementById('paymentMethod');
        const bankTransferDetails = document.getElementById('bankTransferDetails');
        const paymentForm = document.getElementById('payment-form');
        const notification = document.getElementById('notification');

        // Event listener untuk mengganti tampilan sesuai metode pembayaran
        paymentMethod.addEventListener('change', function () {
            if (this.value === 'transfer') {
                bankTransferDetails.classList.remove('d-none');
            } else {
                bankTransferDetails.classList.add('d-none');
            }
        });

        // Simulasi pengiriman pembayaran
        paymentForm.addEventListener('submit', function (e) {
            e.preventDefault();
            notification.style.display = 'block';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

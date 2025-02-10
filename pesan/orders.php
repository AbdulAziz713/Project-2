<?php
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
require '../db-connect.php';

// Cek autentikasi pengguna
if (!isset($_SESSION['role'])) {
    echo '<script>alert("Required Login Authorization!");window.location="login/login.php";</script>';
    exit();
}

// Ambil id_pelanggan dari session
if (!isset($_SESSION['id'])) {
    echo '<script>alert("Session ID tidak ditemukan! Harap login kembali.");window.location="login/login.php";</script>';
    exit();
}
$id_pelanggan = $_SESSION['id'];
$username = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';

// Query ke database
$query = "SELECT * FROM pesanan WHERE id_pelanggan = '$id_pelanggan'";
$result = mysqli_query($koneksi, $query);

// Debugging query result
if (!$result) {
    die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
}
if ($result->num_rows === 0) {
    echo "<script>alert('Data tidak ditemukan pada database');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo htmlspecialchars($username); ?> - Irma Wedding</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script
      src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
      crossorigin="anonymous"
    ></script>
    <!-- Google fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700"
      rel="stylesheet"
      type="text/css"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="landing-page/css/styles.css" rel="stylesheet" />
  </head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Pesanan Saya</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Nama Pelanggan</th>
                        <th>Layanan</th>
                        <th>Harga</th>
                        <th>Tanggal Pernikahan</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Tampilkan data pesanan yang dimiliki pelanggan
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id_pesanan']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nama_pelanggan']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Layanan']) . "</td>";
                            echo "<td>Rp " . number_format($row['Harga'], 0, ',', '.') . "</td>";
                            echo "<td>" . htmlspecialchars($row['tgl_pernikahan']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['status_pembayaran']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>Tidak ada data pesanan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

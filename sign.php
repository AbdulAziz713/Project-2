<?php
session_start(); // Memulai session
include_once "db-connect.php"; // Pastikan Anda memiliki koneksi database

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['register'])) {
    $nama = trim($_POST['nama_pelanggan']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $jenis_kelamin = trim($_POST['jenis_kelamin']);
    $telepon = trim($_POST['telepon']);
    $alamat = trim($_POST['alamat']);

    // Memeriksa apakah input tidak kosong
    if (empty($nama) || empty($email) || empty($password) || empty($jenis_kelamin) || empty($telepon) || empty($alamat)) {
        echo "<script>alert('Semua field harus diisi!');</script>";
    } else {
        // Memeriksa apakah email sudah ada
        $stmt = $koneksi->prepare("SELECT * FROM tb_pelanggan WHERE email=?");
        if (!$stmt) {
            echo "Prepare failed: (" . $koneksi->errno . ") " . $koneksi->error;
            exit; // Hentikan eksekusi jika ada kesalahan
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Email sudah terdaftar!');</script>";
        } else {
            // Meng-hash password sebelum disimpan
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Menyimpan pengguna baru ke database
            $stmt = $koneksi->prepare("INSERT INTO tb_pelanggan (nama_pelanggan, email, password, jenis_kelamin, telepon, alamat) VALUES (?, ?, ?, ?, ?, ?)");
            if (!$stmt) {
                echo "Prepare failed: (" . $koneksi->errno . ") " . $koneksi->error;
                exit; // Hentikan eksekusi jika ada kesalahan
            }

            $stmt->bind_param("ssssss", $nama, $email, $hashed_password, $jenis_kelamin, $telepon, $alamat);
            if ($stmt->execute()) {
                echo "<script>alert('Akun berhasil dibuat!'); window.location.href='login.php';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan, coba lagi!');</script>";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo/polsub.png" />
    <title>Buat Akun</title>
    <link rel="stylesheet" href="style.css"> <!-- Menggunakan file CSS yang sama -->
</head>
<body>
    <div class="kotak_login">
    <h3><b>Sistem Informasi Weding Organizer </b> <br/> Politeknik Negeri Subang</h3>
    <center><img src="img/logo/polsub.png" width="200" height="200"></center>
    </div>
    <div class="vertical-line"></div>
    <div class="kotak_login2 signup-form"> <!-- Tambahkan kelas khusus -->
        <p class="tulisan_login">Silahkan Isi Data</p>
        <form name="form1" action="" method="post" class="form-horizontal" onsubmit="showLoading()">
            <div class="form-row">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_pelanggan" class="form_login" placeholder="Nama Lengkap" required/>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form_login" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form_login" placeholder="Email" required/>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="telepon" class="form_login" placeholder="Nomor Telepon" required/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form_login" placeholder="Password" required/>
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <textarea name="alamat" class="form_login" placeholder="Alamat Lengkap" required></textarea>
                </div>
            </div>
            <input type="submit" name="register" class="tombol_login" value="DAFTAR"/>&nbsp;
        </form>
        <div class="signup">
            Sudah punya akun?
            <a href="login.php">Login di sini</a>
        </div>
    </div>
</body>
</html>
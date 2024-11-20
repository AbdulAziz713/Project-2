<?php
session_start(); // Memulai session
include_once "../db-connect.php"; // Pastikan Anda memiliki koneksi database

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['reset'])) {
    $email = trim($_POST['email']);
    $password_lama = trim($_POST['password_lama']);
    $password_baru = trim($_POST['password_baru']);

    // Memeriksa apakah input tidak kosong
    if (empty($email) || empty($password_lama) || empty($password_baru)) {
        echo "<script>alert('Semua field harus diisi!');</script>";
    } else {
        // Memeriksa apakah email sudah ada
        $stmt = $koneksi->prepare("SELECT * FROM users WHERE email=?");
        if (!$stmt) {
            echo "Prepare failed: (" . $koneksi->errno . ") " . $koneksi->error;
            exit; // Hentikan eksekusi jika ada kesalahan
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            echo "<script>alert('Email tidak terdaftar!');</script>";
        } else {
            $user = $result->fetch_assoc();
            // Memeriksa password lama
            if (!password_verify($password_lama, $user['password'])) {
                echo "<script>alert('Password lama salah!');</script>";
            } else {
                // Meng-hash password baru sebelum disimpan
                $hashed_password = password_hash($password_baru, PASSWORD_DEFAULT);

                // Memperbarui password pengguna di database
                $stmt = $koneksi->prepare("UPDATE users SET password=? WHERE email=?");
                if (!$stmt) {
                    echo "Prepare failed: (" . $koneksi->errno . ") " . $koneksi->error;
                    exit; // Hentikan eksekusi jika ada kesalahan
                }

                $stmt->bind_param("ss", $hashed_password, $email);
                if ($stmt->execute()) {
                    echo "<script>alert('Password berhasil direset!');</script>";
                    echo "<script>alert('Silahkan login kembali!'); window.location.href='login.php';</script>";
                } else {
                    echo "<script>alert('Terjadi kesalahan, coba lagi!');</script>";
                }
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
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css"> <!-- Menggunakan file CSS yang sama -->
</head>
<body>
    <div class="kotak_login">
        <h3><b>Sistem Informasi Irma Wedding </b> <br/> Politeknik Negeri Subang</h3>
        <center><img src="../assets/img/logo/polsub.png" width="200" height="200"></center>
    </div>
    <div class="kotak_login2 signup-form"> <!-- Tambahkan kelas khusus -->
        <p class="tulisan_login">Silahkan Isi Data</p>
        <form name="form 1" action="" method="post" class="form-horizontal" onsubmit="showLoading()">
            <div class="form-row">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form_login" placeholder="Email" required/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Password Lama</label>
                    <input type="password" name="password_lama" class="form_login" placeholder="Password Lama" required/>
                </div>
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password_baru" class="form_login" placeholder="Password Baru" required/>
                </div>
            </div>
            <input type="submit" name="reset" class="tombol_login" value="RESET"/>&nbsp;
        </form>
    </div>
</body>
</html>
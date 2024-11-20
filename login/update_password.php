<?php
session_start(); // Memulai session
require "../db-connect.php"; // Pastikan Anda memiliki koneksi database

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Logika jika ada token pada URL
if (isset($_GET['token']) || isset($_POST['token'])) {
    $token = isset($_GET['token']) ? $_GET['token'] : $_POST['token'];

    // Jika request adalah POST, berarti form telah dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Update password di database
        $stmt = $koneksi->prepare("UPDATE users SET password = ?, reset_token = NULL WHERE reset_token = ?");
        $stmt->bind_param("ss", $password, $token);
        if ($stmt->execute()) {
            echo "<script>alert('Password berhasil diperbarui Silahkan login dengan password baru!'); window.location.href='';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui password'); window.location.href='';</script>";
        }
    } else {
        // Jika request adalah GET, cek token dan tampilkan form reset password
        $stmt = $koneksi->prepare("SELECT * FROM users WHERE reset_token = ?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Token valid, tampilkan formulir reset password
            ?>
            <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
  <title>Lupa Password</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kotak_login">
        <h3><b>Sistem Informasi Wedding Organizer </b> <br/> Politeknik Negeri Subang</h3>
        <center><img src="../assets/img/logo/polsub.png" width="200" height="200"></center>
    </div>
    <div class="kotak_login2">
        <p class="tulisan_login">Form Lupa Password</p>
        <form name="form1" action="" method="post">
            <label>Password Baru</label>
            <input type="text" name="password" id="password" class="form_login" placeholder="Password" required/>
            <input type="submit" name="Submit" class="tombol_login" value="KIRIM"/>&nbsp;
        </form>
    </div>
</body>
</html>
            <?php
        } else {
            echo "<script>alert('Token tidak valid'); window.location.href='forgot_password.php';</script>";
        }
    }
} else {
    echo "<script>alert('Token tidak ditemukan'); window.location.href='forgot_password.php';</script>";
}
?>

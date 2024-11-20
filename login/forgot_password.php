<?php
session_start(); // Memulai session
require "../db-connect.php"; // Koneksi ke database
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

// Cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Cek koneksi
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Cek apakah email ada di database
    $stmt = $koneksi->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(50)); // Buat token unik
        $stmt = $koneksi->prepare("UPDATE users SET reset_token = ? WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        // Kirim email dengan tautan reset password menggunakan PHPMailer
        $reset_link = "http://localhost/project/update_password.php?token=" . $token;

        $mail = new PHPMailer(true); // Instance PHPMailer

        try {
            // Pengaturan SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Ganti dengan server SMTP Anda
            $mail->SMTPAuth = true;
            $mail->Username = 'abdul.azis2004.aa@gmail.com'; // Ganti dengan email Anda
            $mail->Password = 'tmat eqsb tkxj sbta'; // Ganti dengan password email Anda
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465; // Port yang digunakan untuk SMTP

            // Pengaturan email
            $mail->setFrom('abdul.azis2004.aa@gmail.com', 'Abdul Aziz'); // Ganti dengan nama Anda
            $mail->addAddress($email); // Tambahkan penerima

            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body    = "Klik tautan berikut untuk mereset password Anda: <a href='$reset_link'>$reset_link</a>";
            $mail->AltBody = "Klik tautan berikut untuk mereset password Anda: $reset_link";

            $mail->send();
            echo "<script>alert('Tautan reset password telah dikirim ke email Anda.'); window.location.href='login.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Pesan tidak dapat dikirim. Mailer Error: {$mail->ErrorInfo}'); window.location.href='';</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan.'); window.location.href='';</script>";
    }
} else {
    // Jika form belum dikirim, tampilkan form
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
            <label>Email</label>
            <input type="text" name="email" id="email" class="form_login" placeholder="Email" required/>
            <input type="submit" name="Submit" class="tombol_login" value="KIRIM"/>&nbsp;
        </form>
        <div class="signup">
            Ingin Melanjutkan Login?
            <a href="Login.php">Login</a>
        </div>
    </div>
</body>
</html>
    <?php
}
?>

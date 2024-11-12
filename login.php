<?php
session_start(); // Memulai session
include_once "db-connect.php";
$koneksi = mysqli_connect("localhost", "root", "", "wedding_organizer");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function redirectUser ($user) {
    // Menyimpan informasi pengguna ke dalam sesi berdasarkan role
    switch ($user['role_id']) {
        case 1: // super_admin
            $_SESSION['SUPER_ADMIN'] = [
                'id' => $user['id_pengguna'],
                'name' => $user['Nama'],
                'role' => $user['role_id']
            ];
            header("Location: superadmin/index.php");
            break;
        case 2: // admin
            $_SESSION['ADMIN'] = [
                'id' => $user['id_pengguna'],
                'name' => $user['Nama'],
                'role' => $user['role_id']
            ];
            header("Location: admin/index.php");
            break;
        case 3: // vendor
            $_SESSION['VENDOR'] = [
                'id' => $user['id_pengguna'],
                'name' => $user['Nama'],
                'role' => $user['role_id']
            ];
            header("Location: vendor/index.php");
            break;
        default:
            header("Location: index.php");
            break;
    }
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mencari pengguna berdasarkan username di tb_pengguna
    $query = "SELECT * FROM tb_pengguna WHERE username = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password menggunakan password_verify
        if (password_verify($password, $user['password'])) { 
            redirectUser ($user);
        } else {
            echo "<script>alert('Username atau password salah!');</script>";
        }
    } else {
        // Jika tidak ditemukan di tb_pengguna, cari di tb_pelanggan
        $query = "SELECT * FROM tb_pelanggan WHERE email = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $pelanggan = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $pelanggan['password'])) { 
                $_SESSION['user'] = [
                    'id' => $pelanggan['id_pelanggan'],
                    'name' => $pelanggan['nama_pelanggan'],
                    'role' => 'pelanggan'
                ];

                // Redirect ke halaman pelanggan
                header("Location: index.php"); 
                exit();
            } else {
                echo "<script>alert('Email atau password salah!');</script>";
            }
        } else {
            echo "<script>alert('Username atau Email tidak ditemukan!');</script>";
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
  <title>Form Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kotak_login">
        <h3><b>Sistem Informasi Wedding Organizer </b> <br/> Politeknik Negeri Subang</h3>
        <center><img src="img/logo/polsub.png" width="200" height="200"></center>
    </div>
    <div class="vertical-line"></div>
    <div class="kotak_login2">
        <p class="tulisan_login">Silahkan Login</p>
        <form name="form1" action="" method="post">
            <label>Username atau Email</label>
            <input type="text" name="username" id="username" class="form_login" placeholder="Username atau Email" required/>

            <label>Password</label>
            <input type="password" name="password" id="password" class="form_login" placeholder="Password" required/>

            <label class="forget-password"><a href="sign.php">Forget Password?</a></label>
            <input type="submit" name="login" class="tombol_login" value="LOGIN"/>&nbsp;
        </form>
        <div class="signup">
            Tidak punya akun?
            <a href="sign.php">Buat Akun</a>
        </div>
    </div>
</body>
</html>
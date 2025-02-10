<?php
session_start(); // Memulai session
include_once "../db-connect.php";
$koneksi = mysqli_connect("localhost", "root", "", "wedding_organizer");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function redirectUser($user) {
    $role = trim($user['role']); // Normalisasi role ke uppercase dan hilangkan spasi
    $_SESSION['id'] = $user['id_user'];     // ID pengguna
    $_SESSION['nama'] = $user['nama'];      // Nama pengguna
    $_SESSION['name'] = $user['username']; // Username pengguna
    $_SESSION['role'] = $role;             // Role pengguna
    $_SESSION['email'] = $user['email'];   // Email pengguna
    $_SESSION['telepon'] = $user['telepon'];   // Nomor telepon pengguna
    $_SESSION['alamat'] = $user['alamat'];   // Alamat pengguna

    switch ($role) {
        case 'Owner':
            header("Location: ../admin/index.php");
            exit();
        case 'Admin':
            header("Location: ../admin/index.php");
            exit();
        case 'Vendor':
            header("Location: ../admin/index.php");
            exit();
        case 'User':
            header("Location: ../index.php");
            exit();
        default:
            echo "<script>alert('Role tidak dikenali! Role saat ini: $role');</script>";
            exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mencari pengguna berdasarkan username di tb_pengguna
    $query = "SELECT * FROM users WHERE username = ?";
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
            echo "<script>alert('Username tidak ditemukan!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
  <title>Form Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kotak_login">
        <center><img src="../assets/img/logo/logo-irma.png" width="250" height="200"></center>
    </div>
    <div class="kotak_login2">
        <p class="tulisan_login">Silahkan Login</p>
        <form name="form1" action="" method="post">
            <label>Username</label>
            <input type="text" name="username" id="username" class="form_login" placeholder="Username" required/>

            <label>Password</label>
            <input type="password" name="password" id="password" class="form_login" placeholder="Password" required/>

            <label class="forget-password"><a href="forgot_password.php">Lupa Password?</a></label>
            <input type="submit" name="login" class="tombol_login" value="LOGIN"/>&nbsp;
        </form>
        <div class="signup">
            Tidak punya akun?
            <a href="sign.php">Buat Akun</a>
        </div>
    </div>
</body>
</html>
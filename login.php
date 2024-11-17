<?php
session_start(); // Memulai session
include_once "db-connect.php";
$koneksi = mysqli_connect("localhost", "root", "", "wedding_organizer");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

function redirectUser ($user) {
    $role = strtoupper(trim($user['role'])); // Normalisasi role ke uppercase dan hilangkan spasi
switch ($role) {
    case 'SUPER_ADMIN':
        $_SESSION['SUPER_ADMIN'] = [
            'id' => $user['id_user'],
            'name' => $user['Nama'],
            'role' => $role
        ];
        header("Location: superadmin/index.php");
        exit();
    case 'ADMIN':
        $_SESSION['ADMIN'] = [
            'id' => $user['id_user'],
            'name' => $user['Nama'],
            'role' => $role
        ];
        header("Location: admin/index.php");
        exit();
    case 'VENDOR':
        $_SESSION['VENDOR'] = [
            'id' => $user['id_user'],
            'name' => $user['Nama'],
            'role' => $role
        ];
        header("Location: vendor/index.php");
        exit();
    case 'USER':
        $_SESSION['USER'] = [
            'id' => $user['id_user'],
            'name' => $user['Nama'],
            'role' => $role
        ];
        header("Location: index.php");
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
  <link rel="icon" href="assets/img/logo/polsub.png" />
  <title>Form Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kotak_login">
        <h3><b>Sistem Informasi Wedding Organizer </b> <br/> Politeknik Negeri Subang</h3>
        <center><img src="assets/img/logo/polsub.png" width="200" height="200"></center>
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
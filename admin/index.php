<?php
// Start session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require '../db-connect.php';
// Cek otentikasi pengguna
if (!isset($_SESSION['role'])) {
  echo '<script>alert("Required Login Authorization!");window.location="../login/login.php";</script>';
  exit();
}
$username = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'Guest';

// Menu berdasarkan role
$menus = [
    'Owner' => [
        ['icon' => 'bi bi-question-circle', 'text' => 'About', 'link' => 'index.php?page=about'],
        ['icon' => 'bi bi-people', 'text' => 'Testimonial', 'link' => 'index.php?page=testi'],
        ['icon' => 'bi bi-telephone', 'text' => 'Contact', 'link' => 'index.php?page=contact'],
        ['icon' => 'bi bi-file-earmark-text', 'text' => 'Vendor', 'link' => 'index.php?page=vendor'],
        ['icon' => 'bi bi-file-earmark-text', 'text' => 'Pelanggan', 'link' => 'index.php?page=pelanggan'],
    ],
    'Admin' => [
        ['icon' => 'bi bi-file-earmark-bar-graph', 'text' => 'Features', 'link' => 'index.php?page=features'],
        ['icon' => 'bi bi-images', 'text' => 'Gallery', 'link' => 'index.php?page=gallery'],
        ['icon' => 'bi bi-newspaper', 'text' => 'Blog', 'link' => 'index.php?page=blog'],
        ['icon' => 'bi bi-people', 'text' => 'Testimonial', 'link' => 'index.php?page=testi'],
        ['icon' => 'bi bi-telephone', 'text' => 'Contact', 'link' => 'index.php?page=contact'],
        ['icon' => 'bi bi-file-earmark-text', 'text' => 'Vendor', 'link' => 'index.php?page=vendor'],
        ['icon' => 'bi bi-file-earmark-text', 'text' => 'Pelanggan', 'link' => 'index.php?page=pelanggan'],
        ['icon' => 'bi bi-file-earmark-text', 'text' => 'Pesanan', 'link' => 'index.php?page=pesanan'],
        ['icon' => 'bi bi-file-earmark-text', 'text' => 'Pembayaran', 'link' => 'index.php?page=pembayaran'],
    ],
    'Vendor' => [
        ['icon' => 'bi bi-archive', 'text' => 'Packages', 'link' => 'index.php?page=packages'],
        ['icon' => 'bi bi-newspaper', 'text' => 'Blog', 'link' => 'index.php?page=blog'],
        ['icon' => 'bi bi-telephone', 'text' => 'Contact', 'link' => 'index.php?page=contact'],
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <title><?php echo htmlspecialchars($role); ?> - Irma Wedding</title>
    
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tiny.cloud/1/2ol7w9hdbi0pdtg3hjanp13h87pvosj3pqzcdaezfpne0qj1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>
<div id="loader-container">
  <div class="loader"></div>
</div>
    <!-- Header -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="#" class="logo d-flex align-items-center">
    <span class="d-none d-lg-block">Irma Wedding</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="../assets/img/logo/polsub.png" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo htmlspecialchars($role); ?></span>
                 </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?php echo htmlspecialchars($username ); ?></h6>
                        <span>Full Stack Developer</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="update.html">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="update.html">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="update.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="../action.php?act=logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

    <!-- Sidebar -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <?php
            if (isset($menus[$_SESSION['role']])) {
              foreach ($menus[$_SESSION['role']] as $menu) {
                  echo '<li class="nav-item">';
                  echo '<a class="nav-link" href="' . htmlspecialchars($menu['link']) . '">';
                  echo '<i class="' . htmlspecialchars($menu['icon']) . '"></i>';
                  echo '<span>' . htmlspecialchars($menu['text']) . '</span>';
                  echo '</a>';
                  echo '</li>';
              }
          } else {
              echo '<script>alert("Unauthorized Role!");window.location="../login.php";</script>';
              exit();
          }
        ?>
        <li class="nav-heading">Pages</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#profile-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Profile</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="profile-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="../action.php?act=logout">
                        <i class="bi bi-caret-right"></i><span>Log Out</span>
                    </a>
                </li>
                <li>
                    <a href="../login/reset_password.php">
                        <i class="bi bi-caret-right"></i><span>Rubah Password</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
    
    <!-- Main Content -->
    <main id="main" class="main">
        <?php include "page/config.php"; ?>
    </main>



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- Vendor JS Files -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>>
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
  <script>
    // tinymce.init({
    //   selector: '#editor1',
    //   menubar: false,
    //   statusbar: false,
    //   plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
    //   toolbar: 'undo redo h1 h2 bold italic strikethrough blockquote bullist numlist | link image | removeformat fullscreen ',
    //   skin: 'bootstrap',
    //   toolbar_drawer: 'floating',
    //   min_height: 400,
    //   autoresize_bottom_margin: 16,

    // });
    tinymce.init({
      selector: '#editor1',
      menubar: false,
      statusbar: false,
      plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
      toolbar: 'h1 h2 h3 h4 bold italic strikethrough blockquote bullist numlist | link image | removeformat fullscreen ',
      skin: 'bootstrap',
      toolbar_drawer: 'floating',
      min_height: 400,
      autoresize_bottom_margin: 16,
      
    });
  </script>
  <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Tambahkan class "loading" ke body untuk mencegah interaksi selama loading
    document.body.classList.add("loading");

    // Setelah 5 detik, tampilkan konten dan sembunyikan loader
    setTimeout(() => {
      // Sembunyikan loader
      document.getElementById("loader-container").style.display = "none";

      // Tampilkan semua <section>
      document.querySelectorAll("section, header").forEach(section => {
        section.style.visibility = "visible";
        section.style.opacity = "1";
      });

      // Hapus class "loading" dari body
      document.body.classList.remove("loading");
    }, 2000); // Durasi loader dalam milidetik (5 detik)
  });
</script>
</body>

</html>
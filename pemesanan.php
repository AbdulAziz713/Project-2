<?php
// session start
if (!empty($_SESSION)) {
} else {
  session_start();
}
require 'db-connect.php';
if (!isset($_SESSION['role'])) {
  echo '<script>alert("Required Login Authorization!");window.location="login/login.php";</script>';
  exit();
}
$username = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
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
  <body id="page-top">
  <div id="loader-container">
  <div class="loader"></div>
</div>

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a href="#page-top" class="navbar-brand">Irma Wedding</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          Menu
          <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between align-items-center" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
            <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="action.php?act=pesanan">Pesanan</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#services">Pelayanan</a></li>
                <li><a class="dropdown-item" href="#portfolio">Gallery</a></li>
                <li><a class="dropdown-item" href="#about">Tentang Kami</a></li>
                <li><a class="dropdown-item" href="#team">Tim</a></li>
                <li><a class="dropdown-item" href="#contact">Kontak</a></li>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo htmlspecialchars($username); ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" href="action.php?act=rubah-password">Rubah Password</a>
                </li>
                <li>
                  <a class="dropdown-item" href="action.php?act=logout">Log Out</a>
                </li>
              </ul>
            </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navigation -->

  <!-- Paket Start -->
  <section id="package" class="package py-5 page-section bg-secondary">
    <div class="container">
        <div class="heading-text text-center mb-4">
            <h2 class="section-heading text-uppercase text-dark" style="font-family: 'Comic Sans MS', sans-serif; color: #fff; margin-top: 80px">Paket Terbaik Untuk Anda</h2>
        </div>
        <div class="row justify-content-center">
            <?php
            $query = "SELECT * FROM packages ORDER BY id_paket ASC";
            $result = mysqli_query($koneksi, $query);
            if (!$result) {
                die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
            }
            while ($row = mysqli_fetch_assoc($result)) {
                // Pisahkan daftar fitur berdasarkan newline
                $features = explode("\n", $row['packages_list']);
            ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 border-2 shadow-sm">
                        <div class="card-header text-center bg-light">
                            <h5 class="text-uppercase fw-bold text-dark mb-1"><?php echo $row['packages_heading']; ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="price fs-4 fw-bold text-warning text-center"><?php echo $row['packages_price']; ?></p>
                            <button class="btn btn-warning w-100 mb-3 text-white fw-bold">Pilih Paket</button>
                            <div class="body-package">
                                <ul class="list-unstyled">
                                    <?php
                                    // Tampilkan maksimal 10 fitur di halaman
                                    $max_visible_features = 12;
                                    for ($i = 0; $i < count($features) && $i < $max_visible_features; $i++) {
                                        echo html_entity_decode($features[$i]);
                                    }
                                    ?>
                                </ul>
                                <div class="text-center">
                                    <!-- Tombol untuk membuka modal -->
                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalPaket<?php echo $row['id_paket']; ?>">
                                        Detail Paket <i class="fa-solid fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal untuk paket -->
                <div class="modal fade" id="ModalPaket<?php echo $row['id_paket']; ?>" tabindex="-1" aria-labelledby="ModalPaketLabel<?php echo $row['id_paket']; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="ModalPaketLabel<?php echo $row['id_paket']; ?>">
                                    <?php echo $row['packages_heading']; ?>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
    <ul class="list-unstyled">
    <?php echo html_entity_decode($row['packages_list']); ?>
    </ul>
</div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
    <!-- Paket End -->

  <!-- Dekorasi Start -->
  <section id="Dekorasi" class="dekorasi py-5 page-section bg-light">
  <style>
        /* Membatasi ukuran gambar untuk konsistensi */
    .carousel img.dekorasi{
        height: 550px; /* Tinggi default untuk dekorasi */
        width: 100%;
        object-fit: cover; /* Memastikan gambar tidak terdistorsi */
        border-radius: 10px; /* Membuat sudut gambar melengkung */
    }
    </style>
  <div class="container">
    <div class="text-center">
      <h2 class="section-heading text-uppercase text-dark" style="font-family: 'Comic Sans MS', sans-serif; color: #fff; margin-top: 80px">DEKORASI</h2>
    </div>
    <div id="carouselDekorasi" class="carousel slide" data-bs-ride="carousel">
        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row g-3 justify-content-center">
                    <div class="col-md-5">
                        <img class="dekorasi img-fluid" src="assets/img/dekorasi/dekor_1.jpg" alt="dekor1">
                    </div>
                    <div class="col-md-5">
                        <img class="dekorasi img-fluid" src="assets/img/dekorasi/dekor_2.jpg" alt="dekor2">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <img class="dekorasi img-fluid" src="assets/img/dekorasi/dekor_3.jpg" alt="dekor3">
                    </div>
                    <div class="col-md-5">
                        <img class="dekorasi img-fluid" src="assets/img/dekorasi/dekor_4.jpg" alt="dekor4">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <img class="dekorasi img-fluid" src="assets/img/dekorasi/dekor_5.jpg" alt="mua3">
                    </div>
                    <div class="col-md-5">
                        <img class="dekorasi img-fluid" src="assets/img/dekorasi/dekor_6.jpg" alt="dekor3">
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDekorasi" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselDekorasi" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
  </div>
  </section>
  <!-- End Dekorasi -->

    <!-- Makeup Start -->
  <section id="Makeup" class="makeup py-5 page-section bg-light">
  <style>
    /* Gambar dengan class makeup dibuat potret */
    .carousel img.makeup {
        height: 550px; /* Tinggi tetap */
        width: auto; /* Lebar menyesuaikan agar menjadi potret */
        object-fit: cover; /* Pastikan gambar tidak terdistorsi */
        border-radius: 10px; /* Membuat sudut gambar melengkung */
    }

    </style>
  <div class="container">
    <div class="text-center">
      <h2 class="section-heading text-uppercase text-dark" style="font-family: 'Comic Sans MS', sans-serif; color: #fff; margin-top: 80px">MAKEUP</h2>
    </div>
    <div id="carouselMakeup" class="carousel slide" data-bs-ride="carousel">
        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row g-3 justify-content-center">
                    <div class="col-md-4">
                        <img class="makeup img-fluid" src="assets/img/makeup/mua_1.jpg" alt="dekor1">
                    </div>
                    <div class="col-md-4">
                        <img class="makeup img-fluid" src="assets/img/makeup/mua_2.jpg" alt="dekor2">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <img class="makeup img-fluid" src="assets/img/makeup/mua_3.jpg" alt="dekor3">
                    </div>
                    <div class="col-md-4">
                        <img class="makeup img-fluid" src="assets/img/makeup/mua_4.jpg" alt="dekor4">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <img class="makeup img-fluid" src="assets/img/makeup/mua_5.jpg" alt="mua3">
                    </div>
                    <div class="col-md-4">
                        <img class="makeup img-fluid" src="assets/img/makeup/mua_6.jpg" alt="dekor3">
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselMakeup" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselMakeup" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
  </div>
  </section>
  <!-- End Makeup -->

    <!-- Portfolio Grid-->
    <section id="portfolio" class="page-section bg-light">
        <div class="container">
            <div class="text-center">
            <h2 class="section-heading text-uppercase text-dark" style="font-family: 'Comic Sans MS', sans-serif; color: #fff; margin-top: 80px">gallery</h2>
            <h3 class="section-subheading text-muted">
              Sebuah Kenangan yang Terabadikan.
            </h3>
            </div>
            <div class="row">
                <?php
                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                $query = "SELECT * FROM gallery ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);
                //mengecek apakah ada error ketika menjalankan query
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi) .
                        " - " . mysqli_error($koneksi));
                }
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                          <!-- <a class="portfolio-link" data-bs-toggle="modal" href="#PortfolioModal<?php echo $row['id']; ?>">
                            <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                            <i class="fas fa-plus fa-3x"></i>
                            </div>
                            </div>
                            <img src="assets/img/gallery/<?php echo $row['gallery_image']; ?>" alt="..." class="img-fluid">
                          </a> -->
                          <img src="assets/img/gallery/<?php echo $row['gallery_image']; ?>" alt="..." class="img-fluid">
                          <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Pernikahan <?php echo $row['gallery_heading']; ?></div>
                            <div class="portfolio-caption-subheading text-muted">
                              <!-- <?php echo $row['tgl_pernikahan']; ?> -->
                            </div>
                          </div>
                        </div>
                    </div>
                <?php
                    $no++;
                }
                ?>
            </div>
        </div>
    </section>

    <!-- testimonial Start -->
<section class="testimonial text-center py-5 bg-light">
    <div class="container">
        <h2 class="section-heading text-uppercase text-dark" style="font-family: 'Comic Sans MS', sans-serif; color: #fff; margin-top: 80px; margin-bottom: 35px;">Apa Kata Client Kami?</h2>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Wrapper untuk item carousel -->
            <div class="carousel-inner">
                <?php
                // Jalankan query untuk mengambil semua testimonial
                $query = "SELECT * FROM testimonial ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);

                // Mengecek apakah ada error ketika menjalankan query
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
                }

                $items = []; // Array untuk menyimpan data testimonial
                while ($row = mysqli_fetch_assoc($result)) {
                    $items[] = $row; // Simpan data ke array
                }

                // Hitung jumlah testimonial dan buat grup slide
                $isActive = true;
                for ($i = 0; $i < count($items); $i += 2) { ?>
                    <div class="carousel-item <?php echo $isActive ? 'active' : ''; ?>">
                        <div class="row justify-content-center">
                            <?php
                            // Tampilkan 2 testimonial per slide
                            for ($j = $i; $j < $i + 2; $j++) {
                                if (isset($items[$j])) { ?>
                                    <div class="col-md-6">
                                        <div class="card bg-dark border-0 rounded-4 text-center p-4">
                                            <img src="assets/img/testimonial/<?php echo $items[$j]['testi_image']; ?>" alt="Client Image" class="rounded-circle mx-auto mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                                            <blockquote class="blockquote mb-0">
                                                <p class="mb-2"><?php echo $items[$j]['testi_text']; ?></p>
                                                <footer class="blockquote-footer text-light"><cite title="<?php echo $items[$j]['testi_client']; ?>"><?php echo $items[$j]['testi_client']; ?></cite></footer>
                                            </blockquote>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                    <?php $isActive = false;
                } ?>
            </div>
        </div>
    </div>
</section>
<!-- testimonial End -->

    <!-- Team-->
    <section class="page-section bg-light" id="team">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase text-dark" style="font-family: 'Comic Sans MS', sans-serif; color: #fff; margin-top: 80px">Our Amazing Team</h2>
          <h3 class="section-subheading text-muted">
            Lorem ipsum dolor sit amet consectetur.
          </h3>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="team-member">
              <img
                class="mx-auto rounded-circle"
                src="landing-page/assets/img/team/1.jpg"
                alt="..."
              />
              <h4>Abdul Aziz</h4>
              <p class="text-muted">Full Stack Developer</p>
              <a
                class="btn btn-dark btn-social mx-2"
                href="https://instagram.com/4doel_aziz" target="_blank"
                aria-label="Parveen Anand Twitter Profile"
                ><i class="fab fa-instagram"></i
              ></a>
              <a
                class="btn btn-dark btn-social mx-2"
                href="https://web.facebook.com/profile.php?id=100014337487034" target="_blank"
                aria-label="Parveen Anand Facebook Profile"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a
                class="btn btn-dark btn-social mx-2"
                href="https://www.linkedin.com/in/abdul-aziz-29925021a/" target="_blank"
                aria-label="Parveen Anand LinkedIn Profile"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="team-member">
              <img
                class="mx-auto rounded-circle"
                src="landing-page/assets/img/team/2.jpg"
                alt="..."
              />
              <h4>Lulu Latifah Nurhafsyah</h4>
              <p class="text-muted">Marketing</p>
              <a
                class="btn btn-dark btn-social mx-2"
                href="#!"
                aria-label="Diana Petersen Twitter Profile"
                ><i class="fab fa-twitter"></i
              ></a>
              <a
                class="btn btn-dark btn-social mx-2"
                href="#!"
                aria-label="Diana Petersen Facebook Profile"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a
                class="btn btn-dark btn-social mx-2"
                href="#!"
                aria-label="Diana Petersen LinkedIn Profile"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="team-member">
              <img
                class="mx-auto rounded-circle"
                src="landing-page/assets/img/team/3.jpg"
                alt="..."
              />
              <h4>Siti Aisah</h4>
              <p class="text-muted">Designer</p>
              <a
                class="btn btn-dark btn-social mx-2"
                href="#!"
                aria-label="Larry Parker Twitter Profile"
                ><i class="fab fa-twitter"></i
              ></a>
              <a
                class="btn btn-dark btn-social mx-2"
                href="#!"
                aria-label="Larry Parker Facebook Profile"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a
                class="btn btn-dark btn-social mx-2"
                href="#!"
                aria-label="Larry Parker LinkedIn Profile"
                ><i class="fab fa-linkedin-in"></i
              ></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut
              eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam
              corporis ea, alias ut unde.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Clients-->
    <!-- <div class="py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-3 col-sm-6 my-3">
            <a href="#!"
              ><img
                class="img-fluid img-brand d-block mx-auto"
                src="landing-page/assets/img/logos/microsoft.svg"
                alt="..."
                aria-label="Microsoft Logo"
            /></a>
          </div>
          <div class="col-md-3 col-sm-6 my-3">
            <a href="#!"
              ><img
                class="img-fluid img-brand d-block mx-auto"
                src="landing-page/assets/img/logos/google.svg"
                alt="..."
                aria-label="Google Logo"
            /></a>
          </div>
          <div class="col-md-3 col-sm-6 my-3">
            <a href="#!"
              ><img
                class="img-fluid img-brand d-block mx-auto"
                src="landing-page/assets/img/logos/facebook.svg"
                alt="..."
                aria-label="Facebook Logo"
            /></a>
          </div>
          <div class="col-md-3 col-sm-6 my-3">
            <a href="#!"
              ><img
                class="img-fluid img-brand d-block mx-auto"
                src="landing-page/assets/img/logos/ibm.svg"
                alt="..."
                aria-label="IBM Logo"
            /></a>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Contact-->
<section class="page-section bg-dark" id="contact">
  <div class="container">
    <div class="text-center">
      <h2 class="section-heading text-uppercase text-light" style="font-family: 'Comic Sans MS', sans-serif; color: #fff; margin-top: 80px">Contact Us</h2>
      <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.<br></h3>
      <form id="contactForm" method="POST">
        <div class="row align-items-stretch mb-5">
          <div class="col-md-6">
            <div class="form-group">
              <!-- Name input -->
              <label for="contact_name" class="form-label">Name</label>
              <input type="text" class="form-control" id="contact_name" placeholder="Masukan nama anda" name="contact_name" required>
            </div>
            <div class="form-group">
              <!-- Email address input -->
              <label for="contact_email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="contact_email" placeholder="Masukan email anda" name="contact_email" required>
            </div>
            <div class="form-group mb-md-0">
              <!-- Phone number input -->
              <label for="telepon" class="form-label">Phone</label>
              <input type="text" class="form-control" id="telepon" placeholder="Masukan nomor telepon anda" name="telepon" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group form-group-textarea mb-md-0">
              <!-- Message input -->
              <label for="contact_message" class="form-label">Message</label>
              <textarea class="form-control" id="contact_message" placeholder="Masukan pesan" name="contact_message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
          </div>
        </div>
      </form>
    </div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['contact_name'], $_POST['contact_email'], $_POST['telepon'], $_POST['contact_message'])) {
        $contact_date = date('Y-m-d H:i:s');
        $contact_name = htmlspecialchars($_POST['contact_name']);
        $contact_email = htmlspecialchars($_POST['contact_email']);
        $telepon = htmlspecialchars($_POST['telepon']);
        $contact_message = htmlspecialchars($_POST['contact_message']);

        $query = mysqli_query($koneksi, "INSERT INTO contact(contact_date, contact_name, contact_email, telepon, contact_message) VALUES ('$contact_date', '$contact_name', '$contact_email', '$telepon', '$contact_message')");

        if ($query) {
          echo '<script>window.location = "index.php?pesan=success#contact";</script>';
          echo '<script>alert("Pesan Berhasil Terkirim :)")</script>';
        } else {
          header("location:index.php#contact");
        }
    }
}
?>
  </div>
</section>


     <!-- Footer Start -->
    <footer class="footer py-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-4 text-lg-start">
              <p>
              created by
              <a href="https://www.instagram.com/4doel_aziz" target="_blank"
                >Abdul Aziz</a
              >
              | &copy; 2023 Politeknik Negeri Subang. All rights reserved.
            </p>
          </div>
          <div class="col-lg-4 my-3 my-lg-0">
            <a
              class="btn btn-dark btn-social mx-2"
              href="https://www.instagram.com/politekniknegerisubang/"
              target="_blank"
              ><i class="fab fa-instagram"></i
            ></a>
            <a
              class="btn btn-dark btn-social mx-2"
              href="https://polsub.ac.id/" target="_blank"
              ><i class="fab fa-linkedin"></i
            ></a>
            <a
              class="btn btn-dark btn-social mx-2" 
              href="https://web.facebook.com/polsubofficial" target="_blank"
              ><i class="fab fa-facebook"></i
              ></a>
            <a
              class="btn btn-dark btn-social mx-2"
              href="https://api.whatsapp.com/send/?phone=6281111112851&text&type=phone_number&app_absent=0"
              target="_blank"
              ><i class="fab fa-whatsapp"></i
            ></a>
          </div>
          <div class="col-lg-4 text-lg-end">
            <a class="link-dark text-decoration-none me-3" href="#!"
              >Privacy Policy</a
            >
            <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer End -->
    <!-- Portfolio Modals-->
    <!-- <?php
$query = "SELECT * FROM gallery ORDER BY id ASC";
$result = mysqli_query($koneksi, $query);
if (!$result) {
    die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
}
while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="portfolio-modal modal fade" id="PortfolioModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-bs-dismiss="modal">
                    <img src="assets/img/close-icon.svg" alt="Close modal" />
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-lg-8">
                        <div class="modal-body">
                          <h2 class="text-uppercase">Detail Pernikahan</h2>
                          <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                          <img src="assets/img/gallery/<?php echo $row['gallery_image']; ?>" alt="..." class="img-fluid d-block mx-auto">
                          <ul class="list-inline">
                            <li>
                              <?php echo $row['gallery_heading']; ?>
                            </li>
                            <li>
                              <?php echo $row['tgl_pernikahan']; ?>
                            </li>
                          </ul>
                          <p><?php echo $row['gallery_text']; ?></p>
                          <button
                            class="btn btn-primary btn-xl text-uppercase"
                            data-bs-dismiss="modal"
                            type="button"
                          >
                            <i class="fas fa-xmark me-1"></i>
                            Close Project
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php
                  $no++;
              }
              ?>
            </div>
        </div>
    </div> -->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="landing-page/js/scripts.js"></script>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Tambahkan class "loading" ke body untuk mencegah interaksi selama loading
    document.body.classList.add("loading");

    // Setelah 5 detik, tampilkan konten dan sembunyikan loader
    setTimeout(() => {
      // Sembunyikan loader
      document.getElementById("loader-container").style.display = "none";

      // Tampilkan semua <section>
      document.querySelectorAll("section").forEach(section => {
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

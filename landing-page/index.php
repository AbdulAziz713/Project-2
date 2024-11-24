<?php
// session start
if (!empty($_SESSION)) {
} else {
  session_start();
}
require '../db-connect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
      /* Pastikan carousel-indicators tidak menempel */
.carousel-indicators {
    position: relative; /* Tetap relatif terhadap container */
    bottom: -30px; /* Turunkan indikator ke bawah */
    margin-top: 20px; /* Tambahkan margin untuk berjaga */
    display: flex;
    justify-content: center;
    gap: 15px; /* Jarak antar indikator */
}

/* Tampilan tombol indikator */
.carousel-indicators button {
    background-color: #fff; /* Warna indikator normal */
    width: 40px; /* Lebar indikator */
    height: 5px; /* Tinggi indikator */
    border: none; /* Hilangkan border */
    border-radius: 10px; /* Bentuk indikator menjadi oval */
    opacity: 0.5; /* Transparansi default */
    transition: opacity 0.3s, background-color 0.3s;
}

/* Tombol aktif */
.carousel-indicators button.active {
    background-color: #ff007f; /* Warna aktif (pink) */
    opacity: 1; /* Transparansi penuh */
}

    </style>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Irma Wedding</title>
    
    <!-- Carousel -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body id="page-top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a href="#page-top" class="navbar-brand">Irma <span>Wedding</span></a>
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
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#services">Pelayanan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">Tentang Kami</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#team">Tim</a></li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Kontak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../login/login.php">Log In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
      <div class="container">
        <div class="masthead-heading">Selamat Datang di Irma Wedding!</div>
        <div class="masthead-subheading">Tempat dimana anda akan merayakan pernikahan</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="../login/login.php"
          >Pesan Sekarang!</a
        >
      </div>
    </header>

    <!-- Services-->
    <section id="services" class="page-section">
        <div class="container">
            <div class="text-center">
            <h2 class="section-heading text-uppercase">Pelayanan</h2>
            <h3 class="section-subheading text-muted">
            Irma Wedding menawarkan rangkaian lengkap layanan pernikahan, mulai dari dekorasi elegan, tata rias pengantin profesional, hingga fotografi dan videografi untuk mengabadikan momen spesial Anda. Kami juga menawarkan persewaan gaun pengantin dan jaket, serta paket pernikahan yang sesuai dengan kebutuhan dan budget pasangan. Pelayanan Irma Wedding yang personal dan penuh perhatian memastikan setiap elemen pernikahan Anda berjalan lancar dan menciptakan kenangan yang tak terlupakan.
            </h3>
            </div>
            <div class="row justify-content-center text-center">
                <?php
                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                $query = "SELECT * FROM features ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);
                //mengecek apakah ada error ketika menjalankan query
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi) .
                        " - " . mysqli_error($koneksi));
                }
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="features-item col-md-4 text-center">
                      <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary <?php echo $row['features_icon']; ?>"></i>
                      </span>
                      <h5 class="my-3"><?php echo $row['features_name']; ?></h5>
                      <p class="text-muted">
                      <?php echo $row['description']; ?>
                      </p>
                    </div>

                <?php
                    $no++;
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid-->
    <section id="portfolio" class="page-section bg-light">
        <div class="container">
            <div class="text-center">
            <h2 class="section-heading text-uppercase">gallery</h2>
            <h3 class="section-subheading text-muted">
              Lorem ipsum dolor sit amet consectetur.
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
                            <img src="../assets/img/gallery/<?php echo $row['gallery_image']; ?>" alt="..." class="img-fluid">
                          </a> -->
                          <img src="../assets/img/gallery/<?php echo $row['gallery_image']; ?>" alt="..." class="img-fluid">
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
<section class="page-section" id="testimonials">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase" style="font-family: 'Comic Sans MS', sans-serif;">Apa Kata Pelanggan Kami?</h2>
        <div id="testimonialCarousel" class="row justify-content-center text-center carousel slide" data-bs-ride="carousel">
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
                                        <div class="card bg-secondary border-0 rounded-4 text-center p-4">
                                            <img src="../assets/img/testimonial/<?php echo $items[$j]['testi_image']; ?>" alt="Client Image" class="rounded-circle mx-auto mb-3" style="width: 100px; height: 100px; object-fit: cover;">
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
    </div>
</section>
<!-- testimonial End -->

    <!-- About-->
    <section id="about" class="about">
        <div class="container">
            <?php
            // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
            $query = "SELECT * FROM about ORDER BY id ASC";
            $result = mysqli_query($koneksi, $query);
            //mengecek apakah ada error ketika menjalankan query
            if (!$result) {
                die("Query Error: " . mysqli_errno($koneksi) .
                    " - " . mysqli_error($koneksi));
            }
            $row = mysqli_fetch_assoc($result)
            ?>
            <div class="about-content">
                <div class="text-center mb-4">
                    <h4><?php echo $row['about_heading']; ?></h4>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col">
                        <p><?php echo $row['about_text']; ?></p>
                        <a href="about.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Know More <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">About Us</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <section class="page-section" id="about">
      <div class="container">
        <ul class="timeline">
          <li>
            <div class="timeline-image">
              <img
                class="rounded-circle img-fluid"
                src="assets/img/about/1.jpg"
                alt="..."
              />
            </div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4>2009-2011</h4>
                <h4 class="subheading">Our Humble Beginnings</h4>
              </div>
              <div class="timeline-body">
                <p class="text-muted">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt
                  ut voluptatum eius sapiente, totam reiciendis temporibus qui
                  quibusdam, recusandae sit vero unde, sed, incidunt et ea quo
                  dolore laudantium consectetur!
                </p>
              </div>
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-image">
              <img
                class="rounded-circle img-fluid"
                src="assets/img/about/2.jpg"
                alt="..."
              />
            </div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4>March 2011</h4>
                <h4 class="subheading">An Agency is Born</h4>
              </div>
              <div class="timeline-body">
                <p class="text-muted">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt
                  ut voluptatum eius sapiente, totam reiciendis temporibus qui
                  quibusdam, recusandae sit vero unde, sed, incidunt et ea quo
                  dolore laudantium consectetur!
                </p>
              </div>
            </div>
          </li>
          <li>
            <div class="timeline-image">
              <img
                class="rounded-circle img-fluid"
                src="assets/img/about/3.jpg"
                alt="..."
              />
            </div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4>December 2015</h4>
                <h4 class="subheading">Transition to Full Service</h4>
              </div>
              <div class="timeline-body">
                <p class="text-muted">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt
                  ut voluptatum eius sapiente, totam reiciendis temporibus qui
                  quibusdam, recusandae sit vero unde, sed, incidunt et ea quo
                  dolore laudantium consectetur!
                </p>
              </div>
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-image">
              <img
                class="rounded-circle img-fluid"
                src="assets/img/about/4.jpg"
                alt="..."
              />
            </div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4>July 2020</h4>
                <h4 class="subheading">Phase Two Expansion</h4>
              </div>
              <div class="timeline-body">
                <p class="text-muted">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt
                  ut voluptatum eius sapiente, totam reiciendis temporibus qui
                  quibusdam, recusandae sit vero unde, sed, incidunt et ea quo
                  dolore laudantium consectetur!
                </p>
              </div>
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-image">
              <h4>
                Be Part
                <br />
                Of Our
                <br />
                Story!
              </h4>
            </div>
          </li>
        </ul>
      </div>
    </section>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        </div>
    </section>
 
    <!-- Team-->
    <section class="page-section bg-light" id="team">
      <div class="container">
        <div class="text-center">
          <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
          <h3 class="section-subheading text-muted">
            Lorem ipsum dolor sit amet consectetur.
          </h3>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="team-member">
              <img
                class="mx-auto rounded-circle"
                src="assets/img/team/1.jpg"
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
                src="assets/img/team/2.jpg"
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
                src="assets/img/team/3.jpg"
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
                src="assets/img/logos/microsoft.svg"
                alt="..."
                aria-label="Microsoft Logo"
            /></a>
          </div>
          <div class="col-md-3 col-sm-6 my-3">
            <a href="#!"
              ><img
                class="img-fluid img-brand d-block mx-auto"
                src="assets/img/logos/google.svg"
                alt="..."
                aria-label="Google Logo"
            /></a>
          </div>
          <div class="col-md-3 col-sm-6 my-3">
            <a href="#!"
              ><img
                class="img-fluid img-brand d-block mx-auto"
                src="assets/img/logos/facebook.svg"
                alt="..."
                aria-label="Facebook Logo"
            /></a>
          </div>
          <div class="col-md-3 col-sm-6 my-3">
            <a href="#!"
              ><img
                class="img-fluid img-brand d-block mx-auto"
                src="assets/img/logos/ibm.svg"
                alt="..."
                aria-label="IBM Logo"
            /></a>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Contact-->
<section class="page-section" id="contact">
  <div class="container">
    <div class="text-center">
      <h2 class="section-heading text-uppercase">Contact Us</h2>
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
              ><i class="fab fa-google"></i
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
                          <img src="../assets/img/gallery/<?php echo $row['gallery_image']; ?>" alt="..." class="img-fluid d-block mx-auto">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

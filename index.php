<?php
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
require 'db-connect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/logo/polsub.png" />
    <title>Wedding Organizer</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Alpine JS -->
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>

    <!-- App -->
    <script src="src/app.js"></script>
  </head>

  <body>
    <!-- Navbar Start -->
    <nav class="navbar">
      <a href="#" class="navbar-logo">Wedding <span>Organizer</span></a>

      <div class="navbar-nav">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#products">Product</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="navbar-extra">
        <a href="#" id="search-button"><i data-feather="search"></i></a>
        <a href="#" id="shopping-cart-button"
          ><i data-feather="shopping-cart"></i
        ></a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        <a href="index.html" class="logout-button"
          ><i data-feather="log-out"></i
        ></a>
      </div>

      <!-- Search Form Start -->
      <div class="search-form">
        <input type="search" id="search-box" placeholder="Search here..." />
        <label for="search-box"><i data-feather="search"></i></label>
      </div>
      <!-- Search Form End -->

      <!-- Shopping Cart Start -->
      <div class="shopping-cart">
        <div class="cart-item">
          <img src="img/products/product1.jpg" alt="Product1" />
          <div class="item-detail">
            <h3>Product1</h3>
            <div class="item-price">IDR 30K</div>
          </div>
          <i data-feather="trash-2" class="remove-item"></i>
        </div>
        <div class="cart-item">
          <img src="img/products/product1.jpg" alt="Product2" />
          <div class="item-detail">
            <h3>Product1</h3>
            <div class="item-price">IDR 30K</div>
          </div>
          <i data-feather="trash-2" class="remove-item"></i>
        </div>
        <div class="cart-item">
          <img src="img/products/product1.jpg" alt="Product3" />
          <div class="item-detail">
            <h3>Product1</h3>
            <div class="item-price">IDR 30K</div>
          </div>
          <i data-feather="trash-2" class="remove-item"></i>
        </div>
      </div>
      <!-- Shopping Cart End -->
    </nav>
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <section class="hero" id="home">
      <main class="content">
        <h1>Selamat Datang di <span>Wedding Organizer</span></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <a href="#" class="cta">Selengkapnya</a>
      </main>
    </section>
    <!-- Hero Section End -->

    <!-- About Section  Start -->
    <section id="about" class="about">
      <h2><span>Tentang </span>Kami</h2>

      <div class="row">
        <div class="about-img">
          <img src="img/tentang-kami.jpg" alt="Tentang Kami" />
        </div>
        <div class="content">
          <h3>Kenapa Memilih Kami?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ipsam
            veritatis doloribus impedit voluptates nemo?
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ab qui
            laboriosam magni alias, sed porro fugit tempore exercitationem
            corrupti?
          </p>
        </div>
      </div>
    </section>
    <!-- About Section  End -->

    <!-- Products Section Start  -->
    <section id="products" class="products">
      <h2><span>Produk Unggulan </span>Kami</h2>
      <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deserunt quia
        doloremque fugiat expedita quaerat reiciendis?
      </p>

      <div class="row">
        <div class="product-card">
          <div class="product-icons">
            <a href="#" class="item-detail-button"
              ><i data-feather="eye"></i
            ></a>
          </div>
          <div class="product-image">
            <img src="img/products/product1.jpg" alt="Product1" />
          </div>
          <div class="product-content">
            <h3>Book 1</h3>
            <div class="product-stars">
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">IDR 50K <span>IDR 100K</span></div>
          </div>
          <div class="pesan">
            <a href="pemesanan.html" class="cta">Pesan Sekarang</a>
          </div>
        </div>
        <div class="product-card">
          <div class="product-icons">
            <a href="#" class="item-detail-button"
              ><i data-feather="eye"></i
            ></a>
          </div>
          <div class="product-image">
            <img src="img/products/product1.jpg" alt="Product2" />
          </div>
          <div class="product-content">
            <h3>Book 2</h3>
            <div class="product-stars">
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">IDR 50K <span>IDR 100K</span></div>
          </div>
          <div class="pesan">
            <a href="pemesanan.html" class="cta">Pesan Sekarang</a>
          </div>
        </div>
        <div class="product-card">
          <div class="product-icons">
            <a href="#" class="item-detail-button"
              ><i data-feather="eye"></i
            ></a>
          </div>
          <div class="product-image">
            <img src="img/products/product1.jpg" alt="Product3" />
          </div>
          <div class="product-content">
            <h3>Book 3</h3>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">IDR 50K <span>IDR 100K</span></div>
          </div>
          <div class="pesan">
            <a href="pemesanan.html" class="cta">Pesan Sekarang</a>
          </div>
        </div>
        <div class="product-card">
          <div class="product-icons">
            <a href="#" class="item-detail-button"
              ><i data-feather="eye"></i
            ></a>
          </div>
          <div class="product-image">
            <img src="img/products/product1.jpg" alt="Product4" />
          </div>
          <div class="product-content">
            <h3>Book 4</h3>
            <div class="product-stars">
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">IDR 50K <span>IDR 100K</span></div>
          </div>
          <div class="pesan">
            <a href="pemesanan.html" class="cta">Pesan Sekarang</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Products Section End  -->

    <!-- Contact Section Start -->
    <section id="contact" class="contact">
      <h2><span>Kontak </span>Kami</h2>
      <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam, sint?
      </p>

      <div class="row">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4939.078498990339!2d107.82527247591773!3d-6.565870364187204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693b9ae39cc0eb%3A0x76db7b3959df2011!2sPoliteknik%20Negeri%20Subang%2C%20Kampus%20Utama%20Cibogo!5e1!3m2!1sid!2sid!4v1728287150738!5m2!1sid!2sid"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="map"
        ></iframe>

        <form action="">
          <div class="input-group">
            <i data-feather="user"></i>
            <input type="text" placeholder="nama" />
          </div>
          <div class="input-group">
            <i data-feather="mail"></i>
            <input type="text" placeholder="email" />
          </div>
          <div class="input-group">
            <i data-feather="phone"></i>
            <input type="text" placeholder="no hp" />
          </div>
          <button type="submit" class="btn">Kirim Pesan</button>
        </form>
      </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Start -->
    <footer>
      <div class="socials">
        <a
          href="https://www.instagram.com/politekniknegerisubang/"
          target="_blank"
          ><i data-feather="instagram"></i
        ></a>
        <a href="https://polsub.ac.id/" target="_blank"
          ><i data-feather="globe"></i
        ></a>
        <a href="https://web.facebook.com/polsubofficial" target="_blank"
          ><i data-feather="facebook"></i
        ></a>
        <a
          href="https://api.whatsapp.com/send/?phone=6281111112851&text&type=phone_number&app_absent=0"
          target="_blank"
          ><i data-feather="phone"></i
        ></a>
      </div>

      <div class="links">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#products">Product</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="credit">
        <p>
          created by
          <a href="https://www.instagram.com/4doel_aziz" target="_blank"
            >Abdul Aziz</a
          >
          | &copy; 2023 Politeknik Negeri Subang. All rights reserved.
        </p>
      </div>
    </footer>
    <!-- Footer End -->

    <!-- Modal Box Item Detail Start -->
    <div class="modal" id="item-detail-modal">
      <div class="modal-container">
        <a href="#" class="close-icon"><i data-feather="x"></i></a>
        <div class="modal-content">
          <img src="img/products/product1.jpg" alt="Product1" />
          <div class="product-content">
            <h3>Product 1</h3>
            <p>
              Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel sed
              soluta consequuntur magnam ipsam? Laboriosam enim quia quis optio
              nam culpa quisquam beatae voluptatum suscipit?
            </p>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">IDR 50K <span>IDR 100K</span></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Box Item Detail End -->

    <!-- Feather Icons -->
    <script>
      feather.replace();
    </script>

    <!-- My JavaScript -->
    <script src="js/script.js"></script>
  </body>
</html>

<?php
// session start
if (!empty($_SESSION)) {
} else {
  session_start();
}
require '../db-connect.php';
if (!isset($_SESSION['role'])) {
  echo '<script>alert("Required Login Authorization!");window.location="../login.php";</script>';
  exit();
}
$username = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo htmlspecialchars($username); ?> - Irma Wedding</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <script
      src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
      crossorigin="anonymous"
    ></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="TemplatesJungle">
  <meta name="keywords" content="Online Store">
  <meta name="description" content="Stylish - Shoes Online Store HTML Template">

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
    <link href="../landing-page/css/styles.css" rel="stylesheet" />
</head>

<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a href="#" class="navbar-brand">Irma <span>Wedding</span></a>
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
              <a class="nav-link" href="#about">Shop</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#team">Sale</a></li>
            <li class="nav-item dropdown">
            <a class="nav-link me-5 dropdown-toggle border-0" href="#" data-bs-toggle="dropdown" aria-expanded="false">Page</a>

              <ul class="dropdown-menu fw-bold">
                <li><a href="../index.php" class="dropdown-item">Home</a></li>
                <li><a class="dropdown-item" href="../index.php#services">Pelayanan</a></li>
                <li><a class="dropdown-item" href="../index.php#portfolio">Gallery</a></li>
                <li><a class="dropdown-item" href="../index.php#about">Tentang Kami</a></li>
                <li><a class="dropdown-item" href="../index.php#team">Tim</a></li>
                <li><a class="dropdown-item" href="../index.php#contact">Kontak</a></li>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    <?php echo htmlspecialchars($username); ?>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a href="#" data-bs-toggle="modal" data-bs-target="#modallong" class="dropdown-item">Pesanan</a>
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
  <!-- quick view -->
  <div class="modal fade" id="modaltoggle" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col-lg-12 col-md-12 me-3">
            <div class="image-holder">
              <img src="images/summary-item1.jpg" alt="Shoes">
            </div>
          </div>
          <div class="col-lg-12 col-md-12">
            <div class="summary">
              <div class="summary-content fs-6">
                <div class="product-header d-flex justify-content-between mt-4">
                  <h3 class="display-7">Running Shoes For Men</h3>
                  <div class="modal-close-btn">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                </div>
                <span class="product-price fs-3">$99</span>
                <div class="product-details">
                  <p class="fs-7">Buy good shoes and a good mattress, because when you're not in one you're in the
                    other. With four pairs of shoes, I can travel the world.</p>
                </div>
                <ul class="select">
                  <li>
                    <strong>Colour Shown:</strong> Red, White, Black
                  </li>
                  <li>
                    <strong>Style:</strong> SM3018-100
                  </li>
                </ul>
                <div class="variations-form shopify-cart">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="quantity d-flex pb-4">
                        <div
                          class="qty-number align-top qty-number-plus d-flex justify-content-center align-items-center text-center">
                          <span class="increase-qty plus">
                            <svg class="plus">
                              <use xlink:href="#plus"></use>
                            </svg>
                          </span>
                        </div>
                        <input type="number" id="quantity_001" class="input-text text-center" step="1" min="1" name="quantity" value="1" title="Qty">
                        <div
                          class="qty-number qty-number-minus d-flex justify-content-center align-items-center text-center">
                          <span class="increase-qty minus">
                            <svg class="minus">
                              <use xlink:href="#minus"></use>
                            </svg>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <a rel="nofollow" data-no-instant="" href="#" class="out-stock button">Out of stock</a>
                      <button type="submit" class="btn btn-medium btn-black hvr-sweep-to-right">Add to cart</button>
                    </div>
                  </div>
                </div>
                <!-- variations-form -->
                <div class="categories d-flex flex-wrap pt-3">
                  <strong class="pe-2">Categories:</strong>
                  <a href="#" title="categories">Clothing,</a>
                  <a href="#" title="categories">Men's Clothes,</a>
                  <a href="#" title="categories">Tops & T-Shirts</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / quick view -->

  <div class="modal fade" id="modallong" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title fs-5">Cart</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="shopping-cart">
            <div class="shopping-cart-content">
              <div class="mini-cart cart-list p-0 mt-3">
                <div class="mini-cart-item d-flex border-bottom pb-3">
                  <div class="col-lg-2 col-md-3 col-sm-2 me-4">
                    <a href="#" title="product-image">
                      <img src="images/single-product-thumb1.jpg" class="img-fluid" alt="single-product-item">
                    </a>
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-8">
                    <div class="product-header d-flex justify-content-between align-items-center mb-3">
                      <h4 class="product-title fs-6 me-5">Sport Shoes For Men</h4>
                      <a href="" class="remove" aria-label="Remove this item" data-product_id="11913"
                        data-cart_item_key="abc" data-product_sku="">
                        <svg class="close">
                          <use xlink:href="#close"></use>
                        </svg>
                      </a>
                    </div>
                    <div class="quantity-price d-flex justify-content-between align-items-center">
                      <div class="input-group product-qty">
                        <button type="button"
                          class="quantity-left-minus btn btn-light rounded-0 rounded-start btn-number"
                          data-type="minus">
                          <svg width="16" height="16">
                            <use xlink:href="#minus"></use>
                          </svg>
                        </button>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <button type="button" class="quantity-right-plus btn btn-light rounded-0 rounded-end btn-number"
                          data-type="plus">
                          <svg width="16" height="16">
                            <use xlink:href="#plus"></use>
                          </svg>
                        </button>
                      </div>
                      <div class="price-code">
                        <span class="product-price fs-6">$99</span>
                      </div>
                    </div>
                    <!-- quantity-price -->
                  </div>
                </div>
              </div>
              <div class="mini-cart cart-list p-0 mt-3">
                <div class="mini-cart-item d-flex border-bottom pb-3">
                  <div class="col-lg-2 col-md-3 col-sm-2 me-4">
                    <a href="#" title="product-image">
                      <img src="images/single-product-thumb2.jpg" class="img-fluid" alt="single-product-item">
                    </a>
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-8">
                    <div class="product-header d-flex justify-content-between align-items-center mb-3">
                      <h4 class="product-title fs-6 me-5">Brand Shoes For Men</h4>
                      <a href="" class="remove" aria-label="Remove this item" data-product_id="11913"
                        data-cart_item_key="abc" data-product_sku="">
                        <svg class="close">
                          <use xlink:href="#close"></use>
                        </svg>
                      </a>
                    </div>
                    <div class="quantity-price d-flex justify-content-between align-items-center">
                      <div class="input-group product-qty">
                        <button type="button"
                          class="quantity-left-minus btn btn-light rounded-0 rounded-start btn-number"
                          data-type="minus">
                          <svg width="16" height="16">
                            <use xlink:href="#minus"></use>
                          </svg>
                        </button>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <button type="button" class="quantity-right-plus btn btn-light rounded-0 rounded-end btn-number"
                          data-type="plus">
                          <svg width="16" height="16">
                            <use xlink:href="#plus"></use>
                          </svg>
                        </button>
                      </div>
                      <div class="price-code">
                        <span class="product-price fs-6">$99</span>
                      </div>
                    </div>
                    <!-- quantity-price -->
                  </div>
                </div>
              </div>
              <!-- cart-list -->
              <div class="mini-cart-total d-flex justify-content-between py-4">
                <span class="fs-6">Subtotal:</span>
                <span class="special-price-code">
                  <span class="price-amount amount fs-6" style="opacity: 1;">
                    <bdi>
                      <span class="price-currency-symbol">$</span>198.00 </bdi>
                  </span>
                </span>
              </div>
              <div class="modal-footer my-4 justify-content-center">
                <button type="button"
                  class="btn btn-outline-gray hvr-sweep-to-right dark-sweep">Checkout</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- cart view -->

  <section id="intro" class="position-relative mt-4">
    <div class="container-lg">
      <div class="swiper main-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="card d-flex flex-row align-items-end border-0 large jarallax-keep-img">
              <img src="images/card-image1.jpg" alt="shoes" class="img-fluid jarallax-img">
              <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                <h2 class="card-title display-3 light">Stylish shoes for Women</h2>
                <a href="index.html"
                  class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="row g-4">
              <div class="col-lg-12 mb-4">
                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                  <img src="images/card-image2.jpg" alt="shoes" class="img-fluid jarallax-img">
                  <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                    <h2 class="card-title style-2 display-4 light">Sports Wear</h2>
                    <a href="index.html"
                      class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                  <img src="images/card-image3.jpg" alt="shoes" class="img-fluid jarallax-img">
                  <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                    <h2 class="card-title style-2 display-4 light">Fashion Shoes</h2>
                    <a href="index.html"
                      class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="card d-flex flex-row align-items-end border-0 large jarallax-keep-img">
              <img src="images/card-image4.jpg" alt="shoes" class="img-fluid jarallax-img">
              <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                <h2 class="card-title display-3 light">Stylish shoes for men</h2>
                <a href="index.html"
                  class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="row g-4">
              <div class="col-lg-12 mb-4">
                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                  <img src="images/card-image5.jpg" alt="shoes" class="img-fluid jarallax-img">
                  <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                    <h2 class="card-title style-2 display-4 light">Men Shoes</h2>
                    <a href="index.html"
                      class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                  <img src="images/card-image6.jpg" alt="shoes" class="img-fluid jarallax-img">
                  <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                    <h2 class="card-title style-2 display-4 light">Women Shoes</h2>
                    <a href="index.html"
                      class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>
  <section class="discount-coupon py-2 my-2 py-md-5 my-md-5">
    <div class="container">
      <div class="bg-gray coupon position-relative p-5">
        <div class="bold-text position-absolute">10% OFF</div>
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-7 col-md-12 mb-3">
            <div class="coupon-header">
              <h2 class="display-7">10% OFF Discount Coupons</h2>
              <p class="m-0">Subscribe us to get 10% OFF on all the purchases</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-12">
            <div class="btn-wrap">
              <a href="#" class="btn btn-black btn-medium text-uppercase hvr-sweep-to-right">Email me</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="featured-products" class="product-store">
    <div class="container-md">
      <div class="display-header d-flex align-items-center justify-content-between">
        <h2 class="section-title text-uppercase">PAKET YANG TERSEDIA</h2>
        <div class="btn-right">
          <a href="index.html" class="d-inline-block text-uppercase text-hover fw-bold">View all</a>
        </div>
      </div>
      <div class="container">
            <div class="heading-text text-center mb-4">
                <p class="text-p">&#128184; Pilih Paket Agar Lebih Hemat</p>
                <h4>Pilihan Paket Terbaik Untuk Anda</h4>
            </div>
            <div class="row justify-content-center">
                <?php
                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                $query = "SELECT * FROM packages ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);
                //mengecek apakah ada error ketika menjalankan query
                if (!$result) {
                    die("Query Error: " . mysqli_errno($koneksi) .
                        " - " . mysqli_error($koneksi));
                }
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="package-item col-md-3">
                        <div class="head-package text-center">
                            <h4 class="text-uppercase mb-1"><?php echo $row['packages_heading']; ?></h4>
                            <p class="price fs-2 fw-semibold"><?php echo $row['packages_price']; ?></p>
                            <br>
                        </div>
                        <div class="body-package">
                            <?php echo $row['packages_list']; ?>
                            <div class="text-center">
                                <a href="" class="second-btn">See Detail Package</a>
                            </div>
                        </div>
                    </div>

                <?php
                    $no++;
                }
                ?>



            </div>
        </div>
    </div>
  </section>
  <section id="collection-products" class="py-2 my-2 py-md-5 my-md-5">
    <div class="container-md">
      <div class="row">
        <div class="col-lg-6 col-md-6 mb-4">
          <div class="collection-card card border-0 d-flex flex-row align-items-end jarallax-keep-img">
            <img src="images/collection-item1.jpg" alt="product-item" class="border-rounded-10 img-fluid jarallax-img">
            <div class="card-detail p-3 m-3 p-lg-5 m-lg-5">
              <h3 class="card-title display-3">
                <a href="#">Minimal Collection</a>
              </h3>
              <a href="index.html" class="text-uppercase mt-3 d-inline-block text-hover fw-bold">Shop Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="collection-card card border-0 d-flex flex-row jarallax-keep-img">
            <img src="images/collection-item2.jpg" alt="product-item" class="border-rounded-10 img-fluid jarallax-img">
            <div class="card-detail p-3 m-3 p-lg-5 m-lg-5">
              <h3 class="card-title display-3">
                <a href="#">Sneakers Collection</a>
              </h3>
              <a href="index.html" class="text-uppercase mt-3 d-inline-block text-hover fw-bold">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="latest-products" class="product-store py-2 my-2 py-md-5 my-md-5 pt-0">
    <div class="container-md">
      <div class="display-header d-flex align-items-center justify-content-between">
        <h2 class="section-title text-uppercase">Latest Products</h2>
        <div class="btn-right">
          <a href="index.html" class="d-inline-block text-uppercase text-hover fw-bold">View all</a>
        </div>
      </div>
      <div class="product-content padding-small">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
          <div class="col mb-4 mb-3">
            <div class="product-card position-relative">
              <div class="card-img">
                <img src="images/card-item6.jpg" alt="product-item" class="product-image img-fluid">
                <div class="cart-concern position-absolute d-flex justify-content-center">
                  <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modallong">
                      <i class="fa fa-cart-shopping"></i>
                    </button>
                    <button type="button" class="btn btn-light" data-bs-target="#modaltoggle" data-bs-toggle="modal">
                      <i class="fa fa-eye"></i>
                    </button>
                  </div>
                </div>
                <!-- cart-concern -->
              </div>
              <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                <h3 class="card-title fs-6 fw-normal m-0">
                  <a href="index.html">Running shoes for men</a>
                </h3>
                <span class="card-price fw-bold">$99</span>
              </div>
            </div>
          </div>
          <div class="col mb-4 mb-3">
            <div class="product-card position-relative">
              <div class="card-img">
                <img src="images/card-item7.jpg" alt="product-item" class="product-image img-fluid">
                <div class="cart-concern position-absolute d-flex justify-content-center">
                  <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modallong">
                      <i class="fa fa-cart-shopping"></i>
                    </button>
                    <button type="button" class="btn btn-light" data-bs-target="#modaltoggle" data-bs-toggle="modal">
                      <i class="fa fa-eye"></i>
                    </button>
                  </div>
                </div>
                <!-- cart-concern -->
              </div>
              <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                <h3 class="card-title fs-6 fw-normal m-0">
                  <a href="index.html">Running shoes for men</a>
                </h3>
                <span class="card-price fw-bold">$99</span>
              </div>
            </div>
          </div>
          <div class="col mb-4 mb-3">
            <div class="product-card position-relative">
              <div class="card-img">
                <img src="images/card-item8.jpg" alt="product-item" class="product-image img-fluid">
                <div class="cart-concern position-absolute d-flex justify-content-center">
                  <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modallong">
                      <i class="fa fa-cart-shopping"></i>
                    </button>
                    <button type="button" class="btn btn-light" data-bs-target="#modaltoggle" data-bs-toggle="modal">
                      <i class="fa fa-eye"></i>
                    </button>
                  </div>
                </div>
                <!-- cart-concern -->
              </div>
              <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                <h3 class="card-title fs-6 fw-normal m-0">
                  <a href="index.html">Running shoes for men</a>
                </h3>
                <span class="card-price fw-bold">$99</span>
              </div>
            </div>
          </div>
          <div class="col mb-4 mb-3">
            <div class="product-card position-relative">
              <div class="card-img">
                <img src="images/card-item9.jpg" alt="product-item" class="product-image img-fluid">
                <div class="cart-concern position-absolute d-flex justify-content-center">
                  <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modallong">
                      <i class="fa fa-cart-shopping"></i>
                    </button>
                    <button type="button" class="btn btn-light" data-bs-target="#modaltoggle" data-bs-toggle="modal">
                      <i class="fa fa-eye"></i>
                    </button>
                  </div>
                </div>
                <!-- cart-concern -->
              </div>
              <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                <h3 class="card-title fs-6 fw-normal m-0">
                  <a href="index.html">Running shoes for men</a>
                </h3>
                <span class="card-price fw-bold">$99</span>
              </div>
            </div>
          </div>
          <div class="col mb-4 mb-3">
            <div class="product-card position-relative">
              <div class="card-img">
                <img src="images/card-item10.jpg" alt="product-item" class="product-image img-fluid">
                <div class="cart-concern position-absolute d-flex justify-content-center">
                  <div class="cart-button d-flex gap-2 justify-content-center align-items-center">
                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modallong">
                      <i class="fa fa-cart-shopping"></i>
                    </button>
                    <button type="button" class="btn btn-light" data-bs-target="#modaltoggle" data-bs-toggle="modal">
                      <i class="fa fa-eye"></i>
                    </button>
                  </div>
                </div>
                <!-- cart-concern -->
              </div>
              <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                <h3 class="card-title fs-6 fw-normal m-0">
                  <a href="index.html">Running shoes for men</a>
                </h3>
                <span class="card-price fw-bold">$99</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../landing-page/js/scripts.js"></script>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
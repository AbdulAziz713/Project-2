<?php
session_start();
require 'db-connect.php';

date_default_timezone_set("Asia/Jakarta");

if (!empty($_GET['act'] == 'logout')) {
  session_destroy();
  echo "<script>alert('Berhasil Logout!');</script>";
  echo "<script>window.location='landing-page/index.php';</script>";
}

if (!empty($_GET['act'] == 'rubah-password')) {
  session_destroy();
  echo "<script>window.location='login/reset_password.php';</script>";
}

// TAMBAH Features
if (!empty($_GET['act'] == "add-features")) {
  $features_name = $_POST['features_name'];
  $features_icon = $_POST['features_icon'];
  $description = $_POST['description'];

  $query = mysqli_query($koneksi, "INSERT INTO features(features_name, features_icon, description) VALUES ('$features_name', '$features_icon', '$description')");

  if ($query) {
    header("location:admin/index.php?page=features&pesan=tambah");
  } else {
    header("location:admin/index.php?page=features&pesan=gagal");
  }
}
//  END TAMBAH Features

// Edit Features
if (!empty($_GET['act'] == "edit-features")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {

      $id = $_POST['id'];
      $features_name = $_POST['features_name'];
      $features_icon = $_POST['features_icon'];
      $description = $_POST['description'];
    } else {
      header("location:admin/index.php?page=features");
    }

    $query = mysqli_query($koneksi, "UPDATE features SET features_name='$features_name', features_icon='$features_icon', description='$description' WHERE id='$id'");

    if ($query) {
      header("location:admin/index.php?page=features");
    } else {
      header("location:admin/index.php?page=features");
    }
  }
}
//  END Edit Features

// Delete Features
if (!empty($_GET['act'] == "delete-features")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];
      $query = mysqli_query($koneksi, "DELETE FROM features WHERE id='$id'");
      if ($query) {
        header("location:admin/index.php?page=features&pesan=hapus");
      } else {
        header("location:admin/index.php?page=features&pesan=gagalhapus");
      }
    } else {
      header("location:admin/index.php?page=features");
    }
  } else {
    header("location:admin/index.php?page=features");
  }
}
//  END Delete features

// TAMBAH About
if (!empty($_GET['act'] == "add-about")) {
  $about_heading = $_POST['about_heading'];
  $about_text = $_POST['about_text'];

  $query = mysqli_query($koneksi, "INSERT INTO about(about_heading, about_text) VALUES ('$about_heading', '$about_text')");

  if ($query) {
    header("location:admin/index.php?page=about&pesan=tambah");
  } else {
    header("location:admin/index.php?page=about&pesan=gagal");
  }
}
//  END TAMBAH About

// Edit About
if (!empty($_GET['act'] == "edit-about")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {

      $id = $_POST['id'];
      $about_heading = $_POST['about_heading'];
      $about_text = $_POST['about_text'];
    } else {
      header("location:admin/index.php?page=about");
    }

    $query = mysqli_query($koneksi, "UPDATE about SET about_heading='$about_heading', about_text='$about_text' WHERE id='$id'");

    if ($query) {
      header("location:admin/index.php?page=about");
    } else {
      header("location:admin/index.php?page=about");
    }
  }
}
//  END Edit About

// TAMBAH Packages
if (!empty($_GET['act'] == "add-packages")) {
  $packages_heading = $_POST['packages_heading'];
  $packages_price = $_POST['packages_price'];
  $packages_list = $_POST['packages_list'];

  $query = mysqli_query($koneksi, "INSERT INTO packages(packages_heading, packages_price, packages_list) VALUES ('$packages_heading', '$packages_price', '$packages_list')");

  if ($query) {
    header("location:admin/index.php?page=packages&pesan=tambah");
  } else {
    header("location:admin/index.php?page=packages&pesan=gagal");
  }
}
//  END TAMBAH Packages

// Edit Packages
if (!empty($_GET['act'] == "edit-packages")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {

      $id = $_POST['id'];
      $packages_heading = $_POST['packages_heading'];
      $packages_price = $_POST['packages_price'];
      $packages_list = $_POST['packages_list'];
    } else {
      header("location:admin/index.php?page=packages");
    }

    $query = mysqli_query($koneksi, "UPDATE packages SET packages_heading='$packages_heading', packages_price='$packages_price', packages_list='$packages_list' WHERE id_paket='$id'");

    if ($query) {
      header("location:admin/index.php?page=packages&pesan=berhasil");
    } else {
      header("location:admin/index.php?page=packages&pesan=gagal");
    }
  }
}
//  END Edit Packages

// Delete Packages
if (!empty($_GET['act'] == "delete-packages")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];
      $query = mysqli_query($koneksi, "DELETE FROM packages WHERE id='$id'");
      if ($query) {
        header("location:admin/index.php?page=packages&pesan=hapus");
      } else {
        header("location:admin/index.php?page=packages&pesan=gagalhapus");
      }
    } else {
      header("location:admin/index.php?page=packages");
    }
  } else {
    header("location:admin/index.php?page=packages");
  }
}
//  END Delete Packages


// TAMBAH gallery
if (!empty($_GET['act'] == "add-gallery")) {
  $gallery_heading = $_POST['gallery_heading'];
  $gallery_desc = $_POST['gallery_desc'];
  $gallery_image_name = $_FILES['gallery_image']['name'];
  $gallery_image_size = $_FILES['gallery_image']['size'];

  if ($gallery_image_size > 2097152) {

    header("location:admin/index.php?page=gallery&pesan=size");
  } else {

    if ($gallery_image_name != "") {

      $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
      $pisahkan_ekstensi = explode('.', $gallery_image_name);
      $ekstensi = strtolower(end($pisahkan_ekstensi));
      $file_tmp = $_FILES['gallery_image']['tmp_name'];
      $tanggal = md5(date('Y-m-d h:i:s'));
      $gallery_image_name_new = $tanggal . '-' . $gallery_image_name;

      if (in_array($ekstensi, $ekstensi_izin) === true) {

        move_uploaded_file($file_tmp, 'assets/img/gallery/' . $gallery_image_name_new);
        $query = mysqli_query($koneksi, "INSERT INTO gallery( gallery_heading, gallery_text, gallery_image) VALUES ('$gallery_heading', '$gallery_desc', '$gallery_image_name_new')");

        if ($query) {
          header("location:admin/index.php?page=gallery&pesan=tambah");
        } else {
          header("location:admin/index.php?page=gallery&pesan=gagal");
        }
      } else {
        header("location:admin/index.php?page=gallery&pesan=ekstensi");
      }
    }
  }
}
//  END TAMBAH gallery

// Edit gallery
if (!empty($_GET['act'] == "edit-gallery")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id = $_POST['id'];
      $gallery_heading = $_POST['gallery_heading'];
      $gallery_desc = $_POST['gallery_desc'];
      $gallery_image_name = $_FILES['gallery_image']['name'];
      $gallery_image_size = $_FILES['gallery_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($gallery_image_size > 2097152) {
      header("location:admin/index.php?page=gallery&pesan=size");
    } else {

      if ($gallery_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $gallery_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['gallery_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $gallery_image_new = $tanggal . '-' . $gallery_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT gallery_image FROM gallery WHERE id='$id'";
          $data_foto = mysqli_query($koneksi, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/gallery/" . $foto_lama['gallery_image']);

          move_uploaded_file($file_tmp, 'assets/img/gallery/' . $gallery_image_new);

          $query = mysqli_query($koneksi, "UPDATE gallery SET gallery_heading='$gallery_heading', gallery_text='$gallery_desc', gallery_image='$gallery_image_new' WHERE id='$id'");

          if ($query) {
            header("location:admin/index.php?page=gallery&pesan=berhasil");
          } else {
            header("location:admin/index.php?page=gallery&pesan=gagal");
          }
        } else {
          header("location:admin/index.php?page=gallery&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi, "UPDATE gallery SET gallery_heading='$gallery_heading', gallery_text='$gallery_desc' WHERE id='$id'");

        if ($query) {
          header("location:admin/index.php?page=gallery&pesan=berhasil");
        } else {
          header("location:admin/index.php?page=gallery&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin/index.php?page=gallery");
  }
}
//  END Edit gallery

// Delete gallery
if (!empty($_GET['act'] == "delete-gallery")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];

      $get_foto = "SELECT gallery_image FROM gallery WHERE id='$id'";
      $data_foto = mysqli_query($koneksi, $get_foto);
      $foto_lama = mysqli_fetch_array($data_foto);

      unlink("assets/img/gallery/" . $foto_lama['gallery_image']);

      // Mengapus data siswa berdasarkan ID
      $query = mysqli_query($koneksi, "DELETE FROM gallery WHERE id='$id'");
      if ($query) {
        header("location:admin/index.php?page=gallery&pesan=hapus");
      } else {
        header("location:admin/index.php?page=gallery&pesan=gagalhapus");
      }
    } else {
      // Apabila ID nya kosong maka akan dikembalikan kehalaman index
      header("location:admin/index.php?page=gallery");
    }
  } else {
    // Jika tidak ada Data ID maka akan dikembalikan kehalaman index
    header("location:admin/index.php?page=gallery");
  }
}
//  END Delete gallery

// TAMBAH blog
if (!empty($_GET['act'] == "add-blog")) {
  $blog_date = date('Y-m-d h:i:s');
  $blog_heading = $_POST['blog_heading'];
  $blog_text = $_POST['blog_text'];
  $blog_image_name = $_FILES['blog_image']['name'];
  $blog_image_size = $_FILES['blog_image']['size'];

  if ($blog_image_size > 2097152) {

    header("location:admin/index.php?page=blog&pesan=size");
  } else {

    if ($blog_image_name != "") {

      $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
      $pisahkan_ekstensi = explode('.', $blog_image_name);
      $ekstensi = strtolower(end($pisahkan_ekstensi));
      $file_tmp = $_FILES['blog_image']['tmp_name'];
      $tanggal = md5(date('Y-m-d h:i:s'));
      $blog_image_name_new = $tanggal . '-' . $blog_image_name;

      if (in_array($ekstensi, $ekstensi_izin) === true) {

        move_uploaded_file($file_tmp, 'assets/img/blog/' . $blog_image_name_new);
        $query = mysqli_query($koneksi, "INSERT INTO blog(blog_date, blog_heading, blog_text, blog_image) VALUES ('$blog_date', '$blog_heading', '$blog_text', '$blog_image_name_new')");

        if ($query) {
          header("location:admin/index.php?page=blog&pesan=tambah");
        } else {
          header("location:admin/index.php?page=blog&pesan=gagal");
        }
      } else {
        header("location:admin/index.php?page=blog&pesan=ekstensi");
      }
    }
  }
}
//  END TAMBAH blog

// Edit blog
if (!empty($_GET['act'] == "edit-blog")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id = $_POST['id'];
      $blog_date = date('Y-m-d h:i:s');
      $blog_heading = $_POST['blog_heading'];
      $blog_text = $_POST['blog_text'];
      $blog_image_name = $_FILES['blog_image']['name'];
      $blog_image_size = $_FILES['blog_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($blog_image_size > 2097152) {
      header("location:admin/index.php?page=blog&pesan=size");
    } else {

      if ($blog_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $blog_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['blog_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $blog_image_new = $tanggal . '-' . $blog_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT blog_image FROM blog WHERE id='$id'";
          $data_foto = mysqli_query($koneksi, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/blog/" . $foto_lama['blog_image']);

          move_uploaded_file($file_tmp, 'assets/img/blog/' . $blog_image_new);

          $query = mysqli_query($koneksi, "UPDATE blog SET blog_date='$blog_date', blog_heading='$blog_heading', blog_text='$blog_text', blog_image='$blog_image_new' WHERE id='$id'");

          if ($query) {
            header("location:admin/index.php?page=blog&pesan=berhasil");
          } else {
            header("location:admin/index.php?page=blog&pesan=gagal");
          }
        } else {
          header("location:admin/index.php?page=blog&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi, "UPDATE blog SET blog_date='$blog_date', blog_heading='$blog_heading', blog_text='$blog_text' WHERE id='$id'");

        if ($query) {
          header("location:admin/index.php?page=blog&pesan=berhasil");
        } else {
          header("location:admin/index.php?page=blog&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin/index.php?page=blog");
  }
}
//  END Edit blog

// Delete blog
if (!empty($_GET['act'] == "delete-blog")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];

      $get_foto = "SELECT blog_image FROM blog WHERE id='$id'";
      $data_foto = mysqli_query($koneksi, $get_foto);
      $foto_lama = mysqli_fetch_array($data_foto);

      unlink("assets/img/blog/" . $foto_lama['blog_image']);

      // Mengapus data siswa berdasarkan ID
      $query = mysqli_query($koneksi, "DELETE FROM blog WHERE id='$id'");
      if ($query) {
        header("location:admin/index.php?page=blog&pesan=hapus");
      } else {
        header("location:admin/index.php?page=blog&pesan=gagalhapus");
      }
    } else {
      // Apabila ID nya kosong maka akan dikembalikan kehalaman index
      header("location:admin/index.php?page=blog");
    }
  } else {
    // Jika tidak ada Data ID maka akan dikembalikan kehalaman index
    header("location:admin/index.php?page=blog");
  }
}
//  END Delete blog


// TAMBAH testi
if (!empty($_GET['act'] == "add-testi")) {
  $testi_text = $_POST['testi_text'];
  $testi_client = $_POST['testi_client'];
  $testi_image_name = $_FILES['testi_image']['name'];
  $testi_image_size = $_FILES['testi_image']['size'];

  if ($testi_image_size > 2097152) {

    header("location:admin/index.php?page=testi&pesan=size");
  } else {

    if ($testi_image_name != "") {

      $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
      $pisahkan_ekstensi = explode('.', $testi_image_name);
      $ekstensi = strtolower(end($pisahkan_ekstensi));
      $file_tmp = $_FILES['testi_image']['tmp_name'];
      $tanggal = md5(date('Y-m-d h:i:s'));
      $testi_image_name_new = $tanggal . '-' . $testi_image_name;

      if (in_array($ekstensi, $ekstensi_izin) === true) {

        move_uploaded_file($file_tmp, 'assets/img/testimonial/' . $testi_image_name_new);
        $query = mysqli_query($koneksi, "INSERT INTO testimonial(testi_text, testi_client, testi_image) VALUES ('$testi_text', '$testi_client', '$testi_image_name_new')");

        if ($query) {
          header("location:admin/index.php?page=testi&pesan=tambah");
        } else {
          header("location:admin/index.php?page=testi&pesan=gagal");
        }
      } else {
        header("location:admin/index.php?page=testi&pesan=ekstensi");
      }
    }
  }
}
//  END TAMBAH testi

// Edit testi
if (!empty($_GET['act'] == "edit-testi")) {
  if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
      // Mengambil data dari form lalu ditampung didalam variabel
      $id = $_POST['id'];
      $testi_text = $_POST['testi_text'];
      $testi_client = $_POST['testi_client'];
      $testi_image_name = $_FILES['testi_image']['name'];
      $testi_image_size = $_FILES['testi_image']['size'];
    } else {
      header("location:index.php");
    }

    if ($testi_image_size > 2097152) {
      header("location:admin/index.php?page=testi&pesan=size");
    } else {

      if ($testi_image_name != "") {

        $ekstensi_izin = array('png', 'jpg', 'jpeg', 'svg');
        $pisahkan_ekstensi = explode('.', $testi_image_name);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        $file_tmp = $_FILES['testi_image']['tmp_name'];
        $tanggal = md5(date('Y-m-d h:i:s'));
        $testi_image_new = $tanggal . '-' . $testi_image_name;

        if (in_array($ekstensi, $ekstensi_izin) === true) {

          $get_foto = "SELECT testi_image FROM testimonial WHERE id='$id'";
          $data_foto = mysqli_query($koneksi, $get_foto);
          $foto_lama = mysqli_fetch_array($data_foto);

          unlink("assets/img/testimonial/" . $foto_lama['testi_image']);

          move_uploaded_file($file_tmp, 'assets/img/testimonial/' . $testi_image_new);
          $query = mysqli_query($koneksi, "UPDATE testimonial SET testi_text='$testi_text', testi_client='$testi_client', testi_image='$testi_image_new' WHERE id='$id'");

          if ($query) {
            header("location:admin/index.php?page=testi&pesan=berhasil");
          } else {
            header("location:admin/index.php?page=testi&pesan=gagal");
          }
        } else {
          header("location:admin/index.php?page=testi&pesan=ekstensi");
        }
      } else {
        $query = mysqli_query($koneksi, "UPDATE testimonial SET testi_text='$testi_text', testi_client='$testi_client' WHERE id='$id'");

        if ($query) {
          header("location:admin/index.php?page=testi&pesan=berhasil");
        } else {
          header("location:admin/index.php?page=testi&pesan=gagal");
        }
      }
    }
  } else {
    header("location:admin/index.php?page=testi");
  }
}
//  END Edit testi

// Delete testi
if (!empty($_GET['act'] == "delete-testi")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];

      $get_foto = "SELECT testi_image FROM testimonial WHERE id='$id'";
      $data_foto = mysqli_query($koneksi, $get_foto);
      $foto_lama = mysqli_fetch_array($data_foto);

      unlink("assets/img/testimonial/" . $foto_lama['testi_image']);

      // Mengapus data siswa berdasarkan ID
      $query = mysqli_query($koneksi, "DELETE FROM testimonial WHERE id='$id'");
      if ($query) {
        header("location:admin/index.php?page=testi&pesan=hapus");
      } else {
        header("location:admin/index.php?page=testi&pesan=gagalhapus");
      }
    } else {
      // Apabila ID nya kosong maka akan dikembalikan kehalaman index
      header("location:admin/index.php?page=testi");
    }
  } else {
    // Jika tidak ada Data ID maka akan dikembalikan kehalaman index
    header("location:admin/index.php?page=testi");
  }
}
//  END Delete blog

// TAMBAH contact
if (!empty($_GET['act'] == "add-contact")) {
  $contact_date = date('Y-m-d h:i:s');
  $contact_name = $_POST['contact_name'];
  $contact_email = $_POST['contact_email'];
  $contact_subject = $_POST['contact_subject'];
  $contact_message = $_POST['contact_message'];

  $query = mysqli_query($koneksi, "INSERT INTO contact(contact_date, contact_name, contact_email, contact_subject, contact_message) VALUES ('$contact_date', '$contact_name', '$contact_email', '$contact_subject', '$contact_message')");

  if ($query) {
    echo '<script>window.location = "index.php?pesan=success#contact";</script>';
    echo '<script>alert("Pesan Berhasil Terkirim :)")</script>';
  } else {
    header("location:index.php#contact");
  }
}
//  END TAMBAH contact

// Delete contact
if (!empty($_GET['act'] == "delete-contact")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];
      $query = mysqli_query($koneksi, "DELETE FROM contact WHERE id='$id'");
      if ($query) {
        header("location:admin/index.php?page=contact&pesan=hapus");
      } else {
        header("location:admin/index.php?page=contact&pesan=gagalhapus");
      }
    } else {
      header("location:admin/index.php?page=contact");
    }
  } else {
    header("location:admin/index.php?page=contact");
  }
}
//  END Delete contact

// Edit Vendor
if (!empty($_GET['act'] == "edit-vendor")) {
  if (isset($_POST['id_vendor'])) {
    if ($_POST['id_vendor'] != "") {

      $id = $_POST['id_vendor'];
      $nama_vendor = $_POST['nama_vendor'];
      $username_vendor = $_POST['username'];
      $email_vendor = $_POST['email'];
      $password_vendor = $_POST['password'];
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $telepon_vendor = $_POST['telepon'];
      $role_vendor = $_POST['role'];
      $alamat_vendor = $_POST['alamat'];

      // Jika password diisi, hash passwordnya
      if (!empty($password_vendor)) {
        $hashed_password = password_hash($password_vendor, PASSWORD_DEFAULT);
        $query = mysqli_query($koneksi, "UPDATE users SET 
          nama='$nama_vendor', 
          username='$username_vendor', 
          password='$hashed_password', 
          email='$email_vendor', 
          role='$role_vendor', 
          alamat='$alamat_vendor'
          WHERE id_user='$id'");
      } else {
        // Jika password tidak diisi, update data tanpa mengubah password
        $query = mysqli_query($koneksi, "UPDATE users SET 
          nama='$nama_vendor', 
          username='$username_vendor', 
          email='$email_vendor', 
          role='$role_vendor', 
          alamat='$alamat_vendor'
          WHERE id_user='$id'");
      }

      if ($query) {
        header("location:admin/index.php?page=vendor&pesan=berhasil");
      } else {
        header("location:admin/index.php?page=vendor&pesan=gagal");
      }
    } else {
      header("location:admin/index.php?page=vendor");
    }
  }
}
// END Edit Vendor


// TAMBAH vendor
if (!empty($_GET['act'] == "add-vendor")) {
  $id = $_POST['id_vendor'];
  $nama_vendor = $_POST['nama_vendor'];
  $username_vendor = $_POST['username'];
  $email_vendor = $_POST['email'];
  $password_vendor = $_POST['password'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $telepon_vendor = $_POST['telepon'];
  $role_vendor = $_POST['role'];
  $alamat_vendor = $_POST['alamat'];

  // Periksa duplikasi data berdasarkan email
  $cek_duplikat = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email_vendor'");
  
  if (mysqli_num_rows($cek_duplikat) > 0) {
      // Jika data sudah ada
      echo '<script>alert("Data dengan email tersebut sudah ada!");</script>';
      echo '<script>window.location = "admin/index.php?page=add-vendor";</script>';
  } else {
      // Jika tidak ada duplikat, masukkan data ke database
      $query = mysqli_query($koneksi, "INSERT INTO users (nama, username, email, password, jenis_kelamin, telepon, alamat, role) VALUES ('$nama_vendor', '$username_vendor', '$email_vendor', '$password_vendor', '$jenis_kelamin', '$telepon_vendor', '$alamat_vendor', '$role_vendor')");

      if ($query) {
        header("location:admin/index.php?page=vendor&pesan=tambah");
      } else {
        header("location:admin/index.php?page=vendor&pesan=gagal");
      }
  }
}
//  END TAMBAH vendor

// Delete vendor
if (!empty($_GET['act'] == "delete-vendor")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];
      $query = mysqli_query($koneksi, "DELETE FROM users WHERE id_user='$id'");
      if ($query) {
        header("location:admin/index.php?page=vendor&pesan=hapus");
      } else {
        header("location:admin/index.php?page=vendor&pesan=gagalhapus");
      }
    } else {
      header("location:admin/index.php?page=vendor");
    }
  } else {
    header("location:admin/index.php?page=vendor");
  }
}
//  END Delete vendor

// Edit Pelanggan
if (!empty($_GET['act'] == "edit-pelanggan")) {
  if (isset($_POST['id_pelanggan'])) {
    if ($_POST['id_pelanggan'] != "") {

      $id = $_POST['id_pelanggan'];
      $nama_pelanggan = $_POST['nama_pelanggan'];
      $username_pelanggan = $_POST['username'];
      $email_pelanggan = $_POST['email'];
      $password_pelanggan = $_POST['password'];
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $telepon_pelanggan = $_POST['telepon'];
      $role_pelanggan = $_POST['role'];
      $alamat_pelanggan = $_POST['alamat'];

      // Jika password diisi, hash passwordnya
      if (!empty($password_pelanggan)) {
        $hashed_password = password_hash($password_pelanggan, PASSWORD_DEFAULT);
        $query = mysqli_query($koneksi, "UPDATE users SET 
          nama='$nama_pelanggan', 
          username='$username_pelanggan', 
          password='$hashed_password', 
          email='$email_pelanggan', 
          role='$role_pelanggan', 
          alamat='$alamat_pelanggan' 
          WHERE id_user='$id'");
      } else {
        // Jika password tidak diisi, update data tanpa mengubah password
        $query = mysqli_query($koneksi, "UPDATE users SET 
          nama='$nama_pelanggan', 
          username='$username_pelanggan', 
          email='$email_pelanggan', 
          role='$role_pelanggan', 
          alamat='$alamat_pelanggan' 
          WHERE id_user='$id'");
      }

      if ($query) {
        header("location:admin/index.php?page=pelanggan&pesan=berhasil");
      } else {
        header("location:admin/index.php?page=pelanggan&pesan=gagal");
      }
    } else {
      header("location:admin/index.php?page=pelanggan");
    }
  }
}
// END Edit Pelanggan

// Delete pelanggan
if (!empty($_GET['act'] == "delete-pelanggan")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];
      $query = mysqli_query($koneksi, "DELETE FROM users WHERE id_user='$id'");
      if ($query) {
        header("location:admin/index.php?page=pelanggan&pesan=hapus");
      } else {
        header("location:admin/index.php?page=pelanggan&pesan=gagalhapus");
      }
    } else {
      header("location:admin/index.php?page=pelanggan");
    }
  } else {
    header("location:admin/index.php?page=pelanggan");
  }
}
//  END Delete pelanggan

// Edit Pelanggan
if (!empty($_GET['act'] == "edit-pelanggan")) {
  if (isset($_POST['id_pelanggan'])) {
    if ($_POST['id_pelanggan'] != "") {

      $id = $_POST['id_pelanggan'];
      $nama_pelanggan = $_POST['nama_pelanggan'];
      $username_pelanggan = $_POST['username'];
      $email_pelanggan = $_POST['email'];
      $password_pelanggan = $_POST['password'];
      $jenis_kelamin = $_POST['jenis_kelamin'];
      $telepon_pelanggan = $_POST['telepon'];
      $role_pelanggan = $_POST['role'];
      $alamat_pelanggan = $_POST['alamat'];

      // Jika password diisi, hash passwordnya
      if (!empty($password_pelanggan)) {
        $hashed_password = password_hash($password_pelanggan, PASSWORD_DEFAULT);
        $query = mysqli_query($koneksi, "UPDATE users SET 
          nama='$nama_pelanggan', 
          username='$username_pelanggan', 
          password='$hashed_password', 
          email='$email_pelanggan', 
          role='$role_pelanggan', 
          alamat='$alamat_pelanggan' 
          WHERE id_user='$id'");
      } else {
        // Jika password tidak diisi, update data tanpa mengubah password
        $query = mysqli_query($koneksi, "UPDATE users SET 
          nama='$nama_pelanggan', 
          username='$username_pelanggan', 
          email='$email_pelanggan', 
          role='$role_pelanggan', 
          alamat='$alamat_pelanggan' 
          WHERE id_user='$id'");
      }

      if ($query) {
        header("location:admin/index.php?page=pelanggan&pesan=berhasil");
      } else {
        header("location:admin/index.php?page=pelanggan&pesan=gagal");
      }
    } else {
      header("location:admin/index.php?page=pelanggan");
    }
  }
}
// END Edit Pelanggan

// Delete pelanggan
if (!empty($_GET['act'] == "delete-pelanggan")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];
      $query = mysqli_query($koneksi, "DELETE FROM users WHERE id_user='$id'");
      if ($query) {
        header("location:admin/index.php?page=pelanggan&pesan=hapus");
      } else {
        header("location:admin/index.php?page=pelanggan&pesan=gagalhapus");
      }
    } else {
      header("location:admin/index.php?page=pelanggan");
    }
  } else {
    header("location:admin/index.php?page=pelanggan");
  }
}
//  END Delete pelanggan

// Edit Pembayaran
if (isset($_GET['act']) && $_GET['act'] == "edit-pembayarankonfirmasi") {
  $id_pembayaran = $_GET['id']; 
  $query = "UPDATE pembayaran SET status_pembayaran = 'Terkonfirmasi' WHERE id_pembayaran = '$id_pembayaran'";
  $result = mysqli_query($koneksi, $query);
  if ($result) {
  header("location:admin/index.php?page=pesanan&pesan=berhasil");
  } else {
  header("location:admin/index.php?page=pesanan&pesan=gagal");
  }
  }

if (isset($_GET['act']) && $_GET['act'] == "edit-pembayarantolak") {
  $id_pembayaran = $_GET['id']; 
  $query = "UPDATE pembayaran SET status_pembayaran = 'Ditolak' WHERE id_pembayaran = '$id_pembayaran'";
  $result = mysqli_query($koneksi, $query);
  if ($result) {
  header("location:admin/index.php?page=pesanan&pesan=berhasil");
  } else {
  header("location:admin/index.php?page=pesanan&pesan=gagal");
  }
  }
//  END Edit Pembayaran

// Delete pesanan
if (!empty($_GET['act'] == "delete-pesanan")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id'];
      $query = mysqli_query($koneksi, "DELETE FROM pesanan WHERE id_pesanan='$id'");
      if ($query) {
        header("location:admin/index.php?page=pesanan&pesan=hapus");
      } else {
        header("location:admin/index.php?page=pesanan&pesan=gagalhapus");
      }
    } else {
      header("location:admin/index.php?page=pesanan");
    }
  } else {
    header("location:admin/index.php?page=pesanan");
  }
}
//  END Delete pesanan

// Edit pesanan
if (!empty($_GET['act'] == "edit-pesanan")) {
  if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

      $id = $_GET['id_pesanan'];
      $keterangan = $_GET['keterangan'];
      $query = "UPDATE pembayaran SET Keterangan = '$keterangan' WHERE id_pesanan = '$id'";
      if ($query) {
        header("location:admin/index.php?page=pesanan&pesan=berhasil");
      } else {
        header("location:admin/index.php?page=pesanan&pesan=gagal");
      }
    } else {
      header("location:admin/index.php?page=pesanan");
    }
  } else {
    header("location:admin/index.php?page=pesanan");
  }
}
//  END Edit pesanan
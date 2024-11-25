<style>
    .custom-text-color td {
        color: rgba(254, 70, 174, 1) !important;
    }
</style>
<div class="pagetitle">
    <h1>Pesanan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Pesanan</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<div class=" mt-2">
  <?php if (isset($_GET['pesan'])) { ?>
    <?php if ($_GET['pesan'] == "berhasil") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Mengubah Data Pelanggan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "gagal") { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Gagal Mengubah Data Pelanggan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "ekstensi") { ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        File Extension Must Be PNG And JPG
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "size") { ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        File Size Can't Be More Than 2 MB
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "hapus") { ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        Berhasil Menghapus Data Pelanggan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Gagal Menghapus Data Pelanggan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } elseif ($_GET['pesan'] == "tambah") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Menambah Data Pelanggan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
  <?php } ?>
</div>

<section class="section dashboard">
    <div class="row">
        <?php
        // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
        $query = "SELECT * FROM pesanan";
        $result = mysqli_query($koneksi, $query);
        // mengecek apakah ada error ketika menjalankan query
        if (!$result) {
            die("Query Error: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
        }
        ?>
        
        <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID Pesanan</th>
                <th>Nama Pelanggan</th>
                <th>Layanan</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr class="custom-text-color">
                <td><?php echo $row['id_pesanan']; ?></td>
                <td><?php echo $row['nama_pelanggan']; ?></td>
                <td><?php echo $row['Layanan']; ?></td>
                <td><?php echo $row['Harga']; ?></td>
                <td><?php echo $row['Status']; ?></td>
                <td><?php echo $row['Keterangan']; ?></td>
                <td class="text-center">
                  <a href="index.php?page=edit-pesanan&id=<?php echo $row['id_pesanan']; ?>" class="btn btn-warning btn-sm">Edit</a>
                  <a href="../action.php?act=delete-pesanan&id=<?php echo $row['id_pesanan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this pelanggan?');">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</section>

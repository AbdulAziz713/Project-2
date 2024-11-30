<style>
    .custom-text-color td {
        color: rgba(254, 70, 174, 1) !important;
    }
</style>
<div class="pagetitle">
    <h1>Pembayaran</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Pembayaran</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<div class=" mt-2">
  <?php if (isset($_GET['pesan'])) { ?>
    <?php if ($_GET['pesan'] == "berhasil") { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        Berhasil Mengkonfirmasi Pembayaran
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
        $query = "SELECT * FROM pembayaran";
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
                <th>ID Pembayaran</th>
                <th>Metode Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr class="custom-text-color">
                <td><?php echo $row['id_pembayaran']; ?></td>
                <td><?php echo $row['metode_pembayaran']; ?></td>
                <td><?php echo $row['status_pembayaran']; ?></td>
                <td><img src="../assets/img/bukti_pembayaran/<?php echo $row['bukti_pembayaran']; ?>" alt=""></td>
                <td class="text-center">
                  <a href="../action.php?act=edit-pembayaran&idkonfirmasi=<?php echo $row['id_pembayaran']; ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah yakin ingin mengkonfirmasi?');">Konfirmasi</a>
                  <a href="../action.php?act=edit-pembayarantolak&id=<?php echo $row['id_pembayaran']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menolak?');">Tolak</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</section>

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
        if (isset($_GET['action']) && $_GET['action'] == 'get_pembayaran' && isset($_GET['id_pesanan'])) {
          $id_pesanan = $_GET['id_pesanan'];
          $query = "SELECT * FROM pembayaran WHERE id_pesanan = '$id_pesanan'";
          $result = mysqli_query($koneksi, $query);
      
          $data = [];
          if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                  $data[] = $row;
              }
          }
      
          header('Content-Type: application/json');
          echo json_encode($data);
          exit; // Hentikan eksekusi agar data JSON terkirim dengan benar
      }
        ?>
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
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Query untuk mengambil data pesanan
            $query = "SELECT * FROM pesanan inner join pembayaran on pesanan.id_pesanan = pembayaran.id_pesanan";
            $result = mysqli_query($koneksi, $query);
            if (!$result) {
                die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
            }

            while ($row = mysqli_fetch_assoc($result)): 
            ?>
            <tr class="custom-text-color">
                <td><?php echo $row['id_pesanan']; ?></td>
                <td><?php echo $row['nama_pelanggan']; ?></td>
                <td><?php echo $row['Layanan']; ?></td>
                <td><?php echo $row['Harga']; ?></td>
                <td><?php echo $row['Keterangan']; ?></td>
                <td class="text-center">
                    <a href="index.php?page=edit-pesanan&id=<?php echo $row['id_pesanan']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="#" 
                       class="btn btn-primary btn-sm" 
                       data-bs-toggle="modal" 
                       data-bs-target="#modal-<?php echo $row['id_pesanan']; ?>">
                       Detail
                    </a>
                    <a href="../action.php?act=delete-pesanan&id=<?php echo $row['id_pesanan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus pelanggan tersebut?');">Hapus</a>
                </td>
            </tr>

            <!-- Modal untuk detail pembayaran -->
            <div class="modal fade" id="modal-<?php echo $row['id_pesanan']; ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo $row['id_pesanan']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="modalLabel-<?php echo $row['id_pesanan']; ?>">Detail Pembayaran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <img src="<?php echo $row['bukti_pembayaran']; ?>" alt="Bukti Pembayaran" class="img-fluid d-block mx-auto">
                            <ul class="list-inline">
                                <li>
                                    <h4 class="text-dark text-center"><?php echo $row['metode_pembayaran']; ?></h4>
                                </li>
                                <li>
                                    <h4 class="text-dark text-center"><?php echo $row['status_pembayaran']; ?></h4>
                                </li>
                            </ul>
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                        <a href="../action.php?act=edit-pembayarankonfirmasi&id=<?php echo $row['id_pembayaran']; ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah yakin ingin mengkonfirmasi?');">Konfirmasi</a>
                            <a href="../action.php?act=edit-pembayarantolak&id=<?php echo $row['id_pembayaran']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menolak?');">Tolak</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
            <?php endwhile; ?>
        </tbody>
    </table>
</div>




</section>

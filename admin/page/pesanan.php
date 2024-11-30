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
                <th>Status Pembayaran</th>
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
                <td><?php echo $row['status_pembayaran']; ?></td>
                <td><?php echo $row['Keterangan']; ?></td>
                <td class="text-center">
                  <a href="index.php?page=edit-pesanan&id=<?php echo $row['id_pesanan']; ?>" class="btn btn-success btn-sm">Konfirmasi</a>
                  <a href="#" 
   class="btn btn-primary btn-sm" 
   onclick="showDetail(<?php echo htmlspecialchars(json_encode($row)); ?>); return false;">
   Detail
</a>
                  <a href="../action.php?act=delete-pesanan&id=<?php echo $row['id_pesanan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this pelanggan?');">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detail Pembayaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID Pembayaran</th>
              <th>Metode Pembayaran</th>
              <th>Status Pembayaran</th>
              <th>Bukti Pembayaran</th>
            </tr>
          </thead>
          <tbody id="detailTableBody">
            <!-- Data akan dimuat di sini melalui AJAX -->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


</div>
<script>
  function showDetail(pesanan) {
    const idPesanan = pesanan.id_pesanan;

    // Kirim request AJAX ke halaman ini sendiri
    fetch(`?action=get_pembayaran&id_pesanan=${idPesanan}`)
      .then(response => response.json())
      .then(data => {
        // Kosongkan isi tabel
        const detailTableBody = document.getElementById('detailTableBody');
        detailTableBody.innerHTML = '';

        if (data.length > 0) {
          // Loop data dan tambahkan ke tabel
          data.forEach(pembayaran => {
            const row = `
              <tr>
                <td>${pembayaran.id_pembayaran}</td>
                <td>${pembayaran.metode_pembayaran}</td>
                <td>${pembayaran.status_pembayaran}</td>
                <td><a href="${pembayaran.bukti_pembayaran}" target="_blank">Lihat Bukti</a></td>
              </tr>
            `;
            detailTableBody.innerHTML += row;
          });
        } else {
          // Jika tidak ada data
          detailTableBody.innerHTML = '<tr><td colspan="4" class="text-center">Tidak ada data pembayaran</td></tr>';
        }

        // Tampilkan modal
        const modal = new bootstrap.Modal(document.getElementById('detailModal'));
        modal.show();
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Gagal mengambil data pembayaran.');
      });
  }
</script>



</section>

<?php
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
require '../db-connect.php';

if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $query = "SELECT * FROM pesanan WHERE id_pesanan='$id'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='admin.php?page=vendor';</script>";
    }
} else {
    echo "<script>alert('Masukkan data id.');window.location='admin.php?page=vendor';</script>";
}
?>

<div class="pagetitle">
    <h1>Vendor</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=pesanan">Pesanan</a></li>
            <li class="breadcrumb-item active">Edit Pesanan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card vendor-card">
                <div class="card-body">
                    <h5 class="card-title">Edit Data Pesanan</h5>
                    <form class="row g-3" method="POST" action="../action.php?act=edit-pesanan&id=<?php echo $data['id_pesanan']; ?>" enctype="multipart/form-data">
                        <div class="col-12">
                            <input name="id_pesanan" value="<?php echo $data['id_pesanan']; ?>" hidden />
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="5"><?php echo $data['Keterangan']; ?></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
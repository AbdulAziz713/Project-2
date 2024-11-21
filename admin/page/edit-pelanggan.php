<?php
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
require '../db-connect.php';

if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $query = "SELECT * FROM users WHERE id_user='$id'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='admin.php?page=pelanggan';</script>";
    }
} else {
    echo "<script>alert('Masukkan data id.');window.location='admin.php?page=pelanggan';</script>";
}
?>

<div class="pagetitle">
    <h1>Pelanggan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=pelanggan">Pelanggan</a></li>
            <li class="breadcrumb-item active">Edit Pelanggan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card pelanggan-card">
                <div class="card-body">
                    <h5 class="card-title">Edit Data Pelanggan</h5>
                    <form class="row g-3" method="POST" action="../action.php?act=edit-pelanggan" enctype="multipart/form-data">
                        <div class="col-lg-3 col-md-9 col-sm-8">
                            <input name="id_pelanggan" value="<?php echo $data['id_user']; ?>" hidden />
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_pelanggan" required="required" autocomplete="off">
                        </div>
                        <div class="col-lg-3 col-md-9 col-sm-8">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required="required" autocomplete="off">
                        </div>
                        <div class="col-lg-3 col-md-9 col-sm-8">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" required="required" autocomplete="off">
                        </div>
                        <div class="col-lg-3 col-md-9 col-sm-8">
                            <label class="form-label">Password</label>
                            <input type="Password" class="form-control" name="password" autocomplete="off">
                        </div>
                        <div class="col-lg-3 col-md-9 col-sm-8">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control input-fixed" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-9 col-sm-8">
                            <label class="form-label">Telepon</label>
                            <input type="text" class="form-control" name="telepon" required="required" autocomplete="off">
                        </div>
                        <div class="col-lg-3 col-md-9 col-sm-8">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-control input-fixed" required>
                                <option value="Admin">Admin</option>
                                <option value="Vendor">Vendor</option>
                                <option value="User">Pelanggan</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="5"><?php echo $data['alamat']; ?></textarea>
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
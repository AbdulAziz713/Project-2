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
            <li class="breadcrumb-item"><a href="index.php?page=vendor">Vendor</a></li>
            <li class="breadcrumb-item active">Edit Vendor</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card vendor-card">
                <div class="card-body">
                    <h5 class="card-title">Edit Data Vendor</h5>
                    <form class="row g-3" method="POST" action="../action.php?act=edit-vendor" enctype="multipart/form-data">
                        <div class="col-lg-3 col-md-9 col-sm-8">
                            <input name="id_vendor" value="<?php echo $data['id_user']; ?>" hidden />
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_vendor" value="<?php echo $data['nama']; ?>" required="required" autocomplete="off">
                        </div>
                        <div class="col-lg-3 col-md-9 col-sm-8">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" required="required" autocomplete="off">
                        </div>
                        <div class="col-lg-3 col-md-9 col-sm-8">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>" required="required" autocomplete="off">
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
                            <input type="text" class="form-control" name="telepon" value="<?php echo $data['telepon']; ?>" required="required" autocomplete="off">
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
<?php
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
require '../db-connect.php';

if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $query = "SELECT * FROM about WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='admin.php?page=blog';</script>";
    }
} else {
    echo "<script>alert('Masukkan data id.');window.location='admin.php?page=blog';</script>";
}

?>

<div class="pagetitle">
    <h1>About</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=about">About</a></li>
            <li class="breadcrumb-item active">Edit About</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">


        <div class="col-12">
            <div class="card about-card">
                <div class="card-body">
                    <h5 class="card-title">Edit Data About</h5>

                    <form class="row g-3" method="POST" action="../action.php?act=edit-about" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <input name="id" value="<?php echo $data['id']; ?>" hidden />
                            <label class="form-label">Heading</label>
                            <input type="text" class="form-control" name="about_heading" value="<?php echo $data['about_heading']; ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label">About Text</label>
                            <textarea class="form-control" name="about_text" rows="5"><?php echo $data['about_text']; ?></textarea>
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
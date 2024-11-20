<div class="pagetitle">
    <h1>Vendor</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="index.php?page=vendor">Vendor</a></li>
            <li class="breadcrumb-item active">Add Vendor</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">


        <div class="col-12">
            <div class="card vendor-card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data Vendor</h5>

                    <form class="row g-3" method="POST" action="../action.php?act=add-vendor" enctype="multipart/form-data">
                        <div class="col-lg-2 col-md-9 col-sm-8">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_vendor" required="required" autocomplete="off">
                        </div>
                        <div class="col-lg-2 col-md-9 col-sm-8">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email_vendor" required="required" autocomplete="off">
                        </div>
                        <div class="col-lg-2 col-md-9 col-sm-8">
                            <label class="form-label">Telepon</label>
                            <input type="text" class="form-control" name="telepon_vendor" required="required" autocomplete="off">
                        </div>
                        <div class="col-lg-2 col-md-9 col-sm-8">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control input-fixed" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-9 col-sm-8">
                            <label class="form-label">Jenis Layanan</label>
                            <select name="jenis_layanan" class="form-control input-fixed" required>
                                <option value="Cattering">Cattering</option>
                                <option value="Dekorasi">Dekorasi</option>
                                <option value="Hiburan">Hiburan</option>
                                <option value="Makeup">Makeup</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat_vendor" rows="5"></textarea>
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
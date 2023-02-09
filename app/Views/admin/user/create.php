<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>User Menu</h3>
                <p class="text-subtitle text-muted">Tambah Data User </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"></h4>
            </div>
            <div class="card-body">
                <p>Masukan Data sesuai dengan dengan identitas pengguna!</p>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $validation->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('admin/user/add') ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">NIP</label>
                                <input type="text" name="nip" class="form-control" placeholder="NIP" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Nama</label>
                                <input type="text" name="name" class="form-control" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="email" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Role</label>
                                <select class="form-select" name="role_id" aria-label="Default select example">
                                    <option selected>Pilih Role Akses</option>
                                    <?php foreach ($role as $item) { ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Jenis Kelamin</label>
                                <select class="form-select" name="gender" aria-label="Default select example">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Tanggal Lahir</label>
                                <input type="date" name="brd_date" class="form-control" placeholder="Tanggal lahir" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Password</label>
                                <input type="password" name="password" class="form-control" placeholder=" Password" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Konfirmasi Password</label>
                                <input type="password" name="confpassword" class="form-control" placeholder="Konfirmasi  Password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Alamat"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Tambah</button>
                        <a href="javascript:window.history.go(-1);" value="draft" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
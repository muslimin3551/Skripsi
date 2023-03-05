<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>User Menu</h3>
                <p class="text-subtitle text-muted">Edit Data User </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                <p>Edit Data sesuai dengan dengan identitas pengguna!, untuk password biarkan kosong bila anda tidak ingin mengubahnya</p>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $validation->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <form action="" method="post" id="text-editor">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>" />
                            <div class="form-group">
                                <label for="title">NIP</label>
                                <input type="text" name="nip" class="form-control" value="<?= $user['nip'] ?>" placeholder="NIP" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Nama</label>
                                <input type="text" name="name" class="form-control" value="<?= $user['name'] ?>" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Email</label>
                                <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" placeholder="email" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Role</label>
                                <select class="form-select" name="role_id" aria-label="Default select example">
                                    <option selected>Pilih Role Akses</option>
                                    <?php foreach ($role as $item) { ?>
                                        <option value="<?= $item['id'] ?>" <?php if ($user['role_id'] == $item['id']) {echo 'selected';}?>><?= $item['title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Jenis Kelamin</label>
                                <select class="form-select" name="gender" aria-label="Default select example">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" <?php if ($user['gender'] == 'Laki-Laki') {
                                                                    echo 'selected';
                                                                } ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if ($user['gender'] == 'Perempuan') {
                                                                    echo 'selected';
                                                                } ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Tanggal Lahir</label>
                                <input type="date" name="brd_date" value="<?= date_format(date_create($user['brd_date']),'Y-m-d') ?>" class="form-control" placeholder="Tanggal lahir" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Address</label>
                            <textarea class="form-control" id="address" name="address" value="<?= $user['address'] ?>" rows="3" placeholder="Alamat"><?= $user['address'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="status" value="published" class="btn btn-primary">Update</button>
                        <a href="javascript:window.history.go(-1);" name="status" value="draft" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
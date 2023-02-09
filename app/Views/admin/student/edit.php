<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Siswa Menu</h3>
                <p class="text-subtitle text-muted">Edit Data Siswa </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Siswa</li>
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
                <p>Edit Data sesuai dengan dengan identitas siswa!, untuk password biarkan kosong bila anda tidak ingin mengubahnya</p>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $validation->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <form action="" method="post" id="text-editor">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id" value="<?= $student['id'] ?>" />
                            <div class="form-group">
                                <label for="title">NISN</label>
                                <input type="text" name="nis" class="form-control" value="<?= $student['nis'] ?>" placeholder="nis" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Nama</label>
                                <input type="text" name="name" class="form-control" value="<?= $student['name'] ?>" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Kelas</label>
                                <select class="form-select" name="class_id" aria-label="Default select example">
                                    <option selected>Kelas</option>
                                    <?php foreach ($class as $item) { ?>
                                        <option value="<?= $item['id'] ?>" <?php if ($student['class_id'] == $item['id']) {
                                                                                echo 'selected';
                                                                            } ?>><?= $item['title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Jenis Siswa</label>
                                <select class="form-select" name="student_type_id" aria-label="Default select example">
                                    <option selected>Pilih Jenis Siswa</option>
                                    <?php foreach ($student_type as $item) { ?>
                                        <option value="<?= $item['id'] ?>" <?php if ($student['student_type_id'] == $item['id']) {
                                                                                echo 'selected';
                                                                            } ?>><?= $item['title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Jenis Kelamin</label>
                                <select class="form-select" name="gender" aria-label="Default select example">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" <?php if ($student['gender'] == 'Laki-Laki') {
                                                                    echo 'selected';
                                                                } ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if ($student['gender'] == 'Perempuan') {
                                                                    echo 'selected';
                                                                } ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Tanggal Lahir</label>
                                <input type="date" name="brd_date" value="<?= $student['brd_date'] ?>" class="form-control" placeholder="Tanggal lahir" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Address</label>
                            <textarea class="form-control" id="address" name="address" value="<?= $student['address'] ?>" rows="3" placeholder="Alamat"><?= $student['address'] ?></textarea>
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
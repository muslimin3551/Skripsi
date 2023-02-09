<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kelas Menu</h3>
                <p class="text-subtitle text-muted">Edit Data Kelas </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Kelas</li>
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
                <p>Edit Data sesuai dengan dengan data kelas dan tahun ajaran!,</p>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $validation->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <form action="" method="post" id="text-editor">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="<?= $class['id'] ?>" />
                            <div class="form-group">
                                <label for="title">Kelas</label>
                                <input type="text" name="title" class="form-control" value="<?= $class['title'] ?>" placeholder="Kelas " required>
                            </div>
                            <div class="form-group">
                                <label for="title">keterangan</label>
                                <textarea class="form-control" id="description" name="description" value="<?= $class['description'] ?>" rows="3" placeholder="Alamat"><?= $class['description'] ?></textarea>
                            </div>
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
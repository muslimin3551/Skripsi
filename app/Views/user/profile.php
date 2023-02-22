<?= $this->extend('template/user/template') ?>

<?= $this->section('content') ?>
<!-- Main Content -->
<section class="p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Profil</h4>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <?php if (session()->getFlashdata('msg_succes')) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('msg_succes') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($validation)) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $validation->listErrors() ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-10">
                            <p></p>
                            <br>
                            <a class="btn btn-success">Ubah Password</a>
                        </div>
                    </div>
                    <br>
                    <form action="" method="post" id="text-editor">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-outline mb-4 text-left">
                                    <span class="badge text-bg-secondary">Nama</span>
                                    <input type="text" name="name" id="name" value="<?= $student['name'] ?>" class="form-control form-control-lg" />
                                </div>
                                <div class="form-outline mb-4 text-left">
                                    <span class="badge text-bg-secondary">Tanggal Lahir</span>
                                    <input type="date" name="brd_date" id="brd_date" value="<?= $student['brd_date'] ?>" class="form-control form-control-lg" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-outline mb-4 text-left">
                                    <span class="badge text-bg-secondary">NIS</span>
                                    <input type="text" name="nis" id="nis" value="<?= $student['nis'] ?>" class="form-control form-control-lg" readonly />
                                </div>
                                <div class="form-outline mb-4 text-left">
                                    <span class="badge text-bg-secondary">Alamat</span>
                                    <textarea class="form-control" id="address" name="address" value="<?= $student['address'] ?>" rows="3" placeholder="Alamat"><?= $student['address'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<?= $this->endSection() ?>
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
                        <div class="col-md-2">
                            <div class="text-center">
                                <img src="assets/images/avatar.jpg" class="rounded" alt="img avatar" width="100px" height="100px">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <p></p>
                            <br>
                            <button class="btn btn-success">Ubah Password</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-outline mb-4 text-left">
                            <span class="badge text-bg-secondary">Nama</span>
                                <input type="text" name="nama" id="nama" value="Tyas dwi" class="form-control form-control-lg"/>
                            </div>
                            <div class="form-outline mb-4 text-left">
                                <span class="badge text-bg-secondary">Tanggal Lahir</span>
                                <input type="text" name="birth_date" id="birth_date" value="03-06-2002" class="form-control form-control-lg"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-outline mb-4 text-left">
                                <span class="badge text-bg-secondary">NIS</span>
                                <input type="text" name="nis" id="nis" value="1112233" class="form-control form-control-lg" readonly/>
                            </div>
                            <div class="form-outline mb-4 text-left">
                                <span class="badge text-bg-secondary">Nomor Telepon</span>
                                <input type="text" name="phone" id="phone" value="0889263728736" class="form-control form-control-lg"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<?= $this->endSection() ?>
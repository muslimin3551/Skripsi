<?= $this->extend('admin/layouts/auth') ?>

<?= $this->section('content') ?>
<div class="row h-100">
    <div class="col-lg-6 d-none d-lg-block">
        <div id="auth-right">
            <div style="margin: 0 auto;" class="text-center">
                <img src="<?= base_url('img/admin_logo_login.png') ?>" width="150px" height="150px" alt="Logo" />
                <p style="color: #ffffff;">SISTEM INFORMASI TRANSAKSI ADMINISTRASI</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div id="auth-left" class="text-center">
            <h5>ADMIN LUPA PASSWORD</h5>
            <br>
            <br>
            <p>Silahkan Masukan NIP anda.</p>
            <br>
            <br>
            <form action="index.html">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="NIP">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <button class="btn btn-success btn-block btn-lg shadow-lg mt-5">Lupa Password</button>
            </form>
            <div class="text-left mt-5 text-lg fs-4">
                <p><a href="<?= base_url('admin/login') ?>" style="color:#018249;font-size: 14px;">kembali ke login!</a></p>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>
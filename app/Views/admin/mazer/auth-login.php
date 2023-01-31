<?= $this->extend('admin/mazer/layouts/auth') ?>

<?= $this->section('content') ?>
<div class="row h-100">
    <div class="col-lg-6 d-none d-lg-block">
        <div id="auth-right" class="text-center">
            <div style="margin: 0 auto;">
                <img src="<?= base_url('img/admin_logo_login.png') ?>" width="150px" height="150px" alt="Logo" />
                <p style="color: #ffffff;">SISTEM INFORMASI TRANSAKSI ADMINISTRASI</p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-12">
        <div id="auth-left" class="text-center">
            <h5>ADMIN LOGIN</h5>
            <br>
            <br>
            <p>Hanya guru dan staff yang memiliki akses yang bisa login ke admin portal sistem informasi administrasi MI Al-Mubarak.</p>
            <br>
            <br>
            <form action="index.html">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button class="btn btn-success btn-block btn-lg shadow-lg mt-5">Log in</button>
            </form>
            <div class="text-left mt-5 text-lg fs-4">
                <p style="font-size: 12px;"><a href="mazer/applications/auth/forgot-password">Lupa password?</a></p>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>
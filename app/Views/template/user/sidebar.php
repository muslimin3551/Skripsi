<nav class="sidebar offcanvas-md offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false">
    <div class="d-flex justify-content-end m-3 d-block d-md-none">
        <button aria-label="Close" data-bs-dismiss="offcanvas" data-bs-target=".sidebar" class="btn p-0 border-0 fs-4">
            <i class="fas fa-close"></i>
        </button>
    </div>
    <div class="d-flex justify-content-center mt-md-5 mb-5">
        <img src="<?= base_url('img/logo.png') ?>" alt="Logo" width="" height="40px" />
    </div>
    <div class="pt-2 d-flex flex-column gap-5">
        <div class="menu p-0">
            <p>Menu Utama</p>
            <a href="/dashboard" class="item-menu">
                <i class="icon ic-stats"></i>
                Dasboard
            </a>
            <a href="/invoice" class="item-menu">
                <i class="icon ic-trans"></i>
                Tagihan
            </a>
            <a href="/payment" class="item-menu">
                <i class="icon ic-trans"></i>
                Riwayat pembayaran
            </a>
            <a href="/profile" class="item-menu">
                <i class="icon ic-account"></i>
                Profil
            </a>
        </div>
        <div class="menu">
            <p>Lainnya</p>
            <a href="<?= base_url('logout') ?>" class="item-menu">
                <i class="icon ic-logout"></i>
                Keluar
            </a>
        </div>
    </div>
</nav>
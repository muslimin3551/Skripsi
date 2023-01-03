<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="col-md-6">
        <a href="#first"><img src="<?= base_url('img/logo.png') ?>" alt="global institute"></a>
    </div>
    <div class="col-md-6 text-align-right">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ml-2">
                    <a class="nav-link" href="#home">OUR FEATURES</a>
                </li>
                <li class="nav-item ml-2">
                    <a class="nav-link" href="#about">ABOUT US</a>
                </li>
                <li class="nav-item ml-4">
                    <a href="<?= base_url('/user/login') ?>" class="btn btn-primary login-btn">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
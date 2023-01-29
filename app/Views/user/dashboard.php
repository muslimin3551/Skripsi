<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Menarra Finance Dashboard Page" />
    <meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap, Chart JS" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Rachma | @rachmadzii" />

    <title>MI AL-Mubarok - Dashboard</title>

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

    <!-- External CSS -->
    <link rel="stylesheet" href="assets/css/styles.css" type="text/css" media="screen" />

    <!-- CDN Fontawesome -->
    <script src="https://kit.fontawesome.com/32f82e1dca.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Nav Sidebar -->
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
                <a href="#" class="item-menu active">
                    <i class="icon ic-stats"></i>
                    Dasboard
                </a>
                <a href="#" class="item-menu">
                    <i class="icon ic-trans"></i>
                    Tagihan
                </a>
                <a href="#" class="item-menu">
                    <i class="icon ic-trans"></i>
                    Riwayat pembayaran
                </a>
                <a href="#" class="item-menu">
                    <i class="icon ic-account"></i>
                    Profil
                </a>
            </div>
            <div class="menu">
                <p>Lainnya</p>
                <a href="#" class="item-menu">
                    <i class="icon ic-logout"></i>
                    Keluar
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="content">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div>
                    <button class="sidebarCollapseDefault btn p-0 border-0 d-none d-md-block" aria-label="Hamburger Button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <button data-bs-toggle="offcanvas" data-bs-target=".sidebar" aria-controls="sidebar" aria-label="Hamburger Button" class="sidebarCollapseMobile btn p-0 border-0 d-block d-md-none">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
                <div class="d-flex align-items-center justify-item-center justify-content-end gap-4">
                    <p>Selamat Pagi, <strong>Tiyas Dwi</strong> </p>
                    <img src="assets/images/avatar.jpg" alt="Photo Profile" class="avatar" />
                </div>
            </div>
        </nav>
        <section class="p-3">
            <div class="information d-flex flex-column gap-5">
                <div class="row">
                    <div class="col-md-6 card debit">

                    </div>
                    <div class="col-md-6 card balance">
                        <p>My Balance</p>
                        <h2>$90,500,000</h2>
                        <div>
                            <p class="m-0 fw-bold">+22%</p>
                        </div>
                    </div>
                </div>
                <div class="row px-1 d-flex justify-content-between">
                    <div class="col-xl-6 col-12 p-0 mb-5 mb-xl-0 revenue">
                        <h5>Revenue Past 6 Months</h5>
                        <div>
                            <canvas id="chart-revenue" width="100%"></canvas>
                        </div>
                    </div>
                    <div class="col-xl-6 col-12 p-0 ps-xl-4 transaction">
                        <h5>Latest Transactions</h5>
                        <div class="d-flex flex-column gap-4">
                            <div class="d-flex flex-row gap-3">
                                <div class="icon-history">
                                    <img src="assets/images/ic_spotify.svg" width="32" height="32" />
                                </div>
                                <div class="trans-history flex-fill">
                                    <div>
                                        <p class="m-0 title">Spotify</p>
                                        <p class="m-0 date">12 Jan</p>
                                    </div>
                                    <p class="m-0 outcome">- $20,000</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row gap-3">
                                <div class="icon-history">
                                    <img src="assets/images/ic_receive_act.svg" width="32" height="32" />
                                </div>
                                <div class="trans-history flex-fill">
                                    <div>
                                        <p class="m-0 title">Top Up BCA</p>
                                        <p class="m-0 date">12 Jan</p>
                                    </div>
                                    <p class="m-0 income">+ $120,000</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row gap-3">
                                <div class="icon-history">
                                    <img src="assets/images/ic_send_act.svg" width="32" height="32" />
                                </div>
                                <div class="trans-history flex-fill">
                                    <div>
                                        <p class="title m-0">Send to @anggapro</p>
                                        <p class="date m-0">12 Jan</p>
                                    </div>
                                    <p class="outcome m-0">- $6,000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="assets/js/donut_chart.js"></script>
    <script src="assets/js/line_chart.js"></script>

    <script>
        $(document).ready(function() {
            $('.sidebarCollapseDefault').on('click', function() {
                $('.sidebar').toggleClass('active');
                $('.content').toggleClass('active');
            });
        });
    </script>
</body>

</html>
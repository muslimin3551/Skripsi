<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/admin/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/admin/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/admin/assets/css/app.css">
    <?= $this->renderSection('styles') ?>
    <link rel="shortcut icon" href="/admin/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <!-- Sidebar -->
        <?= $this->include('admin/mazer/layouts/sidebar') ?>
        <!-- End Sidebar -->

        <!-- Main -->
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <!-- Content -->
            <?= $this->renderSection('content') ?>
            <!-- End Content -->
            
            <!-- Footer -->
            <?= $this->include('admin/mazer/layouts/footer') ?>
            <!-- End Footer -->
        </div>
        <!-- End Main -->
    </div>

    <script src="/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/admin/assets/js/bootstrap.bundle.min.js"></script>

    <?= $this->renderSection('javascript') ?>

    <script src="/admin/assets/js/main.js"></script>
</body>
</html>

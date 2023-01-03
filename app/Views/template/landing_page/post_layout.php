<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LANDING PAGE</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!-- Bootstrap CSS -->
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css')?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Poppins', sans-serif;">

    <?= $this->include('layout/landing_page/navbar') ?>

    
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?= $this->renderSection('content') ?>
            </div>
            <div class="col-md-4">
                <?= $this->include('layout/landing_page/sidebar') ?>
            </div>
        </div>
    </div>

    <?= $this->include('layout/landing_page/footer') ?>

	<!-- Jquery dan Bootsrap JS -->
	<!-- <script src="<?= base_url('js/jquery.min.js') ?>"></script> -->
	<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>

</body>

</html>
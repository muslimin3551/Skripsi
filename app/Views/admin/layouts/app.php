<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/admin/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/admin/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/admin/assets/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <?= $this->renderSection('styles') ?>
    <link rel="shortcut icon" href="/admin/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <!-- Sidebar -->
        <?= $this->include('admin/layouts/sidebar') ?>
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
            <?= $this->include('admin/layouts/footer') ?>
            <!-- End Footer -->
        </div>
        <!-- End Main -->
    </div>

    <script src="/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?= $this->renderSection('javascript') ?>

    <script src="/admin/assets/js/main.js"></script>
</body>

<script>
    $(document).ready(function() {
        $('#user').DataTable();
        $(document).ready(function() {
            $('#report_invoice').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            });
        });
    });

    function addForm() {
        // var addrow = '<div class="form-group baru-data">\
        //                     <div class=" form-group">\
        //                         <label for="title">Item</label>\
        //                         <input type="text" name="title" class="form-control" placeholder="Item " required>\
        //                     </div>\
        //                     <div class="form-group">\
        //                         <label for="title">Keterangan</label>\
        //                         <textarea class="form-control" id="description_item" name="description_item" rows="3" placeholder="Keterangan "></textarea>\
        //                     </div>\
        //                     <div class=" form-group">\
        //                         <label for="title">Jumlah</label>\
        //                         <input type="number" min="0"  name="qty" id="qty" class="form-control" placeholder="Jumlah " required>\
        //                     </div>\
        //                     <div class=" form-group">\
        //                         <label for="title">Harga</label>\
        //                         <input type="number" min="0"  name="rate" id="rate" class="form-control" placeholder="Harga " required>\
        //                     </div>\
        //                     <div class="button-group">\
        //                         <button type="button" class="btn btn-success btn-tambah">tambah</button>\
        //                         <button type="button" class="btn btn-danger btn-hapus" style="display:none;">hapus</button>\
        //                     </div>\
        //                 </div>'
        // $("#dynamic_form").append(addrow);
    }

    $("#dynamic_form").on("click", ".btn-tambah", function() {
        // addForm()
        // $(this).css("display", "none")
        // var valtes = $(this).parent().find(".btn-hapus").css("display", "");
        var qty = $('#qty').val()
        var rate = $('#rate').val()
        var total = (qty * rate)
        $('#total').val(total);
    })

    $("#dynamic_form").on("click", ".btn-hapus", function() {
        // $(this).parent().parent('.baru-data').remove();
        // var bykrow = $(".baru-data").length;
        // if (bykrow == 1) {
        //     $(".btn-hapus").css("display", "none")
        //     $(".btn-tambah").css("display", "");
        // } else {
        //     $('.baru-data').last().find('.btn-tambah').css("display", "");
        // }
        var qty = $('#qty').val()
        var rate = $('#rate').val()
        var total = (qty * rate)
        $('#total').val(total);
    });

    $('.btn-simpan').on('click', function() {
        $('#dynamic_form').find('input[type="text"], input[type="number"], select, textarea').each(function() {
            if ($(this).val() == "") {
                event.preventDefault()
                $(this).css('border-color', 'red');

                $(this).on('focus', function() {
                    $(this).css('border-color', '#ccc');
                });
            }
        })
    })
    <?php $uri = service('uri')->getSegments(); ?>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                    label: '# jumlah tagihan',
                    data: [<?php if ($uri[1] == 'dashboard') {
                                echo  $sum_total_january;
                            } ?>, <?php if ($uri[1] == 'dashboard') {
                                        echo  $sum_total_february;
                                    } ?>, <?php if ($uri[1] == 'dashboard') {
                                                echo  $sum_total_maret;
                                            } ?>, <?php if ($uri[1] == 'dashboard') {
                                                    echo  $sum_total_april;
                                                } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_mei;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_juni;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_juli;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_agustus;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_september;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_oktober;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_november;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_desember;
                                                        } ?>],
                    borderWidth: 1
                },
                {
                    label: '# jumlah pembayarana',
                    data: [<?php if ($uri[1] == 'dashboard') {
                                echo  $sum_total_january_payment;
                            } ?>, <?php if ($uri[1] == 'dashboard') {
                                        echo  $sum_total_february_payment;
                                    } ?>, <?php if ($uri[1] == 'dashboard') {
                                                echo  $sum_total_maret_payment;
                                            } ?>, <?php if ($uri[1] == 'dashboard') {
                                                    echo  $sum_total_april_payment;
                                                } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_mei_payment;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_juni_payment;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_juli_payment;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_agustus_payment;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_september_payment;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_oktober_payment;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_november_payment;
                                                        } ?>, <?php if ($uri[1] == 'dashboard') {
                                                            echo  $sum_total_desember_payment;
                                                        } ?>],
                    borderWidth: 1
                },
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    $(document).on('change', '.pilih', function(e) {
        var selectedValue = $('select[name="item"]').val();
        var selectedValuesArray = selectedValue.split(',');
        var id = selectedValuesArray[0];
        var title = selectedValuesArray[1];
        var description = selectedValuesArray[2];
        var qty = selectedValuesArray[3];
        var rate = selectedValuesArray[4];
        document.getElementById("item_id").value = id;
        document.getElementById("title").value = title;
        document.getElementById("description_item").value = description;
        document.getElementById("qty").value = qty;
        document.getElementById("rate").value = rate;
    });
</script>

</html>
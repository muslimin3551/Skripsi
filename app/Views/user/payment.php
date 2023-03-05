<?= $this->extend('template/user/template') ?>

<?= $this->section('content') ?>
<!-- Main Content -->
<section class="p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p>Admin Note</p>
                    <p>
                        List tagihan anda sebagai berikut bila anda merasa sudah membayarkan,
                        dan status masih belum terupdate bisa konta bagian Tata Usaha.
                    </p>
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
                        <div class="col-md-8">
                            <h5>List Data Tagihan</h5>
                        </div>
                        <div class="col-md-4">
                            <!-- <select class="form-select" id="payment_type" aria-label="Default select example" onchange="filter_payment()">
                                <option value="" selected>Filter Jenis Pembayaran</option>
                                <?php foreach ($payment_type as $item) { ?>
                                    <option value="<?= $item['id'] ?>" <?php if ($payment_type_selected == $item['id']) {
                                                                            echo 'selected';
                                                                        } ?>><?= $item['title'] ?></option>
                                <?php } ?>
                            </select> -->
                        </div>
                    </div>
                    <hr>
                    <br>
                    <table id="invoice" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Tagihan</th>
                                <th>Jenis Pembayaran</th>
                                <th>Jumlah Tagihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($payment != null) { ?>
                                <?php $no = 1 ?>
                                <?php foreach ($payment as $row) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <a href="<?= site_url('payment/detail/' . $row['id']) ?>" style="color: #018249;text-decoration:none;"><?= get_invoice_number($row['invoice_id']) ?></a>
                                        </td>
                                        <td><?= get_payement_type($row['payment_type_id']) ?></td>
                                        <td>Rp <?= $row['total'] ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<?= $this->endSection() ?>
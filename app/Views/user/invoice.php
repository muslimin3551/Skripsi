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
                            <select class="form-select" id="status" aria-label="Default select example" onchange="filter_invoice()">
                                <option value="" selected>Filter Status</option>
                                <option value="3" <?php if ($status_selected == 3) {
                                                        echo 'selected';
                                                    } ?>>Lunas</option>
                                <option value="1" <?php if ($status_selected == 1) {
                                                        echo 'selected';
                                                    } ?>>Belum Lunas</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <table id="invoice" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Tagihan</th>
                                <th>Status Tagihan</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal Tagihan</th>
                                <th>Tanggal Jatuh Tempo</th>
                                <th>Jumlah Tagihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($invoice as $row) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <a href="<?= site_url('invoice/detail/' . $row['id']) ?>" style="color: #018249;text-decoration:none;"><?= $row['invoice_number'] ?></a>
                                    </td>
                                    <td><?= get_status_pembayaran($row['invoice_status']) ?></td>
                                    <td><?= get_student_name($row['student_id']) ?></td>
                                    <td><?= $row['start_date'] ?></td>
                                    <td><?= $row['due_date'] ?></td>
                                    <td>Rp <?= $row['total'] ?></td>
                                </tr>
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
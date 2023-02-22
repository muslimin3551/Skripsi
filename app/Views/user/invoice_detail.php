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
                        <div class="col-md-6">
                            <div class="text-center">
                                <h4>Detail Data Tagihan</h4>
                            </div>
                            <hr>
                            <br>
                            <table class="table table-border">
                                <tr>
                                    <td>Nomor Invoice</td>
                                    <td>:</td>
                                    <td>INV<?= $invoice['invoice_number'] ?></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><?= $invoice['description'] ?></td>
                                </tr>
                                <tr>
                                    <td>Status Tagihan</td>
                                    <td>:</td>
                                    <td><?= get_status_pembayaran($invoice['invoice_status']) ?></td>
                                </tr>
                                <tr>
                                    <td>Tagihan Tagihan</td>
                                    <td>:</td>
                                    <td><?= $invoice['start_date'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tagihan Jatuh Tempo</td>
                                    <td>:</td>
                                    <td><?= $invoice['due_date'] ?></td>
                                </tr>
                                <tr>
                                    <td>nama Siswa</td>
                                    <td>:</td>
                                    <td><?= get_student_name($invoice['student_id']) ?></td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td>:</td>
                                    <td><?= $invoice['admin_note'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center">
                                <h4>Detail Data Item Tagihan</h4>
                            </div>
                            <hr>
                            <br>
                            <table class="table table-border">
                                <tr>
                                    <td>#nomer</td>
                                    <td>#Keterangan</td>
                                    <td>#Jumlah</td>
                                    <td>#Total</td>
                                </tr>
                                <?php $no = 1 ?>
                                <?php foreach ($itemable as $row) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['description'] ?></td>
                                        <td><?= $row['qty'] ?></td>
                                        <td>Rp <?= $row['rate'] ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                            <br>
                            <br>
                            <br>
                            <br>
                            <table class="table table-border">
                                <tr>
                                    <td>Total Yang harus di Bayar</td>
                                    <td>:</td>
                                    <td>Rp <?= $invoice['total'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<?= $this->endSection() ?>
<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>INV200023001</h3>
                <p class="text-subtitle text-muted">Detail Data Tagihan </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Tagihan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <?php if (session()->getFlashdata('msg_succes')) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('msg_succes') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <section class="section">
        <div class="card">
            <div class="card-body"></div>
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
            <br>
            <?php if ($invoice['invoice_status'] != 3) { ?>
                <div class="row">
                    <div class="col-md-12 text-end">
                        <a href="<?= base_url('admin/payment/paid/' . $invoice['id']) ?>" class="btn btn-success" style="margin-right: 2%;">Bayar Sekarang</a>
                    </div>
                </div>
            <?php } ?>
            <br>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
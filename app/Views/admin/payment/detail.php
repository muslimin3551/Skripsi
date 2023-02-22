<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>INV200023001</h3>
                <p class="text-subtitle text-muted">Detail Data Pembayaran </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pembayaran</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="text-center">
                            <h4>Detail Data Pembayaran</h4>
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
                                <td><span class="badge text-bg-info"><?= get_payement_type($payment['payment_type_id']) ?></span></td>
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
                                <td><?= $payment['note'] ?></td>
                            </tr>
                            <tr>
                                <td>Total Tagihan</td>
                                <td>:</td>
                                <td>Rp <?= $invoice['total'] ?></td>
                            </tr>
                            <tr>
                                <td>Total Pembayaran</td>
                                <td>:</td>
                                <td>Rp <?= $payment['total'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="text-center">
                            <h4>Bukti Transfer</h4>
                            <p>Hanya muncul jika metode pembayaran dengan menggunakan Bank Transfer</p>
                        </div>
                        <hr>
                        <img src="/uploads/<?= $payment['file'] ?>" alt="bukti transfer" width="90%" height="350px">
                    </div>
                </div>
                <br>
                <br>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
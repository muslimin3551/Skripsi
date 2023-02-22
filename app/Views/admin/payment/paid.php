<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Menu Item</h3>
                <p class="text-subtitle text-muted">Form Pembayaran</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Pembayaran</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"></h4>
            </div>
            <div class="card-body">
                <p>Form Pembayaran!</p>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $validation->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('admin/payment/add') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="invoice_id" value='<?= $invoice['id'] ?>'>
                            <div class="form-group">
                                <label for="title">Nomor Pembarana</label>
                                <input type="text" name="title" value='<?= $invoice['invoice_number'] ?>' class="form-control" placeholder="Nama Item" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="title">Jenis Pembayaran</label>
                                <select class="form-select choices form-select" name="payment_type_id" aria-label="Default select example" required>
                                    <?php foreach ($payment_type as $item) { ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['title'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Total</label>
                                <input type="number" min="0" name="total" value="<?= $invoice['total']; ?>" class="form-control" placeholder="Total tagihan " required>
                            </div>
                            <p style="font-size: 12px;">Jika total yang di masukan kurang dari jumalah tagihan maka status invoice akan menjadi partial dan sisa dari kekurangn pembayran akan kembali di tagihkan oleh pihak TU</p>
                            <div class="form-group">
                                <label for="title">Bukti Transfer</label>
                                <input type="file" name="file" class="form-control" placeholder="masukan bukti transfer">
                            </div>
                            <p style="font-size: 12px;">masukan bukti pembayran jika jenis pembayran menggunakan BANK TRANSFER</p> 
                            <div class="form-group">
                                <label for="title">Keterangan</label>
                                <textarea class="form-control" id="note" name="note" rows="3" placeholder="Keterangan " required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Tambah</button>
                        <a href="javascript:window.history.go(-1);" value="draft" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
<?= $this->section('styles') ?>
<link rel="stylesheet" href="/admin/assets/vendors/choices.js/choices.min.css" />
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="/admin/assets/vendors/choices.js/choices.min.js"></script>
<?= $this->endSection() ?>

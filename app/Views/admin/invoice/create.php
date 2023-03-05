<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Menu Item</h3>
                <p class="text-subtitle text-muted">Tambah Data Tagihan </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Tagihan</li>
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
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $validation->listErrors() ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('admin/invoice/add') ?>" method="post">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="text-center">
                                <h2>Data Tagihan</h2>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="title">Nomor Tagihan</label>
                                <input type="text" name="invoice_number" value="<?= $invoice_number ?>" class="form-control" placeholder="Nomor Tagihan" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="title">Tagihan</label>
                                <input type="text" name="description" class="form-control" placeholder="Tagihan" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Siswa</label>
                                <select class="form-select choices form-select" name="student_id" aria-label="Default select example" required>
                                    <option value="">Pilih siswa</option>
                                    <?php foreach ($student as $item) { ?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Tanggal Tagihan</label>
                                <input type="date" name="start_date" class="form-control" placeholder="Tanggal Tagihan" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Tanggal Jatuh Tempo</label>
                                <input type="date" name="due_date" class="form-control" placeholder="Tanggal Jatuh Tempo" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Keterangan Admin</label>
                                <textarea class="form-control" id="admin_note" name="admin_note" rows="3" placeholder="Keterangan "></textarea>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="text-center">
                                <h2>Data Item</h2>
                            </div>
                            <hr>
                            <div class="row" id="dynamic_form">
                                <div class="form-group baru-data">
                                    <input type="hidden" name="item_id" id="item_id">
                                    <input type="hidden" name="title" id="title">
                                    <div class=" form-group">
                                        <label for="title">Item</label>
                                        <select class="form-select pilih" name="item" id="item" aria-label="Default select example" required>
                                            <option value="">Pilih Item</option>
                                            <?php foreach ($items as $row) { ?>
                                                <option value="<?= $row['id'] . ',' . $row['title'] . ',' . $row['description'] . ',' . $row['qty'] . ',' . $row['rate'] ?>"><?= $row['title'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Keterangan</label>
                                        <textarea class="form-control" id="description_item" name="description_item" rows="3" placeholder="Keterangan "></textarea>
                                    </div>
                                    <div class=" form-group">
                                        <label for="title">Jumlah</label>
                                        <input type="number" min="0" name="qty" id="qty" class="form-control" placeholder="Jumlah " required>
                                    </div>
                                    <div class=" form-group">
                                        <label for="title">Harga</label>
                                        <input type="number" min="0" name="rate" id="rate" class="form-control" placeholder="Harga " required>
                                    </div>
                                    <div class="button-group">
                                        <button type="button" class="btn btn-success btn-tambah">hitung</button>
                                        <button type="button" class="btn btn-danger btn-hapus" style="display:none;">hapus</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Jumlah Total</h4>
                                </div>
                                <div class="col-md-2 text-end">
                                    <h4>Rp</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="number" min="0" name="total" id="total" class="form-control" placeholder="Total " required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-end">
                            <button type="submit" class="btn btn-success btn-simpan">Tambah</button>
                            <a href="javascript:window.history.go(-1);" value="draft" class="btn btn-secondary">Kembali</a>
                        </div>
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
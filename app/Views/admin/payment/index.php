<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Admin Menu</h3>
                <p class="text-subtitle text-muted">Lis Data Riwayat Pembayaran </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Riwayat Pembayaran</li>
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
                <table id="user" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomer Tagihan</th>
                            <th>Keterangan</th>
                            <th>Jenis Pembayaran</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal</th>
                            <th>Total Tagihan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>INV202300001</td>
                            <td>Pembayaran SPP bulan januari 2023</td>
                            <td>Bank Transfer</td>
                            <td>Muslimin</td>
                            <td>31 Januari 2023</td>
                            <td>Rp 175.000</td>
                            <td>
                                <a href=""><span class="badge text-bg-success">Edit</span></a>
                                <a href=""><span class="badge text-bg-danger">Delete</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>INV202300002</td>
                            <td>Pembayaran SPP bulan januari 2023</td>
                            <td>Bank Transfer</td>
                            <td>Muslimin</td>
                            <td>31 Februari 2023</td>
                            <td>Rp 175.000</td>
                            <td>
                                <a href=""><span class="badge text-bg-success">Edit</span></a>
                                <a href=""><span class="badge text-bg-danger">Delete</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>INV202300003</td>
                            <td>Pembayaran SPP bulan januari 2023</td>
                            <td>Bank Transfer</td>
                            <td>Muslimin</td>
                            <td>31 Maret 2023</td>
                            <td>Rp 175.000</td>
                            <td>
                                <a href=""><span class="badge text-bg-success">Edit</span></a>
                                <a href=""><span class="badge text-bg-danger">Delete</span></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Admin Menu</h3>
                <p class="text-subtitle text-muted">Lis Data Akses Menu</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Akses Menu</li>
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
                            <th>Nama Role</th>
                            <th>Akses</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Super Admin</td>
                            <td>Tagihan</td>
                            <td>
                                <a href=""><span class="badge text-bg-success">Edit</span></a>
                                <a href=""><span class="badge text-bg-danger">Delete</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Super Admin</td>
                            <td>Riwayat Pembayaran</td>
                            <td>
                                <a href=""><span class="badge text-bg-success">Edit</span></a>
                                <a href=""><span class="badge text-bg-danger">Delete</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Super Admin</td>
                            <td>Tagihan</td>
                            <td>
                                <a href=""><span class="badge text-bg-success">Edit</span></a>
                                <a href=""><span class="badge text-bg-danger">Delete</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Super Admin</td>
                            <td>Role Akses</td>
                            <td>
                                <a href=""><span class="badge text-bg-success">Edit</span></a>
                                <a href=""><span class="badge text-bg-danger">Delete</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Super Admin</td>
                            <td>User</td>
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
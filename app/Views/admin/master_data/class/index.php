<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Admin Menu</h3>
                <p class="text-subtitle text-muted">Lis Data Kelas </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kelas</li>
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
                            <th>Nama Kelas</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Kelas 1 2023</td>
                            <td>Kelas 1 tahun angkatan 2023</td>
                            <td>
                                <a href=""><span class="badge text-bg-success">Edit</span></a>
                                <a href=""><span class="badge text-bg-danger">Delete</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kelas 2 2023</td>
                            <td>Kelas 2 tahun angkatan 2023</td>
                            <td>
                                <a href=""><span class="badge text-bg-success">Edit</span></a>
                                <a href=""><span class="badge text-bg-danger">Delete</span></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Kelas 3 2023</td>
                            <td>Kelas 3 tahun angkatan 2023</td>
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
<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Admin Menu</h3>
                <p class="text-subtitle text-muted">Lis Data Jenis Siswa </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jenis Siswa</li>
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
            <div class="card-header">
                <p>Data Jenis siswa di bawah adalah data yang meng katagorikan siswa!</p>
                <a href="/admin/student_type/new" class="btn btn-success">Tambah Data Jenis Siswa</a>
                <br>
                <br>
            </div>
            <div class="card-body">
                <table id="user" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($student_type as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['title'] ?></td>
                                <td><?= $row['description'] ?></td>
                                <td>
                                    <a href="<?= base_url('admin/student_type/' . $row['id'] . '/edit') ?>" class="btn btn-sm btn-outline-success m-1">Edit</a>
                                    <!-- <a href="#" data-href="<?= base_url('admin/student_type/' . $row['id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger m-1">Delete</a> -->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="h2">Apakah anda yakin ingin menghapus data ini?</h2>
                <p>Data akan terhapus permanen</p>
            </div>
            <div class="modal-footer">
                <a href="#" role="button" id="delete-button" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmToDelete(el) {
        $("#delete-button").attr("href", el.dataset.href);
        $("#confirm-dialog").modal('show');
    }
</script>
<?= $this->endSection() ?>
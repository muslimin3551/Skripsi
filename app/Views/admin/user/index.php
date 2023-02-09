<?= $this->extend('admin/layouts/app') ?>
<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>User Menu</h3>
                <p class="text-subtitle text-muted">Lis Data User </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Layout Default</li>
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
                <p>Data user di bawah adalah data user yang bisa mengakses halaman adminitrator sesuai dengan role nya!</p>
                <a href="/admin/user/new" class="btn btn-success">Tambah Data User</a>
                <br>
                <br>
            </div>
            <div class="card-body">
                <table id="user" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($user as $row) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nip'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= get_role_name($row['role_id']) ?></td>
                                <td><?= $row['email'] ?></td>
                                <td>
                                    <a href="<?= base_url('admin/user/' . $row['id'] . '/edit') ?>" class="btn btn-sm btn-outline-success m-1">Edit</a>
                                    <a href="#" data-href="<?= base_url('admin/user/' . $row['id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger m-1">Delete</a>
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
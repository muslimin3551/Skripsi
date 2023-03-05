<?= $this->extend('template/user/template') ?>

<?= $this->section('content') ?>
<!-- Main Content -->
<section class="p-3">
    <div class="information d-flex flex-column gap-5">
        <div class="row">
            <div class="col-md-6 card debit">
                <p>Total Tagihan</p>
                <h4>Rp <?= number_format($total_tagihan, 2, ',', '.'); ?></h4>
                <a href="/invoice" class="btn btn-success" style="background-color: #ffffff;color: #018249;">
                    <Detail class="fa-solid fa-wallet"> Detail</i>
                </a>
            </div>
            <div class="col-md-6">
                <h4>Apa yang ada di sini!</h4>
                <p>menu yang bisa di akses pengguna</p>
                <a href="/invoice" class="btn btn-light" style="background-color:#ffffff;color: #000000;">
                    <i class="fa-solid fa-wallet"></i>
                    <p>Tagihan</p>
                </a>
                <a href="/payment" class="btn btn-light" style="background-color:#ffffff;color: #000000;">
                    <i class="fa-solid fa-credit-card"></i>
                    <p>Riwayat Pembayaran</p>
                </a>
            </div>
        </div>
        <div class="row px-1 d-flex justify-content-between">
            <div class="col-xl-6 col-12 p-0 mb-5 mb-xl-0 revenue">
                <h5>Tagihan Yang perlu di bayar</h5>
                <div>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Hari Ini</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Bulan Ini</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">tahun ini</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <table class="table">
                                <tbody>
                                    <?php if ($invoice_today) { ?>
                                        <?php
                                        $no = 1;
                                        foreach ($invoice_today as $row) { ?>
                                            <tr>
                                                <td scope="row"><?php $no++ ?></td>
                                                <td>
                                                    <a href="<?= site_url('invoice/detail/' . $row['id']) ?>" style="color: #018249;text-decoration:none;"><?= $row['invoice_number'] ?></a>
                                                </td>
                                                <td><?= $row['description'] ?></td>
                                                <td>Rp <?= number_format($row['total'], 2, ',', '.'); ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <p>Tagihan tidak di temukan</p>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <button class="btn btn-success">Lihat Semua</button>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            <table class="table">
                                <tbody>
                                    <?php if ($invoice_monthly) { ?>
                                        <?php
                                        $no = 1;
                                        foreach ($invoice_monthly as $row) { ?>
                                            <tr>
                                                <td scope="row"><?php $no++ ?></td>
                                                <td>
                                                    <a href="<?= site_url('invoice/detail/' . $row['id']) ?>" style="color: #018249;text-decoration:none;"><?= $row['invoice_number'] ?></a>
                                                </td>
                                                <td><?= $row['description'] ?></td>
                                                <td>Rp <?= number_format($row['total'], 2, ',', '.'); ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <p>Tagihan tidak di temukan</p>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <button class="btn btn-success">Lihat Semua</button>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                            <table class="table">
                                <tbody>
                                    <?php if ($invoice_yearly) { ?>
                                        <?php
                                        $no = 1;
                                        foreach ($invoice_yearly as $row) { ?>
                                            <tr>
                                                <td scope="row"><?php $no++ ?></td>
                                                <td>
                                                    <a href="<?= site_url('invoice/detail/' . $row['id']) ?>" style="color: #018249;text-decoration:none;"><?= $row['invoice_number'] ?></a>
                                                </td>
                                                <td><?= $row['description'] ?></td>
                                                <td>Rp <?= number_format($row['total'], 2, ',', '.'); ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <p>Tagihan tidak di temukan</p>
                                    <?php } ?>
                                </tbody>
                                </tbody>
                            </table>
                            <button class="btn btn-success">Lihat Semua</button>
                        </div>
                    </div>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-12 p-0 ps-xl-4 transaction">
                <h5></h5>
                <div class="d-flex flex-column gap-4">
                    <div class="col-md-12 card note">
                        <div class="col-md-8">
                            <h5>Keterangan</h5>
                            <p>Bila Merasa sudah membayarkan
                                tagihan tetepi di sistem masih
                                terdapat tagihan yang belum
                                di bayar bisa langsung
                                kontak bagian TU</p>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<?= $this->endSection() ?>
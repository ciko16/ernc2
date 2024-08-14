<div class="container-fluid">
    <!-- <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1> -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-custom-success">
                    Detail Peminjaman Lab
                </div>
                <div class="card-body">
                    <h2 class="card-title mb-4"><?= $peminjaman_lab['nama']; ?></h2>
                    <!-- <h6 class="card-subtitle mb-2 text-muted"></h6> -->
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Asal Instansi</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $peminjaman_lab['asal_instansi']; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Keperluan</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6 font-weight-bold"><?= $peminjaman_lab['keperluan']; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Biaya</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= 'Rp.' . number_format($peminjaman_lab['biaya'], 0, ',', '.'); ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Nomor Whatsapp</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $peminjaman_lab['no_whatsapp']; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Bukti Pembayaran</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6">
                            <?php if (!empty($peminjaman_lab['bukti_pembayaran'])): ?>
                                <a href="<?= base_url('assets/img/peminjaman/' . $peminjaman_lab['bukti_pembayaran']); ?>" data-lightbox="image-1" data-title="Bukti Pembayaran <?=$peminjaman_lab['bukti_pembayaran']?>">
                                    <img src="<?= base_url('assets/img/peminjaman/' . $peminjaman_lab['bukti_pembayaran']); ?>" alt="Bukti Pembayaran" class="img-thumbnail" style="max-width: 200px;">
                                </a>
                            <?php else: ?>
                                Tidak ada bukti pembayaran
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Status</div>
                        <div class="col-md-2">:</div>
                        <?php 
                $status_class = '';
                if ($peminjaman_lab['status_peminjaman'] == 'Ditolak') {
                    $status_class = 'text-danger';
                } elseif ($peminjaman_lab['status_peminjaman'] == 'Selesai') {
                    $status_class = 'text-success';
                }
                ?>
                        <div class="col-md-6 <?= $status_class ?>"><?= $peminjaman_lab['status_peminjaman']; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Tanggal Input</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6 font-weight-bold"><?=date('d F Y', strtotime($peminjaman_lab['created_date'])); ?></div>
                    </div>

                </div>
                <div class="card-footer justify-content-center">
                    <a href="<?= base_url('PeminjamanLab') ?>" class="btn btn-danger">Tutup</a>
                </div>
            </div>
        </div>
    </div>
</div>
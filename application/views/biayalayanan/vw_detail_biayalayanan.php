<div class="container-fluid">
    <!-- <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1> -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-custom-success">
                    Detail Biaya Layanan Lab
                </div>
                <div class="card-body">
                    <!-- <h2 class="card-title mb-4"><?= $biaya_layanan['nama']; ?></h2>
                    <h6 class="card-subtitle mb-2 text-muted"></h6> -->

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Keperluan</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6 font-weight-bold"><?= $biaya_layanan['keperluan']; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Biaya</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= 'Rp.' . number_format($biaya_layanan['biaya'], 0, ',', '.'); ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Kategori</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6 font-weight-bold"><?= $biaya_layanan['kategori']; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Keperluan</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6 font-weight-bold"><?= $biaya_layanan['keperluan']; ?></div>
                    </div>

                </div>
                <div class="card-footer justify-content-center">
                    <a href="<?= base_url('BiayaLayanan') ?>" class="btn btn-danger">Tutup</a>
                </div>
            </div>
        </div>
    </div>
</div>
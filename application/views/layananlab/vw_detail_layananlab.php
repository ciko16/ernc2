<div class="container-fluid">
    <!-- <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1> -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-custom-success">
                    Detail Layanan Lab
                </div>
                <div class="card-body">
                    <h2 class="card-title mb-4"><?= $layanan_lab['nama']; ?></h2>
                    <!-- <h6 class="card-subtitle mb-2 text-muted"></h6> -->
                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Asal Instansi</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $layanan_lab['asal_instansi']; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Keperluan</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6 font-weight-bold"><?= $layanan_lab['keperluan']; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Jumlah Pengujian</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= $layanan_lab['jumlah_sampel']; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Biaya</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6"><?= 'Rp.' . number_format($layanan_lab['biaya'], 0, ',', '.'); ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Nomor Whatsapp</div>
                        <div class="col-md-2">:</div>
                        <!-- memberikan tombol mengarahkan ke whatsapp pelanggan -->
                        <?php if(isset($layanan_lab['no_whatsapp']) && !empty($layanan_lab['no_whatsapp'])): ?>
                            <?php
                            // Ambil nomor WhatsApp dari database
                            $no_whatsapp = $layanan_lab['no_whatsapp'];
                            // Bersihkan nomor dari spasi, tanda, atau karakter yang tidak diperlukan
                            $no_whatsapp = preg_replace('/[^0-9]/', '', $no_whatsapp);

                            // Jika nomor dimulai dengan 0, ganti dengan kode negara (misal +62 untuk Indonesia)
                            if (substr($no_whatsapp, 0, 1) == '0'){
                                $no_whatsapp = '62' . substr($no_whatsapp, 1);
                            }

                            // URL Whatsapp
                            $wa_url = "https://wa.me/".$no_whatsapp;
                            ?>
                            <a href="<?= $wa_url; ?>" class="btn btn-success" target="_blank">
                                <i class="fab fa-whatsapp"></i>&nbsp;<?= $layanan_lab['no_whatsapp']; ?>
                            </a>
                        <?php endif; ?>    
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Lampiran Sampel</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6">
                            <?php if (!empty($layanan_lab['lampiran_sampel'])): ?>
                                <a href="<?= base_url('assets/img/layanan/' . $layanan_lab['lampiran_sampel']); ?>" data-lightbox="image-1" data-title="Lampiran Sampel <?=$layanan_lab['lampiran_sampel']?>">
                                    <img src="<?= base_url('assets/img/layanan/' . $layanan_lab['lampiran_sampel']); ?>" alt="Lampiran Sampel" class="img-thumbnail" style="max-width: 200px;">
                                </a>
                            <?php else: ?>
                                Tidak ada Lampiran Sampel
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Tagihan</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6">
                            <?php if (!empty($layanan_lab['tagihan'])): ?>
                                <a href="<?= base_url('assets/img/layanan/' . $layanan_lab['tagihan']); ?>" data-lightbox="image-1" data-title="Tagihan <?=$layanan_lab['tagihan']?>">
                                    <img src="<?= base_url('assets/img/layanan/' . $layanan_lab['tagihan']); ?>" alt="Tagihan" class="img-thumbnail" style="max-width: 200px;">
                                </a>
                            <?php else: ?>
                                Tidak ada Tagihan
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Status</div>
                        <div class="col-md-2">:</div>
                        <?php 
                $status_class = '';
                if ($layanan_lab['status'] == 'Ditolak') {
                    $status_class = 'text-danger';
                } elseif ($layanan_lab['status'] == 'Selesai') {
                    $status_class = 'text-success';
                } else {
                    $status_class = 'text-warning';
                }
                ?>
                        <div class="col-md-6 <?= $status_class ?>"><?= $layanan_lab['status']; ?></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 font-weight-bold">Tanggal Input</div>
                        <div class="col-md-2">:</div>
                        <div class="col-md-6 font-weight-bold"><?=date('d F Y', strtotime($layanan_lab['created_date'])); ?></div>
                    </div>

                </div>
                <div class="card-footer justify-content-center">
                    <a href="<?= base_url('LayananLab') ?>" class="btn btn-danger">Tutup</a>
                </div>
            </div>
        </div>
    </div>
</div>
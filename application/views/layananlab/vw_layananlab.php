<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
  <div class="row align-items-center">
    <div class="col-md-6">
      <a href="<?= base_url()?>LayananLab/tambah" class="btn btn-custom-info mb-2">Tambah Data</a>
    </div>
    <div class="col-md-6">
      <div class="float-right d-flex align-items-center">
        <?php echo form_open('LayananLab/cari', ['class' => 'form-inline']) ?>
        <div class="form-group mb-2">
          <input type="text" name="keyword" class="form-control" placeholder="Cari" style="width: 200px;">
        </div>
        <button type="submit" class="btn btn-custom-success mb-2 ml-2">Cari</button>
        <?php echo form_close()?>
        <!-- <a href="<?= base_url('LayananLab/index?order=desc') ?>" class="btn btn-outline-info mb-2 ml-2">Terbaru ke terlama</a>
        <a href="<?= base_url('LayananLab/index?order=asc') ?>" class="btn btn-outline-dark mb-2 ml-2">Terlama ke terbaru</a> -->
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <?= $this->session->flashdata('message');?>
      <table class="table rounded-table">
        <thead>
          <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Asal Instansi</td>
            <td>Keperluan</td>
            <td>Jumlah Pengujian</td>
            <td>Biaya</td>
            <td>No Whatsapp</td>
            <td>Status</td>
            <td>Dikonfirmasi Oleh</td>
            <td>Aksi</td>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($layanan_lab as $us) : ?>
            <tr>
              <td> <?= $i ?>.</td>
              <td><?= $us['nama']; ?></td>
              <td><?= $us['asal_instansi']; ?></td>
              <td><?= $us['keperluan']; ?></td>
              <td><?= $us['jumlah_sampel']; ?></td>
              <td><?= 'Rp.' . number_format($us['biaya'], 0, ',', '.'); ?></td>
              <td><?php if(isset($us['no_whatsapp']) && !empty($us['no_whatsapp'])): ?>
                            <?php
                            // Ambil nomor WhatsApp dari database
                            $no_whatsapp = $us['no_whatsapp'];
                            // Bersihkan nomor dari spasi, tanda, atau karakter yang tidak diperlukan
                            $no_whatsapp = preg_replace('/[^0-9]/', '', $no_whatsapp);

                            // Jika nomor dimulai dengan 0, ganti dengan kode negara (misal +62 untuk Indonesia)
                            if (substr($no_whatsapp, 0, 1) == '0'){
                                $no_whatsapp = '62' . substr($no_whatsapp, 1);
                            }

                            // URL Whatsapp
                            $wa_url = "https://wa.me/".$no_whatsapp;
                            ?>
                            <a href="<?= $wa_url; ?>" class=" text-success" target="_blank"><?= $us['no_whatsapp']; ?></a>
                        <?php endif; ?></td>
              <td>
                <!-- memberikan warna pada kondisi status tertentu -->
                <?php 
                $status_class = '';
                if ($us['status'] == 'Ditolak') {
                    $status_class = 'text-danger';
                } elseif ($us['status'] == 'Selesai') {
                    $status_class = 'text-success';
                } elseif ($us['status'] == 'Sedang Dikerjakan') {
                  $status_class = 'text-warning';
                } else {
                  $status_class = 'text-disabled';
                }
                ?>
                <span class="<?= $status_class ?>"><?= $us['status']; ?></span>
              </td>
              <td><?= $us['konfirmasi']; ?></td>
              <td>
                <!-- <div class="d-flex flex-column"> -->
                  <a href="<?= base_url('LayananLab/detail/'.$us['id']);?>" class="text-info mb-1">Detail</a>
                  <a href="<?= base_url('LayananLab/edit/'.$us['id']);?>" class="text-warning mb-1">Edit</a>
                  <a href="<?= base_url('LayananLab/hapus/'.$us['id']);?>" class="text-danger" onclick="javascript: return confirm('Anda yakin untuk menghapus data?')">Hapus</a>
                <!-- </div> -->
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="row">
        <div class="col">
          <?php if(isset($pagination)) echo $pagination; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
  <div class="row align-items-center">
    <div class="col-md-6">
      <a href="<?= base_url()?>PeminjamanLab/tambah" class="btn btn-custom-info mb-2">Tambah Data</a>
    </div>
    <div class="col-md-6">
      <div class="float-right">
        <?php echo form_open('PeminjamanLab/cari', ['class' => 'form-inline']) ?>
        <div class="form-group mb-2">
          <input type="text" name="keyword" class="form-control" placeholder="Cari" style="width: 200px;">
        </div>
        <button type="submit" class="btn btn-custom-success mb-2 ml-2">Cari</button>
        <?php echo form_close()?>
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
            <td>Biaya</td>
            <td>No Whatsapp</td>
            <!-- <td>Bukti Pembayaran</td> -->
            <td>Status Peminjaman</td>
            <td>Dikonfirmasi Oleh</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
    <?php $i = 1; ?>
        <?php foreach ($peminjaman_lab as $us) : ?>
    <tr>
        <td> <?= $i; ?>.</td>
        <td><?= $us['nama']; ?></td>
        <td><?= $us['asal_instansi']; ?></td>
        <td><?= $us['keperluan']; ?></td>
        <td><?= 'Rp ' . number_format($us['biaya'], 0, ',', '.'); ?></td>
        <td><?= $us['no_whatsapp']; ?></td>
        <!-- <td> -->
                <!-- memunculkan teks jika tidak ada file gambar -->
                <!-- <?php if (!empty($us['bukti_pembayaran'])): ?>
                  <a href="<?= base_url('assets/img/peminjaman/') . $us['bukti_pembayaran']; ?>" data-lightbox="bukti_pembayaran-set" data-title="bukti_pembayaran <?= $us['nama']; ?>">
                    <img src="<?= base_url('assets/img/peminjaman/') . $us['bukti_pembayaran']; ?>" alt="Bukti Pembayaran" class="img-thumbnail thumbnail-image" style=" 100px">
                  </a>
                <?php else: ?>
                  <span>Tidak ada file bukti pembayaran</span>
                <?php endif; ?>   -->
              <!-- </td> -->
        <td>
                <!-- memberikan warna pada kondisi status tertentu -->
                <?php 
                $status_class = '';
                if ($us['status_peminjaman'] == 'Ditolak') {
                    $status_class = 'text-danger';
                } elseif ($us['status_peminjaman'] == 'Selesai') {
                    $status_class = 'text-success';
                } elseif ($us['status_peminjaman'] == 'Meminjam') {
                  $status_class = 'text-warning';
                } else {
                  $status_class = 'text-disabled';
                }
                ?>
                <span class="<?= $status_class ?>"><?= $us['status_peminjaman']; ?></span>
        </td>
        <td><?= $us['konfirmasi']; ?></td>
        <td>
          <!-- <div class="d-flex flex-column"> -->
            <a href="<?= base_url('PeminjamanLab/detail/'.$us['id']);?>" class="text-info mb-1">Detail</a>
            <a href="<?= base_url('PeminjamanLab/edit/'.$us['id']);?>" class="text-warning mb-1">Edit</a>
            <a href="<?= base_url('PeminjamanLab/hapus/'.$us['id']);?>" class="text-danger" onclick="javascript: return confirm('Anda yakin untuk menghapus data?')">Hapus</a>
          <!-- </div> -->
        </td>
    </tr>
    <?php $i++ ?>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="row">
    <div class="col">
        <?php echo $pagination; ?>
    </div>
</div>
</div>
</div>
</div>
                <!-- /.container-fluid -->



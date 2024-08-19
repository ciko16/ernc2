<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
  <div class="row align-items-center">
    <div class="col-md-6">
      <a href="<?= base_url()?>BiayaLayanan/tambah" class="btn btn-custom-info mb-2">Tambah Data</a>
    </div>
    <div class="col-md-6">
      <div class="float-right">
        <?php echo form_open('BiayaLayanan/cari', ['class' => 'form-inline']) ?>
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
            <td>Keperluan</td>
            <td>Biaya</td>
            <td>Kategori</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($biaya_layanan as $bl) : ?>
    <tr>
        <td> <?= $i; ?>.</td>
        <td><?= $bl['keperluan']; ?></td>
        <td><?= 'Rp ' . number_format($bl['biaya'], 0, ',', '.'); ?></td>
        <td><?= $bl['kategori']; ?></td>
        <td>
            <a href="<?= base_url('BiayaLayanan/detail/'.$bl['id']);?>" class="badge badge-info">Detail</a>
            <a href="<?= base_url('BiayaLayanan/edit/'.$bl['id']);?>" class="text-warning">Edit</a>
            <a href="<?= base_url('BiayaLayanan/hapus/'.$bl['id']);?>" class="text-danger" onclick="javascript: return confirm('Anda yakin untuk menghapus data?')">Hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    </tbody>
</table>
                </div>
</div>
</div>
                <!-- /.container-fluid -->



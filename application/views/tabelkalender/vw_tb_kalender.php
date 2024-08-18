<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
  <div class="row align-items-center">
    <div class="col-md-6">
      <a href="<?= base_url()?>TabelKalender/tambah" class="btn btn-custom-info mb-2">Tambah Data</a>
    </div>
    <div class="col-md-6">
      <div class="float-right">
        <?php echo form_open('TabelKalender/cari', ['class' => 'form-inline']) ?>
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
            <td>Tanggal</td>
            <td>Booking</td>
            <td>Deskripsi</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($kalenderbaru as $kb) : ?>
    <tr>
        <td> <?= $i ?>.</td>
        <td><?= $kb['tanggal']; ?></td>
        <td><?= isset($kb['booking_nama']) ? $kb['booking_nama'] : 'Tidak Ada'; ?></td> <!-- Menampilkan nama booking -->
        <td><?= $kb['isi']; ?></td>
        <td>
            <!-- <a href="<?= base_url('TabelKalender/detail/'.$kb['id']);?>" class="badge badge-info">Detail</a> -->
            <a href="<?= base_url('TabelKalender/edit/'.$kb['id']);?>" class="text-warning">Edit</a>
            <a href="<?= base_url('TabelKalender/hapus/'.$kb['id']);?>" class="text-danger" onclick="javascript: return confirm('Anda yakin untuk menghapus data?')">Hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
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
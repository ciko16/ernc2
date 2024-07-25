<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
  <div class="row align-items-center">
    <div class="col-md-6">
      <a href="<?= base_url()?>Inventaris/tambah" class="btn btn-custom-info mb-2">Tambah Data</a>
    </div>
    <div class="col-md-6">
      <div class="float-right">
        <?php echo form_open('Inventaris/cari', ['class' => 'form-inline']) ?>
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
            <td>Jenis</td>
            <td>Deskripsi</td>
            <td>Jumlah</td>
            <td>Ketersediaan</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($inventaris as $in) : ?>
    <tr>
        <td> <?= $i; ?>.</td>
        <td><?= $in['nama']; ?></td>
        <td><?= $in['jenis']; ?></td>
        <td><?= $in['deskripsi']; ?></td>
        <td><?= $in['jumlah']; ?></td>
        <td>
                <!-- memberikan warna pada kondisi status tertentu -->
                <?php 
                $status_class = '';
                if ($in['ketersediaan'] == 'Tidak Tersedia') {
                    $status_class = 'text-danger';
                } elseif ($in['ketersediaan'] == 'Tersedia') {
                    $status_class = 'text-success';
                }
                ?>
                <span class="<?= $status_class ?>"><?= $in['ketersediaan']; ?></span>
              </td>
        <td>
            <!-- <a href="<?= base_url('Inventaris/detail/'.$in['id']);?>" class="badge badge-info">Detail</a> -->
            <a href="<?= base_url('Inventaris/edit/'.$in['id']);?>" class="text-warning">Edit</a>
            <a href="<?= base_url('Inventaris/hapus/'.$in['id']);?>" class="text-danger" onclick="javascript: return confirm('Anda yakin untuk menghapus data?')">Hapus</a>
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



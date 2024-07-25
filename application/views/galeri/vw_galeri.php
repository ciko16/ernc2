<!-- Begin Page Content -->
<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
<div class="row align-items-center">
<div class="col-md-6"><a href="<?= base_url()?>Galeri/tambah" class="btn btn-custom-info mb-2">Tambah Data</a></div>
<div class="col-md-6">
    <div class="float-right">
        <?php echo form_open('Galeri/cari', ['class' => 'form-inline'])?>
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
            <td>Gambar</td>
            <td>Judul</td>
            <td>Deskripsi</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($galeri as $ga) : ?>
    <tr>
        <td> <?= $i ?>.</td>
        <td>
            <a href="<?= base_url('assets/img/galeri/') . $ga['gambar']; ?>" data-lightbox="gambar-set" data-title="<?= $ga['judul']; ?>">
            <img src="<?= base_url('assets/img/galeri/') . $ga['gambar']; ?>" alt="Gambar" class="img-thumbnail thumbnail-image" style=" 50px">
            </a>
        </td>
        <td><?= $ga['judul']; ?></td>
        <td><?= $ga['deskripsi']; ?></td>
        <td>
            <!-- <a href="<?= base_url('Galeri/detail/'.$ga['id']);?>" class="badge badge-info">Detail</a> -->
            <a href="<?= base_url('Galeri/edit/'.$ga['id']);?>" class="text-warning">Edit</a>
            <a href="<?= base_url('Galeri/hapus/'.$ga['id']);?>" class="text-danger" onclick="javascript: return confirm('Anda yakin untuk menghapus data?')">Hapus</a>
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



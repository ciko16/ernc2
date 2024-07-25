<!-- Begin Page Content -->
<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
<div class="row">
<div class="col-md-6"><a href="<?= base_url()?>TentangKami/tambah" class="btn btn-info mb-2">Tambah Data</a></div>
<div class="col-md-12">
<?= $this->session->flashdata('message');?>
<table class="table">
    <thead>
        <tr>
            <td>No</td>
            <td>Gambar</td>
            <td>Deskripsi</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($tentangkami as $ga) : ?>
    <tr>
        <td> <?= $i; ?>.</td>
        <td>
            <a href="<?= base_url('assets/img/tentangkami/') . $ga['gambar']; ?>" data-lightbox="gambar-set" data-title="Gambar <?= $ga['gambar']; ?>">
                <img src="<?= base_url('assets/img/tentangkami/') . $ga['gambar']; ?>" alt="Gambar" class="img-thumbnail thumbnail-image" style=" 100px">
            </a>
        </td>
        <td><?= $ga['caption']; ?></td>
        <td>
            <!-- <a href="<?= base_url('TentangKami/detail/'.$ga['id']);?>" class="badge badge-info">Detail</a> -->
            <a href="<?= base_url('TentangKami/edit/'.$ga['id']);?>" class="badge badge-warning">Edit</a>
            <a href="<?= base_url('TentangKami/hapus/'.$ga['id']);?>" class="badge badge-danger" onclick="javascript: return confirm('Anda yakin untuk menghapus data?')">Hapus</a>
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



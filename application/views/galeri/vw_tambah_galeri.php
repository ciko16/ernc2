<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header justify-content-center bg-custom-success">
Form Tambah Data Galeri
</div>

<div class="card-body">
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
        <label for="gambar">Gambar</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="gambar" id="gambar" onchange="updateLabel(this)">
            <label for="gambar" class="custom-file-label">Upload Gambar</label>
            <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>');?>
        </div>
    </div>
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text"name="judul" value="<?= set_value('judul')?>" class="form-control" id="judul" placeholder="Judul">
        <?= form_error('judul', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text"name="deskripsi" value="<?= set_value('deskripsi')?>" class="form-control" id="deskripsi" placeholder="Deskripsi">
        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <a href="<?= base_url('Galeri') ?>" class="btn btn-danger">Tutup</a>
    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
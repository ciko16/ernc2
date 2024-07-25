<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header justify-content-center">
Form Tambah Data Tentang Kami
</div>

<div class="card-body">
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
        <label for="gambar">Gambar</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="gambar" id="gambar">
            <label for="gambar" class="custom-file-label">Upload Gambar</label>
            <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>');?>
        </div>
    </div>
    <div class="form-group">
        <label for="caption">Caption</label>
        <input type="text"name="caption" value="<?= set_value('caption')?>" class="form-control" id="caption" placeholder="Caption">
        <?= form_error('caption', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <a href="<?= base_url('TentangKami') ?>" class="btn btn-danger">Tutup</a>
    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
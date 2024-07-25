<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header justify-content-center bg-custom-success">
Form Tambah Data Biaya Layanan
</div>

<div class="card-body">
<form action="" method="POST">
    <div class="form-group">
        <label for="keperluan">Keperluan</label>
        <input type="text"name="keperluan" class="form-control" id="keperluan" placeholder="Keperluan">
        <?= form_error('keperluan', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="biaya">Biaya</label>
        <input type="text"name="biaya" class="form-control" id="biaya" placeholder="Biaya">
        <?= form_error('biaya', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <select class="form-control" id="kategori" name="kategori" aria-placeholder="Kategori">
        <option value="" disabled selected>Pilih Kategori</option>
            <option>Layanan</option>
            <option>Peminjaman</option>
        </select>
    </div>
    <a href="<?= base_url('BiayaLayanan') ?>" class="btn btn-danger">Tutup</a>
    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
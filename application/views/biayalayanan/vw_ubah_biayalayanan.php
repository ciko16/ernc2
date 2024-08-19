<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header justify-content-center bg-custom-success">
Form Edit Data Kalender
</div>

<div class="card-body">
<form action="" method="POST">
    <input type="hidden" name="id" value="<?= $biaya_layanan['id']; ?>">
    <div class="form-group">
        <label for="keperluan">Keperluan</label>
        <input type="text"name="keperluan" value="<?= $biaya_layanan['keperluan']; ?>" class="form-control" id="keperluan" placeholder="Keperluan">
    </div>
    <div class="form-group">
        <label for="biaya">Biaya</label>
        <input type="text" name="biaya" value="<?= $biaya_layanan['biaya']; ?>" class="form-control" id="biaya" placeholder="Biaya">
    </div>
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <select class="form-control" id="kategori" name="kategori" aria-placeholder="Kategori">
        <option value="Layanan" <?= $biaya_layanan['kategori'] == 'Layanan' ? 'selected' : '' ?>>Layanan</option>
        <option value="Peminjaman" <?= $biaya_layanan['kategori'] == 'Peminjaman' ? 'selected' : '' ?>>Peminjaman</option>
        </select>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text"name="keterangan" value="<?= $biaya_layanan['keterangan']; ?>" class="form-control" id="keterangan" placeholder="Keterangan">
    </div>
    <a href="<?= base_url('BiayaLayanan') ?>" class="btn btn-danger">Tutup</a>
    <button type="submit" name="edit" class="btn btn-primary float-right">Edit Data</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
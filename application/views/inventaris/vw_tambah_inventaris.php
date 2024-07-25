<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header justify-content-center bg-custom-success">
Form Tambah Data Inventaris
</div>

<div class="card-body">
<form action="" method="POST">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text"name="nama" class="form-control" id="nama" placeholder="Nama">
        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="jenis">Jenis</label>
        <input type="text"name="jenis" class="form-control" id="jenis" placeholder="Jenis">
        <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text"name="deskripsi" value="<?= set_value('deskripsi') ?>" class="form-control" id="deskripsi" placeholder="Deskripsi">
        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="number" name="jumlah" value="<?= set_value('jumlah') ?>" class="form-control" id="jumlah" placeholder="Jumlah">
        <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="ketersediaan">Ketersediaan</label>
        <select name="ketersediaan" class="form-control" id="ketersediaan" placeholder="Ketersediaan">
            <option value="" disabled selected>Pilih Status Ketersediaan</option>
            <option value="Tersedia" <?= set_value('ketersediaan') == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
            <option value="Tidak Tersedia" <?= set_value('ketersediaan') == 'Tidak Tersedia' ? 'selected' : '' ?>>Tidak Tersedia</option>
        </select>
        <?= form_error('ketersediaan', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <a href="<?= base_url('Inventaris') ?>" class="btn btn-danger">Tutup</a>
    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
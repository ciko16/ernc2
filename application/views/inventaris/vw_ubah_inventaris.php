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
    <input type="hidden" name="id" value="<?= $inventaris['id']; ?>">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text"name="nama" value="<?= $inventaris['nama']; ?>" class="form-control" id="nama" placeholder="Nama">
    </div>
    <div class="form-group">
        <label for="jenis">Jenis</label>
        <input type="text"name="jenis" value="<?= $inventaris['jenis']; ?>" class="form-control" id="jenis" placeholder="Jenis">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text" name="deskripsi" value="<?= $inventaris['deskripsi']; ?>" class="form-control" id="deskripsi" placeholder="Deskripsi">
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="number" name="jumlah" value="<?= $inventaris['jumlah']; ?>" class="form-control" id="jumlah" placeholder="Jumlah">
    </div>
    <div class="form-group">
        <label for="ketersediaan">Ketersediaan</label>
        <select name="ketersediaan" class="form-control" id="ketersediaan" placeholder="Ketersediaan">
            <option value="Tersedia" <?= $inventaris['ketersediaan'] == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
            <option value="Tidak Tersedia" <?= $inventaris['ketersediaan'] == 'Tidak Tersedia' ? 'selected' : '' ?>>Tidak Tersedia</option>
        </select>
    </div>
    <a href="<?= base_url('Inventaris') ?>" class="btn btn-danger">Tutup</a>
    <button type="submit" name="edit" class="btn btn-primary float-right">Edit Data</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
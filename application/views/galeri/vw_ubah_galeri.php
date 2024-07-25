<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header justify-content-center bg-custom-success">
Form Edit Data Gambar
</div>

<div class="card-body">
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $galeri['id']; ?>">
    <div class="form-group">
        <img src="<?= base_url('assets/img/galeri/') . $galeri['gambar'];?>" style="width: 100px;" class="img-thumbnail">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="gambar" id="gambar" onchange="updateLabel(this)">
            <label for="gambar" class="custom-file-label"><?= $galeri['gambar']; ?></label>
        </div>
    </div>
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text"name="judul" value="<?= $galeri['judul']; ?>" class="form-control" id="judul" placeholder="Judul">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input type="text"name="deskripsi" value="<?= $galeri['deskripsi']; ?>" class="form-control" id="deskripsi" placeholder="Deskripsi">
    </div>
    <a href="<?= base_url('Galeri') ?>" class="btn btn-danger">Tutup</a>
    <button type="submit" name="tambah" class="btn btn-primary float-right">Edit Data</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
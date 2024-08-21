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
    <input type="hidden" name="id" value="<?= $kalenderbaru['id']; ?>">
    <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date"name="tanggal" value="<?= date('Y-m-d', strtotime($kalenderbaru['tanggal'])); ?>" class="form-control" id="tanggal" placeholder="Tanggal">
    </div>
    <div class="form-group">
        <label for="booking">Booking</label>
        <input type="text" name="booking" value="<?= $kalenderbaru['booking']; ?>" class="form-control" id="booking" placeholder="Booking">
    </div>
    <div class="form-group">
        <label for="isi">Deskripsi</label>
        <input type="text" name="isi" value="<?= $kalenderbaru['isi']; ?>" class="form-control" id="isi" placeholder="Deskripsi">
    </div>
    <a href="<?= base_url('TabelKalender') ?>" class="btn btn-danger">Tutup</a>
    <button type="submit" name="edit" class="btn btn-primary float-right">Edit Data</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
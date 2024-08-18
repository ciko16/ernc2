<div class="card-body">
<form action="" method="POST">
<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header justify-content-center bg-custom-success">
Form Tambah Data Kalender
</div>

<div class="card-body">
<form action="" method="POST">
    <div class="form-group">
        <label for="tanggal">Date</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
        <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
    <label for="booking">Booking</label>
    <select name="booking" id="booking" class="form-control">
        <option value="">Pilih Booking</option>
        <?php
        // Debugging output
        echo '<pre>';
        print_r($inventaris);
        echo '</pre>';
        ?>
        <?php foreach($inventaris as $item): ?>
            <option value="<?= $item['id']; ?>">
                <?= $item['nama']; ?> - Jumlah: <?= $item['jumlah']; ?>
            </option>
        <?php endforeach; ?>
    </select>
    <?= form_error('booking', '<small class="text-danger pl-3">', '</small>');?>
</div>

    <div class="form-group">
        <label for="isi">Deskripsi</label>
        <input type="text"name="isi" class="form-control" id="isi" placeholder="Deskripsi">
        <?= form_error('isi', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    
    <a href="<?= base_url('TabelKalender') ?>" class="btn btn-danger">Tutup</a>
    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header justify-content-center bg-custom-success">
Form Edit Data Peminjaman Lab
</div>

<div class="card-body">
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $peminjaman_lab['id']; ?>">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text"name="nama" value="<?= $peminjaman_lab['nama']; ?>" class="form-control" id="nama" placeholder="Nama">
    </div>
    <div class="form-group">
        <label for="asal_instansi">Asal Instansi</label>
        <input type="text" name="asal_instansi" value="<?= $peminjaman_lab['asal_instansi']; ?>" class="form-control" id="asal_instansi" placeholder="Asal Instansi">
    </div>
    <div class="form-group">
        <label for="keperluan">Keperluan</label>
        <select name="keperluan" value="<?= $peminjaman_lab['keperluan']; ?>" class="form-control" id="keperluan" placeholder="Keperluan">
        <option value="">Pilih Keperluan</option>
        <?php foreach ($biaya_layanan as $bl) : ?>
            <option value="<?= $bl['keperluan']; ?>" data-biaya="<?= $bl['biaya']; ?>"
                <?= $bl['keperluan'] == $peminjaman_lab['keperluan'] ? 'selected' : '' ?>>
                <?= $bl['keperluan']; ?>
            </option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="biaya">Biaya</label>
        <input type="text" name="biaya"  value="<?= 'Rp ' . number_format($peminjaman_lab['biaya'], 0, ',', '.'); ?>" oninput="formatRupiah(this)" class="form-control" id="biaya" placeholder="Biaya" readonly>
    </div>
    <div class="form-group">
        <label for="no_whatsapp">Nomor Whatsapp</label>
        <input type="text"name="no_whatsapp" value="<?= $peminjaman_lab['no_whatsapp']; ?>" class="form-control" id="no_whatsapp" placeholder="Nomor Whatsapp">
    </div>
    <div class="form-group">
        <label for="bukti_pembayaran">Bukti Pembayaran</label>
        <br>
        <img src="<?= base_url('assets/img/peminjaman/') . $peminjaman_lab['bukti_pembayaran'];?>" style="width: 100px;" class="img-thumbnail">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="bukti_pembayaran" id="bukti_pembayaran" onchange="updateLabel(this)">
            <label for="bukti_pembayaran" class="custom-file-label"><?= $peminjaman_lab['bukti_pembayaran'] ?></label>
        </div>
    </div>
    <div class="form-group">
    <select name="status_peminjaman" class="form-control" id="status_peminjaman">
        <option value="Ditolak" <?= $peminjaman_lab['status_peminjaman'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
        <option value="Sedang Meminjam" <?= $peminjaman_lab['status_peminjaman'] == 'Sedang Meminjam' ? 'selected' : '' ?>>Sedang Meminjam</option>
        <option value="Selesai" <?= $peminjaman_lab['status_peminjaman'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option> 
    </select>
    </div>
    <a href="<?= base_url('PeminjamanLab') ?>" class="btn btn-danger">Tutup</a>
    <button type="submit" name="tambah" class="btn btn-primary float-right">Edit Data</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('#keperluan').change(function() {
        var biaya = $(this).find(':selected').data('biaya');
        if (biaya) {
            $('#biaya').val('Rp ' + formatRupiah(biaya.toString()));
        } else {
            $('#biaya').val('');
        }
    });

    function formatRupiah(angka) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            var separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return rupiah;
    }
});
</script>
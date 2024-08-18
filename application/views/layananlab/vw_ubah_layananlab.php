<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header justify-content-center bg-custom-success">
Form Edit Data Layanan Lab
</div>

<div class="card-body">
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $layanan_lab['id']; ?>">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text"name="nama" value="<?= $layanan_lab['nama']; ?>" class="form-control" id="nama" placeholder="Nama">
    </div>
    <div class="form-group">
        <label for="asal_instansi">Asal Instansi</label>
        <input type="text" name="asal_instansi" value="<?= $layanan_lab['asal_instansi']; ?>" class="form-control" id="asal_instansi" placeholder="Asal Instansi">
    </div>
    <div class="form-group">
        <label for="keperluan">Keperluan</label>
        <select name="keperluan" value="<?= $layanan_lab['keperluan']; ?>" class="form-control" id="keperluan" placeholder="Keperluan">
        <option value="">Pilih Keperluan</option>
        <?php foreach ($biaya_layanan as $bl) : ?>
            <option value="<?= $bl['keperluan']; ?>" data-biaya="<?= $bl['biaya']; ?>"
                <?= $bl['keperluan'] == $layanan_lab['keperluan'] ? 'selected' : '' ?>>
                <?= $bl['keperluan']; ?>
            </option>
        <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="jumlah_sampel">Jumlah Pengujian</label>
        <input type="number" name="jumlah_sampel" value="<?= $layanan_lab['jumlah_sampel']; ?>" class="form-control" id="jumlah_sampel" placeholder="Jumlah Pengujian">
    </div>
    <div class="form-group">
        <label for="biaya">Biaya</label>
        <input type="text" name="biaya" value="<?= 'Rp ' . number_format($layanan_lab['biaya'], 0, ',', '.'); ?>" oninput="formatRupiah(this)" class="form-control" id="biaya" placeholder="Biaya" readonly>
    </div>
    <div class="form-group">
        <label for="target_selesai">Target Selesai</label>
        <input type="date" class="form-control" id="target_selesai" name="target_selesai" value="<?= $layanan_lab['target_selesai']; ?>" placeholder="Target Selesai">
    </div>
    <div class="form-group">
        <label for="no_whatsapp">Nomor Whatsapp</label>
        <input type="text"name="no_whatsapp" value="<?= $layanan_lab['no_whatsapp']; ?>" class="form-control" id="no_whatsapp" placeholder="Nomor Whatsapp">
    </div>
    <div class="form-group">
        <label for="lampiran_sampel">Lampiran Sampel</label>
        <br>
        <img src="<?= base_url('assets/img/layanan/') . $layanan_lab['lampiran_sampel'];?>" style="width: 100px;" class="img-thumbnail">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="lampiran_sampel" id="lampiran_sampel" onchange="updateLabel(this)">
            <label for="lampiran_sampel" class="custom-file-label"><?= $layanan_lab['lampiran_sampel'] ?></label>
        </div>
    </div>
    <div class="form-group">
        <label for="tagihan">Tagihan</label>
        <br>
        <img src="<?= base_url('assets/img/layanan/') . $layanan_lab['tagihan'];?>" style="width: 100px;" class="img-thumbnail">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="tagihan" id="tagihan" onchange="updateLabel(this)">
            <label for="tagihan" class="custom-file-label"><?= $layanan_lab['tagihan'] ?></label>
        </div>
    </div>
    <div class="form-group">
    <select name="status" class="form-control" id="status">
        <option value="Ditolak" <?= $layanan_lab['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
        <option value="Sedang Dikerjakan" <?= $layanan_lab['status'] == 'Sedang Dikerjakan' ? 'selected' : '' ?>>Sedang Dikerjakan</option>
        <option value="Selesai" <?= $layanan_lab['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option> 
    </select>
    </div>
    <a href="<?= base_url('LayananLab') ?>" class="btn btn-danger">Tutup</a>
    <button type="submit" name="edit" class="btn btn-primary float-right">Edit Data</button>
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
        function calculateBiaya() {
            var biaya = $('#keperluan').find(':selected').data('biaya');
            var jumlah_sampel = $('#jumlah_sampel').val();
            if (biaya && jumlah_sampel) {
                var total_biaya = biaya * jumlah_sampel;
                $('#biaya').val(total_biaya);
            } else {
                $('#biaya').val('');
            }
        }

        $('#keperluan').change(function() {
            calculateBiaya();
        });

        $('#jumlah_sampel').keyup(function() {
            calculateBiaya();
        });
    // menambahkan format rupiah pada kolom biaya
    function formatRupiah(input) {
    var number_string = input.replace(/[^,\d]/g, '').toString();
     split = number_string.split(',');
     sisa = split[0].length % 3;
     rupiah = split[0].substr(0, sisa);
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

<!-- membuat input asal instansi menjadi huruf kapital -->
<script> 
    document.getElementById('asal_instansi').addEventListener('input', function() {
        this.value = this.value.toUpperCase();
    });
</script>
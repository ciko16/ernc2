<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header justify-content-center bg-custom-success">
Form Tambah Data Layanan Lab
</div>

<div class="card-body">
<form action="" method="POST" enctype="multipart/form-data" id="form">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text"name="nama" value="<?= set_value('nama')?>" class="form-control" id="nama" placeholder="Nama">
        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="asal_instansi">Asal Instansi</label>
        <input type="text"name="asal_instansi" value="<?= set_value('asal_instansi')?>" class="form-control" id="asal_instansi" placeholder="Asal Instansi">
        <?= form_error('asal_instansi', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="keperluan">Keperluan</label>
        <select name="keperluan" class="form-control" id="keperluan" placeholder="Keperluan">
            <option value="" disabled selected>Pilih Keperluan</option>
            <?php foreach ($biaya_layanan as $bl) : ?>
                <option value="<?= $bl['keperluan']; ?>" data-biaya="<?= $bl['biaya']; ?>"><?= $bl['keperluan']; ?></option>
            <?php endforeach; ?>
        </select>
        <?= form_error('keperluan', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="jumlah_sampel">Jumlah Pengujian</label>
        <input type="number" name="jumlah_sampel" value="<?= set_value('jumlah_sampel')?>" min="1" class="form-control" id="jumlah_sampel" placeholder="Jumlah Pengujian">
        <?= form_error('jumlah_sampel', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="biaya">Biaya</label>
        <input type="text" name="biaya" class="form-control" id="biaya" oninput="formatRupiah(this)" placeholder="Biaya" readonly>
        <?= form_error('biaya', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="target_selesai">Target Selesai</label>
        <input type="date" class="form-control" id="target_selesai" name="target_selesai" placeholder="Target Selesai">
        <?= form_error('target_selesai', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="no_whatsapp">Nomor Whatsapp</label>
        <input type="text"name="no_whatsapp" value="<?= set_value('no_whatsapp')?>" class="form-control" id="no_whatsapp" placeholder="Nomor Whatsapp">
        <?= form_error('no_whatsapp', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="nama_sampel">Nama Sampel</label>
        <input type="text"name="nama_sampel" value="<?= set_value('nama_sampel')?>" class="form-control" id="nama_sampel" placeholder="Nama Sampel">
        <?= form_error('nama_sampel', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <div class="form-group">
        <label for="lampiran_sampel">Lampiran Sampel</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="lampiran_sampel" id="lampiran_sampel" onchange="updateLabel(this)">
            <label for="lampiran_sampel" class="custom-file-label">Upload Gambar</label>
        </div>
    </div>
    <div class="form-group">
        <label for="tagihan">Tagihan</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="tagihan" id="tagihan"  onchange="updateLabel(this)">
            <label for="tagihan" class="custom-file-label">Upload Gambar</label>
        </div>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" id="status">
        <option value="" disabled selected>Pilih Status</option>
            <option value="Ditolak" <?= set_value('status') == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
            <option value="Sedang Dikerjakan" <?= set_value('status') == 'Sedang Dikerjakan' ? 'selected' : '' ?>>Sedang Dikerjakan</option>
            <option value="Selesai" <?= set_value('status') == 'Selesai' ? 'selected' : '' ?>>Selesai</option> 
        </select>
        <?= form_error('status', '<small class="text-danger pl-3">', '</small>');?>
    </div>
    <a href="<?= base_url('LayananLab') ?>" class="btn btn-danger">Tutup</a>
    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
</form>
</div>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script> // menghitung biaya keperluan berdasarkan jumlah sampel
    $(document).ready(function() {
        function calculateBiaya() {
            var biaya = $('#keperluan').find(':selected').data('biaya');
            var jumlah_sampel = $('#jumlah_sampel').val();
            if (biaya && jumlah_sampel) {
                var total_biaya = biaya * jumlah_sampel;
                $('#biaya').val('Rp ' + formatRupiah(total_biaya.toString()));
            } else {
                $('#biaya').val('');
            }
        }

        $('#keperluan').change(function() {
            calculateBiaya();
        });
        // ubah data biaya dari tombol keyboard
        $('#jumlah_sampel').keyup(function() {
            calculateBiaya();
        });
        // ubah data biaya dari tombol input number
        $('#jumlah_sampel').on('input',function() {
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
<!-- script untuk mengaktifkan tombol tambah kurang pada kolom
input type number di jumlah sampel-->
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // elemen input
        const jumlahSampelInput = document.getElementById('jumlah_sampel');
        const biayaInput = document.getElementById('biaya');

        // fungsi untuk menghitung biaya
        function hitungBiaya() {
            const jumlahSampel = parseInt(jumlahSampelInput.value);
            const totalBiaya = jumlahSampel * biayaInput;
        }
    })
</script> -->

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-6">
                <div class="text-center my-5">
                    <h1 class="display-5 fw-bolder text-white mb-2">Energy Research Nano Carbon Centre (ERNC<sup>2</sup>) </h1>
                    <p class="lead text-white-50 mb-4">Pusat penelitian energi dan nano carbon</p>
                    <!-- <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Features section-->
<section class="py-5 border-bottom" id="features">
    <div class="container px-5 my-5">
    <h2 class="fw-bolder mb-4">Form Pengajuan Layanan Lab</h2>

     <!-- Notifikasi pesan sukses/error -->
     <?php if($this->session->flashdata('message')): ?>
            <?= $this->session->flashdata('message'); ?>
        <?php endif; ?>
        
        <form action="<?= base_url('LayananLab/tambah_data'); ?>" method="post" enctype="multipart/form-data">
            <!-- Name input-->
            <div class="form-floating mb-3">
                <input class="form-control" id="nama" name="nama" value="<?= set_value('nama')?>" type="text" placeholder="Masukkan nama anda" required />
                <label for="nama">Nama Lengkap</label>
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');?>
            </div>
            <!-- Asal Instansi input-->
            <div class="form-floating mb-3">
                <input class="form-control" id="asal_instansi" name="asal_instansi" type="text" placeholder="Masukkan asal instansi anda" required />
                <label for="asal_instansi">Asal Instansi</label>
                <?= form_error('asal_instansi', '<small class="text-danger pl-3">', '</small>');?>
            </div>
            <!-- Keperluan input-->
            <div class="form-floating mb-3">
                <select class="form-select" id="keperluan" name="keperluan" required>
                <option value="" disabled selected>Pilih keperluan anda</option>
                <?php foreach ($biaya_layanan as $bl) : ?>
                <option value="<?= $bl['keperluan']; ?>" data-biaya="<?= $bl['biaya']; ?>"><?= $bl['keperluan']; ?></option>
                <?php endforeach; ?>
                </select>
                <label for="keperluan">Keperluan</label>
                <?= form_error('keperluan', '<small class="text-danger pl-3">', '</small>');?>
            </div>
            <!-- Jumlah Sampel input-->
            <div class="form-floating mb-3">
                <input class="form-control" id="jumlah_sampel" name="jumlah_sampel" type="number" min="1" placeholder="Masukkan jumlah pengujian yang diperlukan" required />
                <label for="jumlah_sampel">Jumlah Pengujian</label>
            </div>
            <!-- Biaya input-->
            <div class="form-floating mb-3">
                <input class="form-control" id="biaya" name="biaya" type="text" oninput="formatRupiah(this)" placeholder="Biaya akan muncul setelah memilih jenis keperluan" readonly />
                <label for="biaya">Biaya</label>
            </div>
            <!-- Nomor Whatsapp input-->
            <div class="form-floating mb-3">
                <input class="form-control" id="no_whatsapp" name="no_whatsapp" type="text" placeholder="Masukkan nomor whatsapp anda" required />
                <label for="no_whatsapp">Nomor Whatsapp</label>
            </div>
            <!-- Image upload input-->
            <div class="mb-3">
                <label for="lampiran_sampel" class="form-label">Upload Lampiran Sampel</label>
                <input class="form-control" type="file" id="lampiran_sampel" name="lampiran_sampel" accept="image/*" required />
            </div>
            <!-- Submit Button-->
            
                <a href="<?= base_url('Home/layananlaboratorium') ?>" class="btn btn-danger">Kembali</a>
                <button class="btn btn-success float-right" type="submit" name="tambah">Submit</button>
            
        </form>
    </div>
</section>

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
        // ubah biaya dengan tombol dari keyboard
        $('#jumlah_sampel').keyup(function() {
            calculateBiaya();
        });
        // ubah biaya dengan tombol dari input number
        $('#jumlah_sampel').on('input',function() {
            calculateBiaya();
        });



 // menambahkan format rupiah pada kolom biaya
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
<!-- membuat input asal instansi menjadi huruf kapital -->
<script> 
    document.getElementById('asal_instansi').addEventListener('input', function() {
        this.value = this.value.toUpperCase();
    });
</script>
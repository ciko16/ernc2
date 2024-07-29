
<!-- Features section-->
<section class="py-5 border-bottom" id="features">
    <div class="container px-5 my-5">
        <h2 class="fw-bolder mb-4">Tabel Biaya Layanan ENRC<sup>2</sup></h2>
        
        
        
        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead style="background-color: #E2DAD6;">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Keperluan</th>
                        <th scope="col">Biaya</th>
                        <th scope="col">Kategori</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($biaya_layanan as $bl) : ?>
                    <tr>
                        <td> <?= $i; ?>.</td>
                        <td><?= $bl['keperluan']; ?></td>
                        <td><?= 'Rp ' . number_format($bl['biaya'], 0, ',', '.'); ?></td>
                        <td><?= $bl['kategori']; ?></td>
                    </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-6 mb-5 mb-lg-0 text-left">
                <div class="feature bg-success bg-gradient text-white rounded-3 mb-3"><i class="fas fa-flask"></i></div>
                <h2 class="h4 fw-bolder">Layanan Lab</h2>
                <p>Melayani permintaan pengguna untuk melakukan penelitian, pembakaran, dan lain sebagainya.</p>
                <a href="<?= base_url('Home/layananlab'); ?>" a class="text-decoration-none">Ajukan Layanan Lab
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-6 text-right">
                <div class="feature bg-success bg-gradient text-white rounded-3 mb-3"><i class="bi bi-calendar-check"></i></div>
                <h2 class="h4 fw-bolder">Peminjaman Lab</h2>
                <p>ERNC² juga melayani pengguna untuk meminjam Laboratorium guna mendukung penelitian mandiri</p>
                <a class="text-decoration-none" href="<?= base_url('Home/peminjamanlab') ?>">
                    Ajukan Peminjaman Lab
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
    </div>
</section>
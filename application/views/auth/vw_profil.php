<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 text-center"><?= $judul ?></h1>
    <div class="d-flex justify-content-center">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" class="card-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['nama']; ?></h5>
                        <p class="card-text"><?= $user['email']; ?></p>
                        <p class="card-text"><small class="text-muted">Terdaftar sejak <?= date('d F Y', $user['date_created']); ?></small></p>
                        <a href="<?= base_url('profil/edit'); ?>" class="btn btn-primary">Ubah Foto Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

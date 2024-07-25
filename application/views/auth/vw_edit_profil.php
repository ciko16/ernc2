<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header justify-content-center">
Form Ubah Foto Profil
</div>
        <div class="card-body">
        <?= form_open_multipart('profil/update_profile_picture'); ?>
        <div class="form-group">
        <img src="<?= base_url('assets/img/profile/') . $user['gambar'];?>" style="width: 100px;" class="img-thumbnail">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="gambar" id="gambar" onchange="updateLabel(this)">
            <label for="gambar" class="custom-file-label"><?= $user['gambar'] ?></label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary float-right">Perbarui Foto Profil</button>
        <a href="<?= base_url('Profil') ?>" class="btn btn-danger">Tutup</a>
        <?= form_close(); ?>
        <?php if($this->session->flashdata('message')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('message'); ?></div>
        <?php endif; ?>
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        </div>
</div>
</div>
</div>

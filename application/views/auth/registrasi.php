    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="col-md-12">
                                        <center>
                                            <img width="100" src="<?=base_url('assets/img/tes.png')?>"
                                                alt="login.png"> <br><br>
                                                <center>
                                            <h2 style="color: black;">ERNC<sup>2</sup></h2>
                                                <h4 style="color: black;">Energy Research Nano Carbon Center</h4>
                                                <h5 style="color: black;">Pekanbaru, Riau</h5>
                                            </center>
                                    </div>
                                    <div class="text-center">
                                        <br>
                                        <b>
                                            <h1 class="h4 text-gray-900 mb-4">DAFTAR AKUN</h1>
                                        </b>
                                    </div>
                            <form class="user" method="POST" action="<?= base_url('auth/registrasi'); ?>">
                                <div class="form-group">
                                    <input type="text" name="nama" value="<?= set_value('nama'); ?>" class="form-control form-control-user" id="nama"
                                        placeholder="Nama Lengkap">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control form-control-user" id="email"
                                        placeholder="Alamat Email">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" value="<?= set_value('password1'); ?>" class="form-control form-control-user"
                                            id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password2" name="password2" placeholder="Ulangi Password">
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-custom-success btn-user btn-block">
                                    Daftar Akun
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('Auth') ?>">Sudah Punya Akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    <!-- JavaScript inti Bootstrap-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Plugin inti JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Skrip kustom untuk semua halaman-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
</body>

</html>

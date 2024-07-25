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
                                            <h1 class="h4 text-gray-900 mb-4">UBAH PASSWORD</h1>
                                        </b>
                                    </div>
                                    <form method="post" action="<?= base_url('Password'); ?>">

                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control"
                                                value="<?= set_value('email'); ?>" id="password1"
                                                placeholder="Email">
                                            <?= form_error('email', '<small class="text-danger p1-3">', '</small>'); ?>

                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password1" class="form-control"
                                                value="<?= set_value('password'); ?>" id="password1"
                                                placeholder="Password Baru">
                                            <?= form_error('password1', '<small class="text-danger p1-3">', '</small>'); ?>

                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password2" class="form-control"
                                                value="<?= set_value('password'); ?>" id="password2"
                                                placeholder="Ulangi Password Baru">
                                            <?= form_error('password2', '<small class="text-danger p1-3">', '</small>'); ?>

                                        </div>
                                        <button type="submit" class="btn btn-custom-success btn-user btn-block">
                                            Ubah Password Saya
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('Auth') ?>">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>
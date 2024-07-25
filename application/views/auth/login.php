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
                                            <h1 class="h4 text-gray-900 mb-4">SILAHKAN MASUK</h1>
                                        </b>
                                    </div>
                                <!-- Menampilkan pesan flashdata sesi -->
                                <?= $this->session->flashdata('message'); ?>
                                <!-- Formulir login -->
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <!-- Input Email -->
                                        <input type="text" name="email" value="<?= set_value('email'); ?>" class="form-control form-control-user"
                                            id="email" placeholder="Masukkan Alamat Email">
                                        <!-- Menampilkan kesalahan formulir untuk email -->
                                        <?= form_error('email','<small class="text-danger pl-3">','</small>');?>    
                                    </div>
                                    <div class="form-group">
                                        <!-- Input Password -->
                                        <input type="password" name="password" value="<?= set_value('password'); ?>" class="form-control form-control-user"
                                            id="password" placeholder="Password">
                                        <!-- Menampilkan kesalahan formulir untuk password -->
                                        <?= form_error('password','<small class="text-danger pl-3">','</small>');?>    
                                    </div>
                                    <!-- Tombol Kirim -->
                                    <button type="submit" class="btn btn-custom-success btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <!-- Tautan Lupa Password -->
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('Password') ?>">Lupa Password?</a>
                                </div>
                                <!-- Tautan Registrasi -->
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('Auth/registrasi')?>">Buat Akun!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
    </div>
</div>
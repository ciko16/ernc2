<header class="px-5 position-relative" style="height: 100vh;">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="height: 100%;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style="height: 100%;">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/img/carousel1.jpg') ?>" class="d-block w-100" alt="Laboratorium ERNC2" style="height: 50%; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/img/carousel2.jpg') ?>" class="d-block w-100" alt="Hasil pengujian dan eksperimen" style="height: 100%; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/img/logo1.png') ?>" class="d-block w-100" alt="Slide 3" style="height: 100%; object-fit: cover;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="overlay-content d-flex flex-column justify-content-center align-items-center text-center text-white">
        <h1 class="display-5 fw-bolder mb-2">Energy Research Nano Carbon Centre (ERNC<sup>2</sup>)</h1>
        <p class="lead text-white-50 mb-4">Pusat penelitian dan inovasi di bidang energi dan nano carbon.</p>
    </div>
</header>
<!-- Icon Section -->
<section class="py-5" style="background-color: #69c96e80;">
    <div class="container px-5 my-5" style="background-color: #69c96e80;">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Layanan Lab ERNC²</h2>
            <p class="lead mb-0">Laboratorium fisika material Energy Research Nano Carbon Centre (ERNC²) menyediakan layanan untuk mahasiswa, dosen, atau umum yang membutuhkan bantuan dalam proses konversi limbah biomassa menjadi karbon aktif berpori (pembakaran menggunakan furnace) atau alat yang dibutuhkan dalam eksperimen lainnya terkait pembuatan elektroda superkapasitor beserta layanan karakterisasi sifat elektrokimia seperti siklik voltametri (CV) dan galvanostatik charge-discharge (GCD).</p>
        </div>
        <div class="row gx-5">
            <!-- Service 1 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="text-center">
                    <div class="icon-box bg-light rounded-circle mb-4 mx-auto">
                        <i class="bi bi-gear-fill" style="font-size: 3rem; color: #6c757d;"></i>
                    </div>
                    <h5 class="fw-bolder">Konversi Limbah Biomassa</h5>
                    <p class="text-muted">Proses konversi limbah biomassa menjadi karbon aktif berpori menggunakan furnace.</p>
                </div>
            </div>
            <!-- Service 2 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="text-center">
                    <div class="icon-box bg-light rounded-circle mb-4 mx-auto">
                        <i class="bi bi-calendar-date-fill" style="font-size: 3rem; color: #6c757d;"></i>
                    </div>
                    <h5 class="fw-bolder">Pembuatan Elektroda Superkapasitor</h5>
                    <p class="text-muted">Layanan pembuatan elektroda superkapasitor dan eksperimen terkait.</p>
                </div>
            </div>
            <!-- Service 3 -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="text-center">
                    <div class="icon-box bg-light rounded-circle mb-4 mx-auto">
                        <i class="bi bi-lightbulb-fill" style="font-size: 3rem; color: #6c757d;"></i>
                    </div>
                    <h5 class="fw-bolder">Karakterisasi Sifat Elektrokimia</h5>
                    <p class="text-muted">Layanan karakterisasi sifat elektrokimia seperti siklik voltametri (CV) dan galvanostatik charge-discharge (GCD).</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pricing section (Video Cards)-->
<section class="bg-light py-5 border-bottom">
    <div class="container px-5 my-5" style="background-color: #69c96e80;">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Video tentang ERNC<sup>2</sup></h2>
            <p class="lead mb-0">Check out our latest videos</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <!-- Video card 1-->
            <div class="col-lg-6 col-xl-4 mb-5">
                <div class="card">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
                    <div class="card-body">
                        <h5 class="card-title">Video Title 1</h5>
                        <p class="card-text">Description of the first video.</p>
                    </div>
                </div>
            </div>
            <!-- Video card 2-->
            <div class="col-lg-6 col-xl-4 mb-5">
                <div class="card">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
                    <div class="card-body">
                        <h5 class="card-title">Video Title 2</h5>
                        <p class="card-text">Description of the second video.</p>
                    </div>
                </div>
            </div>
            <!-- Video card 3-->
            <div class="col-lg-6 col-xl-4">
                <div class="card">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allowfullscreen></iframe>
                    <div class="card-body">
                        <h5 class="card-title">Video Title 3</h5>
                        <p class="card-text">Description of the third video.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

           

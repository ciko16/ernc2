<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ERNC&sup2; - Energy Research Nano Carbon Center</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('frontend/assets/tes.png'); ?>" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('frontend/css/styles.css'); ?>" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lightbox CSS for this template -->
    <link href="<?= base_url('/frontend/css/lightbox.css')?> " rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css')?> " rel="stylesheet" type="text/css">
    <style>
        .header-container {
            position: relative;
            text-align: center;
            color: white;
        }
        .carousel-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .carousel-inner img {
            width: 100%;
            height: auto;
        }
        .header-content {
            position: relative;
            z-index: 1;
        }
        .header-background {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }
        .footer-text {
            color: #4a9540; /* Warna teks yang sedikit lebih gelap */
        }
        .navbar-nav .nav-link.active {
            color: #fba01c; /* warna teks untuk link aktif */
        }
        /* style untuk tombol kembali ke atas */
        #kembali-ke-atas {
            position: fixed;
            bottom: 40px;
            right: 40px;
            display: none;
            background-color: #87b753;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        #kembali-ke-atas:hover {
            background-color: #4a9540;
        }
        .btn-custom-success {
            background-color: #28a745;
            color: #155724;
            font-size: 14px;
        }
        .btn-custom-success:hover {
            background-color: #218828;
            color: #155724;
        }
        .bg-custom-orange {
            background-color:  #69c96e80 !important;
        }
        .nav-link-custom {
            color: #fca017 !important;
            text-shadow: 1px 1px 2px #333333; /* Tepian hitam keabu-abuan */
        }
        .nav-link-custom:hover {
            color: #FF8C00 !important; /* Warna oranye yang sedikit lebih gelap untuk efek hover */
        }
        #kembalikeatas {
            display: none; /* sembunyi secara default */
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #69c96e80;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 10px;
            transition: background-color 0.3s, transform 0.3s; /* transisi smooth */
        }
        #kembalikeatas:hover {
            background-color: #555; /* warna abu gelap untuk hover */
            transform: scale(1.1); /* scale tombol sedikit pada hover */
        }
        .custom-header {
            background-image: url('assets/img/galeri/tes.png'); /* Ganti path/to/your/image.jpg dengan path gambar Anda */
            background-size: cover; /* Ukuran gambar akan menyesuaikan dengan ukuran header */
            background-position: center; /* Posisi gambar di tengah header */
            height: 300px; /* Tinggi header */
            color: white; /* Warna teks */
            text-align: center; /* Teks di tengah header */
            display: flex;
            align-items: center; /* Posisikan teks ke tengah secara vertikal */
            justify-content: center; /* Posisikan teks ke tengah secara horizontal */
        }
        .card-deck {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .card {
            flex: 1;
            margin: 10px;
        }
        .card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .overlay-content {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5); /* Add a semi-transparent background if needed */
    }
    </style>
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:  #69c96e80;">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">
            <img src="<?php echo base_url('frontend/assets/tes.png'); ?>" alt="Custom Icon" style="width: 50px; height: 50px; margin-right: 8px;">
                ERNC<sup>2<sup></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- mengaktifkan highlight nav link pada navbar -->
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link nav-link-custom <?= ($this->uri->segment(2) == 'index') ? 'active' : ''; ?>" aria-current="page" href="<?= base_url('Home/index');?>">Beranda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-custom <?= ($this->uri->segment(2) == 'layananlaboratorium' || $this->uri->segment(2) == 'layananlab' || $this->uri->segment(2) == 'peminjamanlab') ? 'active' : ''; ?>" href="<?= base_url('Home/layananlaboratorium');?>">Layanan Laboratorium</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-custom <?= ($this->uri->segment(2) == 'galeri') ? 'active' : ''; ?>" href="<?= base_url('Home/galeri');?>">Galeri Laboratorium</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-custom <?= ($this->uri->segment(2) == 'kalender') ? 'active' : ''; ?>" href="<?= base_url('Home/kalender/');?>">Kalender</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-link-custom <?= ($this->uri->segment(2) == 'tentangkami') ? 'active' : ''; ?>" href="<?= base_url('Home/tentangkami');?>">Tentang ERNC&sup2;</a>
        </li>
    </ul>
</div>
        </div>
    </nav>

    <!-- tombol kembali ke atas -->
    <button id="kembali-ke-atas">Ke atas</button>

    <!-- javascript tombol kembali ke atas (tombol akan muncul ketika scroll lebih dari 200px) -->
     <script>
        var backToTopButton = document.getElementById("kembali-ke-atas");

        window.onscroll = function() {
            if (document.body.scrollTop > 200 || documentElement.scrollTop > 200) {
                backToTopButton.style.display = "block";
            } else {
                backToTopButton.style.display = "none";
            }
        };
        // memberikan animasi mulus ketika tombol ke atas ditekan
        backToTopButton.onclick = function() {
            window.scrollTo({ top:0, behavior: 'smooth'});
        };
     </script>
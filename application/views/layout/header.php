<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ERNC Admin</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css')?> " rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css')?> " rel="stylesheet">

    <!-- Custom favicon for this template -->
    <link rel="icon" href="<?= base_url('assets/img/tes.png')?>" type="image/x-icon">

    <!-- Lightbox CSS for this template -->
    <link href="<?= base_url('assets/css/lightbox.css')?> " rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('application/controllers/tes.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/ciko.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/header.css'); ?>">

    <style>
        /* Sticky Sidebar Vertically */
    #accordionSidebar {
    position: -webkit-sticky; /* For Safari */
    position: sticky;
    top: 0;
    height: 100vh; /* Full viewport height */
    /* overflow-y: auto; Enable vertical scrolling inside the sidebar */
    }   

    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('Home/index')?>">
                <div class="sidebar-brand-icon">
                <img src="<?= base_url('assets/img/tes.png')?>" alt="Brand Icon" style="width: 50px; height: 50px;">
                </div>
                <div class="sidebar-brand-text mx-3">ERNC<sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Dashboard')?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Admin
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('LayananLab') ?>">
                    <i class="fas fa-solid fa-flask"></i>
                    <span>Layanan Lab</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('PeminjamanLab') ?>">
                    <i class="fas fa-solid fa-clipboard-list"></i>
                    <span>Peminjaman Lab</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('BiayaLayanan') ?>">
                    <i class="fas fa-solid fa-money-bill"></i>
                    <span>Tabel Biaya Layanan</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Inventaris') ?>">
                    <i class="fas fa-solid fa-boxes"></i>
                    <span>Tabel Inventaris</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('TabelKalender') ?>">
                    <i class="fas fa-solid fa-calendar"></i>
                    <span>Tabel Kalender</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Galeri') ?>">
                    <i class="fas fa-solid fa-image"></i>
                    <span>Galeri</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="<?= site_url('TentangKami') ?>">
                    <i class="fas fa-solid fa-info"></i>
                    <span>Tentang Kami</span></a>
            </li> -->

            <div class="sidebar-heading">
                Pengaturan
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Profil') ?>">
                    <i class="fas fa-solid fa-user"></i>
                    <span>Akun</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                     <h3>ERNC<sup>2</sup> Admin</h3>
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/'). $user['gambar']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= site_url('Profil') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
<!-- application/views/dashboard/index.php -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
    <style>
        .status-ditolak {
            color: red;
        }

        .status-selesai {
            color: green;
        }
        .status-proses {
            color: #ffdb58;
        }
        .ketersediaan-tersedia {
            color: green;
        }
        .ketersediaan-tidaktersedia {
            color: red;
        }
        /* mengecilkan ukuran chart pendapatan */
        .chart-container {
            position: relative;
            width: 100%;
            height: 400px;
        }
        #pendapatanChart {
            max-width: 100%;
            max-height: 100%;
        }
    </style>
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Layanan Lab</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $layanan_lab_count; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-flask fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Peminjaman Lab</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $peminjaman_lab_count; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Inventaris Lab</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $inventaris_count; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Kalender</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kalender_count; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- Donut Chart -->
         <div class=" col-lg-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-success">Grafik Layanan Lab</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <hr>
                                    <?php foreach ($layanan_lab_by_status as $status): ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <?= $status['status']; ?>
                                            <span class="badge <?= 
                                              $status['status'] == 'Selesai' ? 'status-selesai' : 
                                              ($status['status'] == 'Ditolak' ? 'status-ditolak' : 
                                              ($status['status'] == 'Menunggu Konfirmasi' ? 'text-secondary' : 'status-proses')) 
                                              ?> badge-pill"><?= $status['count']; ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </div>
                            </div>
         </div>

         <!-- Donut Chart -->
         <div class=" col-lg-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-success">Grafik Peminjaman Lab</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="peminjaman"></canvas>
                                    </div>
                                    <hr>
                                    <?php foreach ($peminjaman_by_status as $status): ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <?= $status['status_peminjaman']; ?>
                                            <span class="badge <?= 
                                              $status['status_peminjaman'] == 'Selesai' ? 'status-selesai' : 
                                              ($status['status_peminjaman'] == 'Ditolak' ? 'status-ditolak' : 
                                              ($status['status_peminjaman'] == 'Menunggu Konfirmasi' ? 'text-secondary' : 'status-proses')) 
                                              ?> badge-pill"><?= $status['count']; ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </div>
                            </div>
         </div>

         <!-- Donut Chart -->
         <div class=" col-lg-4">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-success">Grafik Inventaris</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4">
                                        <canvas id="inventaris"></canvas>
                                    </div>
                                    <hr>
                                    <?php foreach ($inventaris_by_ketersediaan as $status): ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?= $status['ketersediaan']; ?>
                                        <span class="badge <?= $status['ketersediaan'] == 'Tersedia' ? 'ketersediaan-tersedia' : 'ketersediaan-tidaktersedia' ?> badge-pill"><?= $status['count']; ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </div>
                            </div>
         </div>
         <!-- Bar Chart -->
         <div class=" col-lg-12">
         <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-success">Grafik Kalender</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div>
                                    <hr>
                                    Grafik Data Kalender Agenda Lab
                                </div>
                            </div>
         </div>

         <!-- Bar Chart -->
         <div class="col-lg-12">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Grafik Pendapatan</h6>
        </div>
        <div class="card-body">
            <div class="chart-bar chart-container">
                <canvas id="pendapatanChart" width="400" height="200"></canvas>
            </div>
            <hr>
            <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pendapatan:</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($total_pendapatan, 0, ',', '.'); ?></div>
            </div>
            <p>Klik pada kotak di atas untuk menampilkan salah satu data dari Pendapatan Layanan dan Peminjaman</p>
        </div>
    </div>
</div>
    </div>
</div>
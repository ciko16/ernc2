<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Detail Kalender</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container my-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail untuk Tanggal: <?php echo date("d M Y", strtotime($detail->tanggal)); ?></h5>
            <p class="card-text"><strong>Isi:</strong> <?php echo $detail->isi; ?></p>
            <p class="card-text"><strong>Booking:</strong> <?php echo $detail->booking; ?></p>
            <a href="<?php echo base_url('home/kalender'); ?>" class="btn btn-primary">Kembali ke Kalender</a>
        </div>
    </div>
</div>
</body>
</html>

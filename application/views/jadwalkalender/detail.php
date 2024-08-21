<html>
<head>
    <title>Detail Tanggal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Detail untuk Tanggal: <?= $detail->tanggal ?></h2>
        <p><strong>Isi:</strong> <?= $detail->isi ?></p>
        <p><strong>Booking:</strong> <?= $detail->booking ?></p>
        <a href="<?= base_url('kalender') ?>" class="btn btn-primary">Kembali ke Kalender</a>
    </div>
</body>
</html>

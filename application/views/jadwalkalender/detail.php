<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Tanggal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Detail untuk Tanggal: <?= $detail->tanggal ?></h2>
        <p><strong>Isi:</strong> <?= htmlspecialchars($detail->isi) ?></p>
        <p><strong>Booking:</strong> <?= htmlspecialchars($detail->booking) ?></p>
        <a href="<?= base_url('kalender') ?>" class="btn btn-primary">Kembali ke Kalender</a>
    </div>
</body>
</html>

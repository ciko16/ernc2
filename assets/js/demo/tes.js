function initializeChart(pendapatanLayanan, pendapatanPeminjaman) {
    // Mengolah data untuk grafik
    var labels = [];
    var dataLayanan = [];
    var dataPeminjaman = [];

    console.log('Data Layanan:', pendapatanLayanan);
    console.log('Data Peminjaman:', pendapatanPeminjaman);

    pendapatanLayanan.forEach(function(item) {
        var label = item.year + '-' + ('0' + item.month).slice(-2);
        labels.push(label);
        dataLayanan.push(item.total_pendapatan_layanan);
    });

    pendapatanPeminjaman.forEach(function(item) {
        var label = item.year + '-' + ('0' + item.month).slice(-2);
        if (!labels.includes(label)) {
            labels.push(label);
        }
        dataPeminjaman.push(item.total_pendapatan_peminjaman);
    });

    // Menghapus duplikasi label
    labels = [...new Set(labels)];

    console.log('Labels:', labels);
    console.log('Data Layanan:', dataLayanan);
    console.log('Data Peminjaman:', dataPeminjaman);

    // Membuat grafik menggunakan Chart.js
    var ctx = document.getElementById('pendapatanChart').getContext('2d');
    var pendapatanChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Pendapatan Layanan',
                    data: dataLayanan,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    maxBarThickness: 50 // Setting maxBarThickness at dataset level
                },
                {
                    label: 'Pendapatan Peminjaman',
                    data: dataPeminjaman,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1,
                    maxBarThickness: 50 // Setting maxBarThickness at dataset level
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    });
}

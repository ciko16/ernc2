function initializeChart(pendapatanLayanan, pendapatanPeminjaman) {
    // Mengolah data untuk grafik
    var labels = [];
    var dataLayanan = [];
    var dataPeminjaman = [];

    console.log('Data Layanan:', pendapatanLayanan);
    console.log('Data Peminjaman:', pendapatanPeminjaman);

    pendapatanLayanan.forEach(function(item) {
        var date = new Date(item.created_date); // Mengkonversi string tanggal ke objek Date
        var label = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2);
        if (!labels.includes(label)) {
            labels.push(label);
        }
        if (!dataLayanan[label]) {
            dataLayanan[label] = 0;
        }
        dataLayanan[label] += parseFloat(item.total_pendapatan_layanan); // Ensure the value is a number
    });

    pendapatanPeminjaman.forEach(function(item) {
        var date = new Date(item.created_date); // Mengkonversi string tanggal ke objek Date
        var label = date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2);
        if (!labels.includes(label)) {
            labels.push(label);
        }
        if (!dataPeminjaman[label]) {
            dataPeminjaman[label] = 0;
        }
        dataPeminjaman[label] += parseFloat(item.total_pendapatan_peminjaman); // Ensure the value is a number
    });

    // Menghapus duplikasi label dan mengurutkan tanggal
    labels = [...new Set(labels)].sort();

    // membuat data array dari objek
    var dataLayananArray = labels.map(label => dataLayanan[label] || 0);
    var dataPeminjamanArray = labels.map(label => dataPeminjaman[label] || 0);

    console.log('Labels:', labels);
    console.log('Data Layanan:', dataLayananArray);
    console.log('Data Peminjaman:', dataPeminjamanArray);

    // Membuat grafik menggunakan Chart.js
    var ctx = document.getElementById('pendapatanChart').getContext('2d');
    var pendapatanChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Pendapatan Layanan',
                    data: dataLayananArray,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    maxBarThickness: 50 // Setting maxBarThickness at dataset level
                },
                {
                    label: 'Pendapatan Peminjaman',
                    data: dataPeminjamanArray,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1,
                    maxBarThickness: 50 // Setting maxBarThickness at dataset level
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 10,
                    bottom: 10
                }
            },
            scales: {
                x: {
                    ticks: {
                        font: {
                            size: 10
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1, // menampilkan angka bulat saja
                        font: {
                            size: 10
                        }
                    }
                }
            }
        }
    });
}

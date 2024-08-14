// Fungsi format angka
function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function initializeChart(pendapatanLayanan, pendapatanPeminjaman) {
    // Mengolah data untuk grafik
    var labels = [];
    var dataLayanan = {};
    var dataPeminjaman = {};

    console.log('Data Layanan:', pendapatanLayanan);
    console.log('Data Peminjaman:', pendapatanPeminjaman);

    pendapatanLayanan.forEach(function(item) {
        var label = item.year + '-' + ('0' + item.month).slice(-2);
        labels.push(label);
        dataLayanan[label] = item.total_pendapatan_layanan;
    });

    pendapatanPeminjaman.forEach(function(item) {
        var label = item.year + '-' + ('0' + item.month).slice(-2);
        labels.push(label);
        dataPeminjaman[label] = item.total_pendapatan_peminjaman;
    });

    // Menghapus duplikasi label dan mengurutkannya
    labels = [...new Set(labels)].sort();

    // Menyelaraskan data dengan label yang unik dan terurut
    var dataLayananArr = [];
    var dataPeminjamanArr = [];

    labels.forEach(function(label) {
        dataLayananArr.push(dataLayanan[label] || 0);
        dataPeminjamanArr.push(dataPeminjaman[label] || 0);
    });

    console.log('Labels:', labels);
    console.log('Data Layanan:', dataLayananArr);
    console.log('Data Peminjaman:', dataPeminjamanArr);

    // Membuat grafik menggunakan Chart.js
    var ctx = document.getElementById('pendapatanChart').getContext('2d');
    var pendapatanChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Pendapatan Layanan',
                    data: dataLayananArr,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    maxBarThickness: 50
                },
                {
                    label: 'Pendapatan Peminjaman',
                    data: dataPeminjamanArr,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1,
                    maxBarThickness: 50
                }
            ]
        },
        options: {
            scales: {
                x: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1, // Langkah pada sumbu y menjadi 1
                        callback: function(value) {
                            return Math.floor(value); // Pastikan nilai sumbu y selalu integer
                        }
                    },
                    grid: {
                        borderDash: [3],
                        zeroLineBorderDash: [3]
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            var datasetLabel = tooltipItem.dataset.label || '';
                            return datasetLabel + ': ' + number_format(tooltipItem.raw);
                        }
                    }
                }
            }
        }
    });
}

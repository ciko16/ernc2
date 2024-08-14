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
                    beginAtZero: true
                }
            }
        }
    });
}

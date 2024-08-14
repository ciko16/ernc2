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
  
  function initializeChart(dataPerBulan) {
    console.log('dataPerBulan: ', dataPerBulan);
    
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dataPerBulan.labels, // Gunakan labels dari dataPerBulan
            datasets: [{
                label: "Jumlah Data",
                backgroundColor: "#4e73df", // Ubah sesuai pallete yang diinginkan
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: dataPerBulan.data, // Gunakan data dari dataPerBulan
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                x: {
                    type: 'category',
                    labels: dataPerBulan.labels,
                    ticks: {
                        autoSkip: false, // Menampilkan semua label
                        maxRotation: 45, // Rotasi label jika diperlukan
                        minRotation: 0,
                    },
                    grid: {
                        display: false,
                    },
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        padding: 10,
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    },
                    grid: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                },
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ': ' + number_format(tooltipItem.raw);
                        }
                    }
                }
            }
        }
    });
  }
  
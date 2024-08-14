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
              backgroundColor: "#c2e0c6 ",
              hoverBackgroundColor: "#2e59d9",
              borderColor: "#c2e0c6 ",
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
              xAxes: [{
                type: 'time',
                  time: {
                      unit: 'month',
                      tooltipFormat: 'MM YYYY', //format tooltip
                      displayFormats: {
                        month: 'MM YYYY' //Format label
                      }
                  },
                  gridLines: {
                      display: false,
                      drawBorder: false
                  },
                  ticks: {
                      maxTicksLimit: 12 // Menampilkan semua bulan
                  },
                  maxBarThickness: 25
              }],
              yAxes: [{
                  ticks: {
                      beginAtZero: true,
                      padding: 10,
                      callback: function(value, index, values) {
                          return number_format(value);
                      }
                  },
                  gridLines: {
                      color: "rgb(234, 236, 244)",
                      zeroLineColor: "rgb(234, 236, 244)",
                      drawBorder: false,
                      borderDash: [2],
                      zeroLineBorderDash: [2]
                  }
              }],
          },
          legend: {
              display: false
          },
          tooltips: {
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
              callbacks: {
                  label: function(tooltipItem, chart) {
                      var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                      return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                  }
              }
          },
      }
  });
}

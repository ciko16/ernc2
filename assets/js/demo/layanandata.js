// Pastikan layananLabData tersedia secara global
console.log('layananLabData:', layananLabData);

var labels = [];
var data = [];
var backgroundColors = [];

layananLabData.forEach(function(status) {
    labels.push(status.status);
    data.push(status.count);
    // Berikan warna yang berbeda berdasarkan status
    if (status.status === 'Selesai') {
        backgroundColors.push('#87b753');
    } else if (status.status === 'Ditolak') {
        backgroundColors.push('#ff2400');
    } else if (status.status === 'Sedang Dikerjakan') {
        backgroundColors.push('#FFFF00');
    } else {
        backgroundColors.push('#000000');
    }
});

// Pastikan elemen canvas ada
var ctx = document.getElementById("myPieChart");
if (ctx) {
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: backgroundColors,
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
} else {
    console.error("Canvas element with id 'myPieChart' not found.");
}

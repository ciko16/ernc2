// Ensure peminjamanData is available globally
console.log('peminjamanData in peminjamandata.js:', peminjamanData);

var labels = [];
var data = [];
var backgroundColors = [];

peminjamanData.forEach(function(status_peminjaman) {
    labels.push(status_peminjaman.status_peminjaman);
    data.push(status_peminjaman.count);
    // Provide different colors based on status
    if (status_peminjaman.status_peminjaman === 'Selesai') {
        backgroundColors.push('#87b753');
    } else if (status_peminjaman.status_peminjaman === 'Ditolak') {
        backgroundColors.push('#ff2400');
    } else {
        backgroundColors.push('#ffdb58');
    }
});

// Ensure the canvas element is available
var ctx = document.getElementById("peminjaman");
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
    console.error("Canvas element with id 'peminjaman' not found.");
}

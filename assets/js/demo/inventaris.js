// Ensure peminjamanData is available globally
console.log('inventarisData in inventarisdata.js:', inventarisData);

var labels = [];
var data = [];
var backgroundColors = [];

inventarisData.forEach(function(ketersediaan) {
    labels.push(ketersediaan.ketersediaan);
    data.push(ketersediaan.count);
    // Provide different colors based on status
    if (ketersediaan.ketersediaan === 'Tersedia') {
        backgroundColors.push('#87b753');
    } else {
        backgroundColors.push('#ff2400');
    }
});

// Ensure the canvas element is available
var ctx = document.getElementById("inventaris");
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

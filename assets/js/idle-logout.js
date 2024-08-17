var idleTime = 0;

$(document).ready(function(){
    // Mengatur interval timer menjadi 10 menit (600.000 milidetik)
    var idleInterval = setInterval(timerIncrement, 600); // 10 menit

    // Reset timer saat ada aktivitas
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function(e) {
        idleTime = 0;
    });
});

function timerIncrement() {
    idleTime++;
    if (idleTime > 10) { // 10 menit
        window.location.href = "<?= base_url('Auth/logout'); ?>"; // Redirect ke URL logout
    }
}

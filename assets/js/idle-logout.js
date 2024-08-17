var idleTime = 0;
$(document).ready(function(){
    var idleInterval = setInterval(timerIncrement, 600); // 10 menit

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
        redirect('Auth');
    }
}
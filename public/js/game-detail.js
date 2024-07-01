$(document).ready(function() {
    var distance = 100000000; // initial distance
    setInterval(function() {
        countDown(distance);
        distance -= 1000; // decrease the distance by 1000 milliseconds (1 second) each time
    }, 1000);
});

function countDown(distance)
{
    var minutes = '00';
    var seconds = '00';
    if(distance > 0){
        minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        seconds = Math.floor((distance % (1000 * 60)) / 1000);
    }
    $('#count-down-time').text(minutes+':'+seconds);
}
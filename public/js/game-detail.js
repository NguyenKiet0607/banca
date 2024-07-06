$(document).ready(function() {
    setInterval(function() {
        countDown(distance);
        distance -= 1000; // decrease the distance by 1000 milliseconds (1 second) each time
    }, 1000);

    //Decrease coin after every minute
    setInterval(function() {
        $.ajax({
            url: '/api/user/decrease-coin',
            method: 'POST',
            success: function(data) {
                $('#coin').text(data.result);
            }
        })
    }, decreaseCoinTime*1000);

    //Get percentage of slot
    setInterval(function() {
        $.ajax({
            url: '/api/game/detail/'+slug,
            method: 'GET',
            success: function(data) {
                $('.percentage').text(data.result.percent+'%');
            }
        })
    }, 10000);
});

function countDown(distance)
{
    var minutes = '00';
    var seconds = '00';
    if(distance > 0){
        minutes = Math.floor((distance / (1000 * 60)));
        seconds = Math.floor((distance % (1000 * 60)) / 1000);
        minutes = minutes >= 10 ? minutes : '0'+minutes;
        seconds = seconds >= 10 ? seconds : '0'+seconds;
    }
    $('.count-down-time').text(minutes+':'+seconds);
}

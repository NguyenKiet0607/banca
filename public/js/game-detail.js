$(document).ready(function() {
    setInterval(function() {
        countDown(distance);
        distance -= 1000; // decrease the distance by 1000 milliseconds (1 second) each time
    }, 1000);

    //Decrease coin after every minute

    //decreaseCoin();
    setInterval(decreaseCoin, 2000);

    //Get percentage of slot
    setInterval(function() {
        $.ajax({
            url: '/api/game/detail/'+slug,
            method: 'GET',
            success: function(data) {
                $('.percentage').text(data.result.percent+'%');
                if(data.result.round && data.result.round_count) {
                    $('#text-line1').text(data.result.round);
                    $('#text-line2').text('Số vòng quay: ' + data.result.round_count);
                }
            }
        })
    }, 10000);

    $('.round').click(function() {
        $.ajax({
            url: '/api/game/round/'+slug,
            method: 'GET',
            success: function(data) {
                $('#round-modal h3').text(data.round);
                $('#round-modal .round_count').text('Số vòng quay: '+data.count);
                $('#text-line1').text(data.round);
                $('#text-line2').text('Số vòng quay: '+data.count);
                $('#text-line1-mobile').text(data.round);
                $('#text-line2-mobile').text('Số vòng quay: '+data.count);
            }
        })
        $('#round-modal').show();
    });

    $('#round-modal .btn-model-cc').click(function(e) {
        $('#round-modal').hide();
        $('#text-line1').show();
        $('#text-line2').show();
        $('#text-line1-mobile').show();
        $('#text-line2-mobile').show();
        $('.round').hide();

    });
});

function decreaseCoin() {
    // var coinValue = parseInt($('#coin').text()); // Lấy giá trị hiện tại của #coin và chuyển sang số nguyên
    if (coin <= 0 && expired_time <=0 ) {
        window.location.href = "/";
    }

    $.ajax({
        url: '/api/user/decrease-coin',
        method: 'POST',
        success: function(data) {
            $('#coin').text(data.coin);
            coin = data.coin;
            expired_time = data.expired_time;
            distance = expired_time*1000;
        }
    });
}

function getRandomCount(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function getRandomTime() {
    const now = new Date();

    // Randomly add 5 to 10 minutes to the current time for the start time
    const startOffset = Math.floor(Math.random() * 6) + 5; // Random from 5 to 10
    const startTime = new Date(now.getTime() + startOffset * 60000);

    // Randomly add 8 to 15 minutes to the start time for the end time
    const endOffset = Math.floor(Math.random() * 8) + 8; // Random from 8 to 15
    const endTime = new Date(startTime.getTime() + endOffset * 60000);

    const formatTime = (date) => {
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        return `${hours}:${minutes}`;
    };

    const startStr = formatTime(startTime);
    const endStr = formatTime(endTime);

    return `${startStr} - ${endStr}`;
}

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

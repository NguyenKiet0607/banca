$(document).ready(function() {
    //Get percentage of slot
    setInterval(function() {
        $.ajax({
            url: '/api/games',
            method: 'GET',
            data: {'parent_id': parent_id},
            success: function(data) {
                data.result.forEach(function(item) {
                    $('.percent_'+item.id).text(item.percent+'%');
                })
            }
        })
    }, 5000);

  //  decreaseCoin();
    setInterval(decreaseCoin, 2000);

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

});

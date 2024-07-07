
$(document).ready(function() {
    var userId;
    var coin;
    getProfile();
    $(document).on('click', '.btn-coin', function() {
        $('#coin-model').show();
    });

    $(document).on('click', '.btn-tele', function() {
        var telegramLink = 'https://t.me/hackslotokvip';
        window.open(telegramLink, '_blank');
    });

    $('#coinform .btn-model-cf').click(function(e) {
        e.preventDefault();
        let code = $('input[name="code"]').val();

        $.ajax({
            url: '/code',
            method: 'POST',
            data: {'code': code},
            success: function(data) {
                $('#coinform .error').remove();
                if(data.code === 404){
                    $('input[name="code"]').after('<div class="error">Code không đúng.</div>');
                }else if(data.message == 'Error'){
                    $('input[name="code"]').after('<div class="error">Đã có lỗi xảy ra, vui lòng liên hệ với admin để xử lý.</div>');
                }else if(data.message == 'used'){
                    $('input[name="code"]').after('<div class="error">Code đã được sử dụng.</div>');
                }else{
                    location.reload();
                }
            }
        })
    })

    $('#coinform .btn-model-cc').click(function(e) {
        $('#coin-model').hide();
    });

    $(document).on('click', '.btn-help', function() {
        $('#help-model').show();
    });

    $('#help-model .btn-model-cc').click(function(e) {
        $('#help-model').hide();
    });

    $('#coin-alert-model .btn-model-cc').click(function(e) {
        $('#coin-alert-model').hide();
    });
    $('.hamburger').click(function(e) {
        $('.header-group-btn').addClass('header-group-btn_active');
    });
    $(document).mouseup(function(e) 
    {
        var container = $(".header-group-btn");
        var container2 = $(".hamburger");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0 &&
        !container2.is(e.target) && container2.has(e.target).length === 0) 
        {
            container.removeClass('header-group-btn_active');
        }
    });

    function getProfile()
    {
        $.ajax({
            url: '/api/user/current',
            method: 'GET',
            success: function(data) {
                userId = data.result.id;
                coin = data.result.coin;
                if(coin <= 0) {
                    $('#coin-alert-model').show();
                }
                $('#coin').text(data.result.coin);
                $('#user-name').text(data.result.username);
            }
        })
    }
});

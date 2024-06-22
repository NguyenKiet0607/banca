
$(document).ready(function() {
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
    })
});

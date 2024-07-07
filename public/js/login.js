
$(document).ready(function() {
    $(document).on('click', '.btn-login', function() {
        $('#register-model').hide();
        $('#login-model').show();
    });
    $(document).on('click', '.btn-register', function() {
        $('#register-model').show();
        $('#login-model').hide();
    });

    $('#loginform .btn-model-cc').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: '/login',
            method: 'POST',
            data: $('#loginform').serialize(),
            success: function(data) {
                window.location.reload();
            },
            error: function(e) {
                if(e.status === 422){
                    $('#help-model h3').text('Tài khoản hoặc mật khẩu không chính xác.');
                }else{
                    $('#help-model h3').text('Có lỗi xảy ra. Vui lòng liên hệ admin để được hỗ trợ.');
                }
                $('#help-model').show();
            }
        })
    });

    $('#registerform .btn-model-cc').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: '/register',
            method: 'POST',
            data: $('#registerform').serialize(),
            success: function(data) {
                $('#help-model h3').text('Đăng ký thành công.');
                $('#help-model').show();
                setTimeout(function(){
                    window.location.reload();
                 }, 1000);
            },
            error: function(e, data) {
                console.log(e.responseJSON.message);
                if(e.status === 422){
                    $('#help-model h3').text(e.responseJSON.message);
                }else{
                    $('#help-model h3').text('Có lỗi xảy ra. Vui lòng liên hệ admin để được hỗ trợ.');
                }
                $('#help-model').show();
            }
        })
    })

    $('#loginform .btn-model-cf').click(function(e) {
        $('#login-model').hide();
    });
    $('#registerform .btn-model-cf').click(function(e) {
        $('#register-model').hide();
    });
});

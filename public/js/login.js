
$(document).ready(function() {
    $(document).on('click', '.btn-login', function() {
        $('#login-model').show();
    });
    $(document).on('click', '.btn-register', function() {
        $('#register-model').show();
    });

    $('#loginform .btn-model-cc').click(function(e) {
        e.preventDefault();
        let username = $('input[name="username"]').val();
        let password = $('input[name="password"]').val();

        $.ajax({
            url: '/login',
            method: 'POST',
            data: {'username': username, 'password': password},
            success: function(data) {
                window.location.reload();
            },
            error: function(e) {
                if(e.status === 422){
                    console.log('user, pass sai');
                }else{
                    console.log('co loi server');
                }
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

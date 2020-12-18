$(document).ready(function () {
            // ЗАБЫЛИ ПАРОЛЬ
    $('html').on('click','#forgot_password' ,function () {
        var login = $('#email_login').val();
        $.ajax({
            url: "obrabotka/forgot_password.php",
            type: "POST",
            dataType: "text",
            data: {
                'email': login
            },
            success: function(data) {
                data = JSON.parse(data);
                if(data[0] == 'errormail'){
                    $("#message").html("This account not exists!");
                    $("#message").fadeIn();
                } else {
                    $("#message").html("Email sent!");
                    $("#message").css({
                        'color':'black'
                    });
                    $("#message").fadeIn();
                }
            }
        });
    });

});
$(document).ready(function () {
    $('html').on('click','#account',function () {
        id_project = $(this).attr('alt');
        var heiblock = $(document).height();
        $('#quickorderfon').css({'height' : heiblock});
        var windWidth = $(window).width();
        var scrollTop = $(window).scrollTop();
        var windHeig = window.innerHeight;
        var iframHeig = $('#settings').height();
        var blockWidth = $('#settings').width();
        var otstupTop = (windHeig - iframHeig)/2 + scrollTop;
        var center = (windWidth - blockWidth)/2;
        $('#quickorderfon').fadeIn();
        $('#settings').css({
            "top": otstupTop+"px",
            "left": center+"px"
        })
        $('#settings').fadeIn();

        $('html').on('click','#confirm_login',function () {

            var password = $('#password_login').val();
            var login = $('#password_login').attr('name');

            // Функция подсветки незаполненных полей
            function lightEmpty(){
                $('.empty_field').parent().css({'color':'#d8512d'});
                $('.empty_field').css({'border-color':'#d8512d'});
                // Через полсекунды удаляем подсветку
                setTimeout(function(){
                    $('.empty_field').removeAttr('style');
                    $('.empty_field').parent().removeAttr('style');
                },3000);
            }

            if($(".empty_field").val() != '') {
                $.ajax({
                    url: "obrabotka/passChange.php",
                    type: "POST",
                    dataType: "text",
                    data: {
                        'password': password,
                        'login': login
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        if(data[0] == 0){
                            alert("что то пошло не так... пожалуйста свяжитесь с администрацией!");
                        } else {
                            $("#settings").empty();
                            $("#settings").append("<br><br><br><div style='text-align: center'><img src='images/checkok.png' width='70px' height='70px' alt='ok'><br><br><p>готово!</p></div>");
                            $('#quickorderfon').delay(2000).fadeOut();
                            $('#settings').delay(2000).fadeOut();
                        }
                    }
                });
            }
            else{
                lightEmpty();
                return false
            }
        });

    });

    $('html').on('click','.quickorderkrest, #quickorderfon' ,function () {
        $('#quickorderfon').fadeOut();
        $('#settings').fadeOut();
    });

});
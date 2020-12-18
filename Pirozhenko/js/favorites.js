$(document).ready(function() {
	$('html').on('click','.favor',function () {
		var contact = $(this).attr('id');
		var email = $('#password_login').attr('name');
		var DU = $(this).attr('name');
		if(DU == 0){
			$(this).attr('name',1);
			$(this).css({'background-color':'#F5AB26'});
		}
		else{
			$(this).attr('name',0);
			$(this).css({'background-color':'rgba(255, 255, 255, 0)'});
		}

		$.ajax({
			url: "obrabotka/favorites.php",
			type: "POST",
			dataType: "text",
			data: {
				'contact' : contact,
				'DU' : DU,
				'email' : email
			},
			success: function(data) {
				
			}
		});

	});
});
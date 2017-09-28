$(document).ready(function() {

	$('.Form_login').validate({
		
		rules : {

			email : {
				
				required : true,
				
			},
			password : {
				required : true,
			
				
			},
			
		},
		messages : {

			email : {

				required : "First name  không được để trống",
				
			},
			password : {

				required : "Last name không được để trống",
				
			},
		},

	});

});

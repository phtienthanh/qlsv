$(document).ready(function() {

	$('.Form_insert').validate({
		
		rules : {

			first_name : {
				
				maxlength : 30,
				
			},
			last_name : {

				maxlength : 30,
				
			},
			email : {

				required : true,
				email : true,
				
			},
			password : {

				required : true,
				
			},
			password_confirm : {

				required : true,
					
			},	

		},
		messages : {

			email : {

				required : "Email not be empty",
				email: "Email not formatted",
				
			},
			password :  {

				required : "Password not be empty",
				
			},

			password_confirm :  {

				required : " Confirm Password not be empty",
				
			},
		},

	});

});

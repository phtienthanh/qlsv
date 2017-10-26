$(document).ready(function() {

	$('.Form_insert').validate({
		
		rules : {

			first_name : {
				
				maxlength : 30,
				
			},
			last_name : {

				maxlength : 30,
				
			},
			Username : {

				required : true,
				maxlength: 30,
				minlength: 6,
				
			},
			email : {

				required : true,
				email : true,
				
			},
			password : {

				required : true,
				maxlength: 30,
				minlength: 6,
				
			},
			password_confirm : {

				required : true,
				maxlength: 30,
				minlength: 6,
					
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

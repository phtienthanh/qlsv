$(document).ready(function() {

	jQuery.validator.addMethod("lettersonly", function(value, element) {

		return this.optional(element) || /^[a-z,0-9,"",_]+$/i.test(value);
	
	}, "Only alphabets, numbers and underscores '_'");

	$('.Form_insert').validate({
		
		rules : {

			first_name : {
				
				maxlength : 30,
				
			},
			last_name : {

				maxlength : 30,
				
			},
			Username : {
				lettersonly: true,
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
			Username : {
				required : " Username not be empty",
			}

		},

	});

});

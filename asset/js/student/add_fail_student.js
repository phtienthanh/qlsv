$(document).ready(function() {

	$('.btn_select').click(function(){

		$('.userfile').click();
	    
	});

	jQuery.validator.addMethod("lettersonly", function(value, element) 
	{
	return this.optional(element) || /^[a-z,1-9,"",_]+$/i.test(value);
	}, "Only alphabets, numbers and underscores '_'");

	$('.Form_insert').validate({
		
		rules : {

			first_name : {
				maxlength: 30,
			},
			last_name : {
				maxlength: 30,
			},
			Username : {
				lettersonly: true,
				required : true,
				maxlength: 30,
				minlength: 6,
			},
			email : {
				minlength: 6,
				maxlength: 30,
				required : true,
				email : true,
			},
			password : {
				minlength: 6,
				maxlength: 30,
				required : true,
			},
			confirm_password : {
				minlength: 6,
				maxlength: 30,
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

			confirm_password :  {

				required : " Confirm Password not be empty",
				
			},

		},

	});

});

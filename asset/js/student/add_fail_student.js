$(document).ready(function() {

	$('.btn_select').click(function(){

		$('.userfile').click();
	    
	});

	$('.Form_insert').validate({
		
		rules : {

			first_name : {
				maxlength: 30,
			},
			last_name : {
				maxlength: 30,
			},
			Username : {
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

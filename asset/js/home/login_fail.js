$(document).ready(function() {

	$('.Form_login').validate({
		
		rules : {

			email : {
				
				required : true,
				email:true,
				maxlength: 30,
				minlength: 6,
				
			},
			password : {
				required : true,
				maxlength: 30,
				minlength: 6,
				
			},
			
		},
		messages : {

			email : {

				required : "First name  not be empty",

			},
			password : {

				required : "Last name not be empty",
				
			},
		},

	});

});

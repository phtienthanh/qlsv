$(document).ready(function() {

	$('.Form_login').validate({
		
		rules : {

			email : {
				
				required : true,
				email:true,
				
			},
			password : {
				required : true,
			
				
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

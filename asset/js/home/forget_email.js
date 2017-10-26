$(document).ready(function() {

	$('.form_forget').validate({
		
		rules : {

			email : {
				
				required : true,
				
			},
			
		},
		messages : {

			email : {

				required : "Email not be empty ",
				
			},
			
		},

	});

});

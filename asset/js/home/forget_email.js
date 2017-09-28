$(document).ready(function() {

	$('.form_forget').validate({
		
		rules : {

			email : {
				
				required : true,
				
			},
			
		},
		messages : {

			email : {

				required : "First name  không được để trống",
				
			},
			
		},

	});

});

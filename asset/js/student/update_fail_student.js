$(document).ready(function() {

	$('.Form_insert').validate({
		
		rules : {

			first_name : {
				required : true,
			},
			last_name : {
				required : true,
			},
			role : {
				required : true,
			},
		
		},

		messages : {

			first_name : {
				required : "First name  không được để trống",
			},
			last_name : {
				required : "Last name không được để trống",
			},
			role : {
				required : "Email không được để trống",
			},
			
		},

	});

});

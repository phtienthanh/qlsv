$(document).ready(function() {

	$('.wrapper').validate({
		
		rules : {

			old_password : {
				
				required : true,
				maxlength: 30,
				minlength: 6,
				
			},
			new_password : {

				required : true,
				maxlength: 30,
				minlength: 6,
				
			},
			new_password_confirm : {

				required : true,
				maxlength: 30,
				minlength: 6,
				
			},

		},
		messages : {

			old_password : {

				// required : "First name không được để trống",
				minlength: "Enter at least 8 characters",
				
			},
			new_password : {

				// required : "Last name không được để trống",
				minlength: "Enter at least 8 characters",
				
			},
			new_password_confirm : {

				// required : "Email không được để trống",
				minlength: "Enter at least 8 characters",
				
			},

		},

	});

});

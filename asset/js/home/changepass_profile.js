$(document).ready(function() {

	$('.wrapper').validate({
		
		rules : {

			old_password : {
				
				required : true,
				minlength: 8,
				
			},
			new_password : {

				required : true,
				minlength: 8,
				
			},
			new_password_confirm : {

				required : true,
				minlength: 8,
				
			},

		},
		messages : {

			old_password : {

				required : "First name không được để trống",
				minlength: "Enter at least 8 characters",
				
			},
			new_password : {

				required : "Last name không được để trống",
				minlength: "Enter at least 8 characters",
				
			},
			new_password_confirm : {

				required : "Email không được để trống",
				minlength: "Enter at least 8 characters",
				
			},

		},

	});

});

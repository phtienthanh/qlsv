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
				required : "Current password not be empty",
				minlength: "Enter at least 6 characters",
			},
			new_password : {
				required : "New password not be empty",
				minlength: "Enter at least 6 characters",
			},
			new_password_confirm : {
				required : "Confirm password not be empty",
				minlength: "Enter at least 6 characters",
			},

		},

	});

});

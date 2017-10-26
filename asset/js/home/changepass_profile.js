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
				required : "Current password  field is required",
				minlength: "Enter at least 8 characters",
			},
			new_password : {
				required : "New password  field is required",
				minlength: "Enter at least 8 characters",
			},
			new_password_confirm : {
				required : "Confirm password  field is required",,
				minlength: "Enter at least 8 characters",
			},

		},

	});

});

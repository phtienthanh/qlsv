$(document).ready(function() {

	$('.btn_select').click(function(){

		$('.userfile').click();
	    
	});

	$('.Form_insert').validate({
		
		rules : {

			first_name : {

				required : true,
				
			},
			last_name : {

				required : true,
				
			},
			email : {

				required : true,
				email : true,
				
			},
			password : {

				required : true,
				
			},
			confirm_password : {

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
			email : {
				
				required : "Email không được để trống",
				email: "Email không được định dạng",
				
			},
			password :  {

				required : "Password không được để trống",
				
			},

			confirm_password :  {

				required : " Confirm Password không được để trống",
				
			},

		},

	});

});

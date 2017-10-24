$(document).ready(function() {

	$('.btn_select').click(function(){

		$('.userfile').click();
	    
	});
	
	$('.Form_insert').validate({
		
		rules : {

			first_name : {

				maxlength: 30,

			},
			last_name : {

				maxlength: 30,

			},
			role : {

				required : true,

			},
		
		},

		messages : {

			role : {
				
				required : "Email not be empty",

			},
			
		},

	});

});

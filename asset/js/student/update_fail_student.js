$(document).ready(function() {

	$('.btn_select').click(function(){

		$('.userfile').click();
	    
	});

	jQuery.validator.addMethod("lettersonly", function(value, element) 
	{
	return this.optional(element) || /^[a-z,1-9,"",_]+$/i.test(value);
	}, "Only alphabets, numbers and underscores '_'");
	
	$('.Form_insert').validate({
		
		rules : {

			first_name : {

				maxlength: 30,

			},
			username : {
				lettersonly: true,
				required : true,
				maxlength: 30,
				minlength: 6,
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
				
				required : "Role not be empty",

			},
			
		},

	});

});

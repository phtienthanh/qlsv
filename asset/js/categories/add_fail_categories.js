
$(document).ready(function() {

$('.wrapper').validate({
		
		rules : {

			input_text : {
				maxlength: 30,
				minlength: 6,
				required : true,
				
			},
		
		},

		messages : {

			input_text : {

				required : "Name not be empty",
				
			},
			
		},

	});

});


$(document).ready(function() {

$('.wrapper').validate({
		
		rules : {

			input_text : {
				
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

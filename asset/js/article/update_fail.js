$(document).ready(function() {

	$('.btn_select').click(function(){

		$('.userfile').click();
	    
	});

	$('.form_update').validate({
		
		rules : {
			title : {

				required : true,
				maxlength: 100,
				minlength: 6,
				
			},
			slug : {

				required : true,
				maxlength: 100,
				minlength: 6,
				
			},	
			author : {

				required : true,
				
			},
			
		},

		messages : {

			title : {
				
				required : "Title not be empty",
				
			},
			slug : {

				required : "slug not be empty",
				
			},
			author : {

				required : "Author not be empty",
				
			},

		},

	});

});

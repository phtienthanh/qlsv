$(document).ready(function() {

	$('.btn_select').click(function(){

		$('.userfile').click();
	    
	});

	$('.form_update').validate({
		
		rules : {
			title : {

				required : true,
				
			},
			slug : {

				required : true,
				
			},	
			author : {

				required : true,
				
			},


			content : {

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
			content : {

				required : "Content not be empty",
				
			},
			

		},

	});

});

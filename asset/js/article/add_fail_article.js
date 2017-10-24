$(document).ready(function() {

	$('.btn_select').click(function(){

		$('.avatar').click();
    
	});

	$('.Form_insert').validate({
		
		rules : {
			
			title : {
				
				required : true,
				
			},
			author : {
				
				required : true,
				
			},
			categories : {
				
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
			author : {
				
				required : "Author not be empty",
				
			},
			content : {
				
				required : "Content not be empty",
				
			},
			categories : {

				required : "Categories not be empty",
				
			},

		},

	});

});

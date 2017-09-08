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
				
				required : "Title không được để trống",
				
			},
			slug : {
				required : "slug không được để trống",
				
			},
			author : {
				required : "Author không được để trống",
				
			},
			content : {
				required : "Content không được để trống",
				
			},
			

		},

	});

});

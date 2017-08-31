$(document).ready(function() {

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
				
			}
		},

		messages : {

			title : {
				required : "Title không được để trống",
				
			},
			author : {
				required : "Author không được để trống",
				
			},
			content : {
				required : "Content không được để trống",
				
			},
			categories : {
				required : "Categories không được để trống",
				
			},

		},

	});

});

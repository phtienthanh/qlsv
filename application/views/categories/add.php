<!DOCTYPE html>
<html>
<head>

</head>


<body>
	<div class="insert">

	<h1>Add categories</h1>
		<div> <a href="<?php echo base_url('categories/home') ?>" title="" class="btn btn-warning back">Back</a></div>
    <form  class="wrapper" action="" name="myForm" method="post" accept-charset="utf-8" id="dataTable">
        <input type="text"  class="form-control form-control-line" name="input_text" class="input_text">
        <input type="submit"  name="submit" value="thêm mới" class="btn  btn-primary add-cate hinden">
        <?php echo form_error("input_text"); ?>
        <span id="eror_cfpassword"></span>
    </form>
        
		
	</div>
		
</body>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="{{url(js/validate.js)}}"></script>
<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>asset/js/categories/add_fail_categories.js"></script>
</html>
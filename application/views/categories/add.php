<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/table.css" rel="stylesheet">

</head>


<body>
	<div class="insert">

	<h1>Add categories</h1>
		<div> <a href="<?php echo base_url('categories/home') ?>" title="" class="btn btn-warning back">Back</a></div>
    <form  class="wrapper" action="" method="post" accept-charset="utf-8" id="dataTable">
        <input type="text"  class="form-control form-control-line" name="input_text" class="input_text">
        <input type="submit"  name="submit" value="thêm mới" class="btn btn-primary add-cate">
        <?php echo form_error("input_text"); ?>
    </form>
		
	</div>
		
</body>
<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
</html>
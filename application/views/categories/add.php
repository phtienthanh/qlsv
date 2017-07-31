<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/categories/add.css" rel="stylesheet">

</head>


<body>

		<h1>Add categories</h1>
		<span class="addcate"> <a href="<?php echo base_url('categories/home') ?>" title="" class="btn btn-warning back">Back</a></span>
    <form action="" method="post" accept-charset="utf-8" id="dataTable">
        <input type="text" name="input_text" class="input_text">
        <input type="submit" name="submit" value="thêm mới" class="btn btn-primary">
        <?php echo form_error("input_text"); ?>
    </form>

</body>
</html>
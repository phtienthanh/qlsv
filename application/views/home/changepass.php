<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> </title>
	<link rel="stylesheet" href="">

</head>
<body>
<style type="text/css" media="screen">
	
	input {
		margin:10px;
	}
	label {
		margin: 10px;

	}
	p{
		display: inline-block;
		color: red;

	}

</style>
<form action="" method="POST">

	<input type="submit" name="back" value="Back">

	<br> 
	<label for="">Current password</label>
	<br> 
	<input type="password"	name="old_password" placeholder="Current password" >
		
	<?php echo form_error('old_password'); ?> 
		
	<br> 
	<label for="">New password</label>
	<br> 
	<input type="password" name="new_password" placeholder="New password">

	<?php echo form_error("new_password"); ?> 
		
	<br> 
	<label for="">Confirm password</label>
	<br> 
	<input type="password" name="new_password_confirm" placeholder="Confirm password">

	<?php echo form_error("new_password_confirm"); ?> 
	<br>

	<input type="submit" name="change" value="change">
	
</form>
	
</body>
</html>
<?php  

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>form login </title>
	<!-- <link href="<? echo base_url();?>asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/login.css">

	
</head>
<body>
<style type="text/css" media="screen">

</style>
</nav>
	<form action="<?php echo base_url();?>home/login" method="POST" role="form">
	
		<div class="title"> Login</div>
		
		<div class="form-group form-gr">
			<label for="">Email</label>
			<br>
			<input type="text" class="form-control" name="email" placeholder="Input field">
			<?php echo form_error('email'); ?> 
			<br>
			<br>
			<label for="">Password</label>
			<br>
			<input type="password" class="form-control" name="password"  id="" placeholder="Input field">
			<?php echo form_error('password'); ?> 
			<br>
			<input type="submit" name="submit" value="Login" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">
		</div>
	</form>
</body>
<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
</html>
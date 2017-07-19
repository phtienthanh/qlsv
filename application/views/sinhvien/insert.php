<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm mới</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body class="container">
<style>
form {
	margin-left: 40px;
}

input {
	margin: 10px 0;
}

p {
	color: red;
    display: inline-block;
    margin-left: 20px;	
}

</style>

	<form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="submit" name="back" value="Back" >
      	<br> 
		<label for="">First name</label>
		<br>
		<input type="text" name="first_name" placeholder="First name" value="<?php echo set_value("first_name"); ?>">
			
		<?php echo form_error("first_name"); ?>
			
		<br>
		<label for="">Last name</label>
		<br>				
		<input type="text" name="last_name" placeholder="Last name" value="<?php echo set_value("last_name"); ?>">
		
		<?php echo form_error("last_name"); ?>
			
		<br>
		<label for="">Email</label>
		<br>
		<input type="text" name="email" placeholder="Email" value="<?php echo set_value("email");?>" >
			
		<?php echo form_error("email"); ?>
			
		<br>
		<label for="">Password</label>
	
			<br>
		<input type="password"  name="password" placeholder="Password"  value="<?php echo set_value("password");?>">
			
		<?php echo form_error("password"); ?>
		<br> 
		<label for="">Confirm Password</label>
		<br>
		<input type="password"  name="confirm_password" placeholder="Confirm password"  value="<?php echo set_value("confirm_password");?>">
			
		<?php echo form_error("confirm_password"); ?>
		
		<br>			
		<label for="">Avatar</label>


		<?php echo $error;?>
		
		<br>
		<input type="file" name="userfile">
			
		<br>
		<label for="">Role</label>
		<br>
		<select name="role">
			<option>Admin</option>
			<option>User</option>
		</select>
		
			
		<?php echo form_error("role"); ?>
			
		<br>
		<input type="submit" name="submit" value="insert">
	</form>

</body>

</html>
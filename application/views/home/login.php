<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>form login </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
</head>
<body>
<style type="text/css" media="screen">
	.title {
    font-size: 30px;
    text-align: center;
    padding-bottom: 40px;
}
 table {
        width: 100%;
    }
    
    td {
        text-align: center;
    }
    
    body {
    	text-align: center;
        background-color: #f3f3f3;
    }
    .form-gr{
    	text-align: center;
    	width: 20%;
    	display: inline-block;
    }
    input{
    	width: 100%;
    	padding: 5px;
    }
    label {
    	float: left;
    }
    .button_login{
    	width: 70%;
    }
    p{
   		text-align: left;
    	color: red;
    	margin: 10px;
    }

</style>

	<form action="http://localhost/training/index.php/home/login" method="POST" role="form">
	
		<div class="title"> Login</div>
		
		<div class="form-group form-gr">
			<label for="">Email</label>
			<br>
			<input type="text" class="form-control" name="identity" placeholder="Input field"  >
			<?php echo form_error('identity'); ?> 
			<br>
			<br>
			<label for="">Password</label>
			
			<br>
			<input type="password" class="form-control" name="password"  id="" placeholder="Input field"><?php echo form_error('password'); ?> 
			
			<br>
			
			<input type="submit" name="submit" value="Login" class="button_login">
			
		</div>
		
	
		
	
	</form>
	
</body>
</html>
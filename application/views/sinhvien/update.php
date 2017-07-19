<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Thêm mới</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" href="">
</head>
<body>
<style>
  form{
    margin-left: 40px;
  }
  
  input{
    margin: 10px 0;
  }
  
  p {
    color: red;
    display: inline-block;
    margin-left: 20px;
  }
  
  .back {
    margin-left: 40px;
  }
  .hinden {
    display: none;
  }
  
</style>
    
  <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data" >
      <input type="submit" name="back" value="Back" >
      <br> 
      <label for="">First name</label>
      <br>
      <input type="text"  name="first_name" placeholder="First name" value="<?php echo $student["first_name"];?>">
      
      <?php echo form_error("first_name"); ?> 
      
      <br>
      <label for="">Last name</label>
      <br>        
      <input type="text" name="last_name" placeholder="Last name" value="<?php echo $student["last_name"];?>" >
      
      <?php echo form_error("last_name"); ?>
      
      <br>
      <label for="">Email</label>
      <br>
      <input type="text"  name="email" readonly="value" placeholder="Email" value="<?php echo $student["email"];?> " >  
      
      <br>
      <label for="">Avatar</label>
      <br>
      <img src="<?php echo base_url();?>images/<?php echo $student["avatar"];?>"  width="150">
      <input type="text" name="img_name" class="hinden" value="<?php echo $student["avatar"]; ?>"/>
      <input type="file" name="userfile" value="<?php echo $student["avatar"]; ?>"/>
      

      <br>
     <!--  <input type="text"  name="avarta" placeholder="Avatar" value="<?php echo $student["avatar"];?>"> -->
      
      <?php echo form_error("avarta"); ?>
      
      <br>
      <label for="">Role</label>
      <br>
      <select name="role" value="<?php echo $student["role"];?>">
      <option>Admin</option>
      <option>User</option>
       </select>
     <!--  <input type="text"  name="role" placeholder="Role" value="<?php echo $student["role"];?>"> -->
      
      <?php echo form_error("role"); ?>
      
      <br>
      <input type="submit" name="insert" value="Update">
      <input type="submit" name="change_password" value="Change password">
  </form>
  <?php echo form_open_multipart('home/upload');?>
      
</body>
</html>
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
      <input type="text"  name="title" placeholder="Title" value="<?php echo $student["title"];?>">
      
      <?php echo form_error("title"); ?> 
      
      <br>
      <label for="">Last name</label>
      <br>        
      <input type="text" name="content" placeholder="Content" value="<?php echo $student["content"];?>" >
      
      <?php echo form_error("content"); ?>
      
      <br>
   
      
      <br>
      <label for="">Avatar</label>
      <br>
      <img src="<?php echo base_url();?>images/<?php echo $student["image"];?>"  width="150">
      <input type="text" name="img_name" class="hinden" value="<?php echo $student["image"]; ?>"/>
      <input type="file" name="userfile" value="<?php echo $student["image"]; ?>"/>
      

      <br>
     <!--  <input type="text"  name="avarta" placeholder="Avatar" value="<?php echo $student["avatar"];?>"> -->
      
      <?php echo form_error("avarta"); ?>
      
      <br>
       <label for="">Author</label>
    <input type="text" name="author" placeholder="author" value="<?php echo $student["author"];?>" >
      
      <?php echo form_error("content"); ?>
      
      <br>
      <br>
       <label for="">Categories</label>
    <input type="text" name="categories" placeholder="categories" value="<?php echo $student["categories"];?>" >
      
      <?php echo form_error("content"); ?>
      
      <br>
     <!--  <input type="text"  name="role" placeholder="Role" value="<?php echo $student["role"];?>"> -->
      
  
      
      <br>
      <input type="submit" name="insert" value="Update">
      <input type="submit" name="change_password" value="Change password">
  </form>
  <?php echo form_open_multipart('home/upload');?>
      
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Thêm mới</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/student/update.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/table.css">
    
</head>

<body>
<h1 class="title">Update student</h1>
<p class="title"> <?php  if (isset($upload_fail) && count($upload_fail)) {

    echo $upload_fail;
   
} ?></p>
    <div class="insert">
        <form action="" class="Form_insert" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <input type="submit" name="back" value="Back" class="btn btn-danger btn-block btn-insert" >
        <br>
        <label for="">First name</label>
        <br>
        <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo $student["first_name"];?>">
        <?php echo form_error("first_name"); ?>
        <br>
        <label for="">Last name</label>
        <br>
        <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo $student["last_name"];?>">
        <?php echo form_error("last_name"); ?>
        <br>
        <label for="">Email</label>
        <br>
        <input type="text" name="email" class="form-control" readonly="value" placeholder="Email" value="<?php echo $student["email"];?> ">
        <br>
        <label for="">Avatar</label>
        <br>
        <img src="<?php echo base_url();?>asset/images/student/<?php echo $student["avatar"];?>" width="150">
        <input type="text" name="img_name" class="form-control hinden"  value="<?php echo $student["avatar"]; ?>"/>
        <input type="file" name="userfile"  value="<?php echo $student["avatar"]; ?>"/>
        <br>
        <!--  <input type="text"  name="avarta" placeholder="Avatar" value="<?php echo $student["avatar"];?>"> -->
        <?php echo form_error("avarta"); ?>
        <br>
        <label for="">Role</label>
        <br>
        <select name="role" class="form-control" value="<?php echo $student["role"];?>">
            <option <?php if ($student["role"] == "Admin") {

               echo "selected";

            }  ?>>Admin</option>

            <option <?php if ($student["role"] == "User") {
            
               echo "selected";
            
            }  ?>>User</option>
        
        </select>

        <?php echo form_error("role"); ?>
        <br>
        <input class="btn btn-warning" type="submit" name="insert" value="Update">
        <span><a class="btn btn-success" href="<?php echo base_url();?>sinhvien/changepass/<?php echo $student["id"];?>" title=""> Change password</a></span>
    </form>
    </div>
    <?php echo form_open_multipart('home/upload');?>
</body>
<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
</html>
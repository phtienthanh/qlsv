<!DOCTYPE html>
<html>
<body class="updateBody">
    <div class="insert">
        <form action="" class="Form_insert" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <h1 class="title">Update student</h1>
            <p class="title"><?php  if (isset($upload_fail) && count($upload_fail) > 0) { echo $upload_fail; } ?></p>
            <h3 class="title"><?php echo $this->session->flashdata('message_update'); ?></h3>
            <span class="btn-block"> <a href="<?php echo base_url('sinhvien/show')  ?>" title="" class="btn  btn-default btn-back widthbtn ">Back</a></span>
            <br>
            <label for="">First name</label>
            <br>
            <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php
            if (isset($student["first_name"]) && count($student["first_name"]) > 0) {
             echo $student["first_name"]; }?>">
            <label class="error"> <?php echo form_error("first_name"); ?></label>
            <br>
            <label for="">Last name</label>
            <br>
            <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php
            if (isset($student["last_name"]) && count($student["last_name"]) > 0) {
             echo $student["last_name"]; }?>">
            <label class="error"> <?php echo form_error("last_name"); ?></label>
            <br>
            <label for="">Username</label>
            <br>
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php
            if (isset($student["username"]) && count($student["username"]) > 0) {
             echo $student["username"]; }?>">
            <label class="error"> <?php echo form_error("username"); ?></label>
            <br>
            <label for="">Email</label>
            <br>
            <input type="text" name="email" class="form-control" readonly="value" placeholder="Email" value="<?php if (isset($student["email"]) && count($student["email"]) > 0) { echo $student["email"];}?> ">
            <br>
            <label for="">Avatar</label>
            <br>
            <img src="<?php echo base_url();?>medias/student/<?php  if (isset($student["avatar"]) && count($student["avatar"]) > 0) {
             echo $student["avatar"]; }?>" width="150">
            <input type="text" name="img_name" class="form-control hinden" value="<?php echo $student["avatar"]; ?>"/>
            <input type="file" name="userfile" class="userfile hinden">
             <p class="btn btn-primary btn_select ">Select image</p>
            <br>
            <?php echo form_error("avarta"); ?>
            <br>
            <label for="">Role</label>
            <br>
            <?php if(isset($roleUpdate) && count($roleUpdate) > 0) { ?>

                <?php foreach ($roleUpdate as $keyRole => $valRole) { ?>
    
                    <tr selected><input name='<?php echo $valRole['id']; ?>' type='checkbox' value='<?php echo $valRole['id']; ?>'<?php if (in_array($valRole['name'], $UserGroup) == true) {  echo "checked";} ?>/> <?php echo $valRole['name']; ?></tr>         
                <?php } ?>
            
            <?php } ?>  
        
            <?php echo form_error("role"); ?>
            <br>
            <br>
            <input class="btn btn-success widthbtn" type="submit" name="insert"  value="Update">
            <span><a class="btn btn-success " href="<?php echo base_url();?>sinhvien/changepass/<?php echo $student["id"];?>" title=""> Change password</a></span>
        </form>
    </div>
    <?php echo form_open_multipart('home/upload');?>
</body>
<script src="<?php echo base_url(); ?>asset/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>asset/js/student/update_fail_student.js"></script>
</html>
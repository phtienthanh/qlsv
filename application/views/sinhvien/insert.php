<!DOCTYPE html>
<html>

<body class="dangkiBody">
    <div class="insert">
        <form action="" name="myForm" class="Form_insert" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <h1 class="title">Add new student</h1>
            <div class="title">
                <?php echo $this->session->flashdata('message_update'); ?>
            </div>
            <h3><?php if (isset($error) && count($error) > 0) {echo $error; } ?></h3>
            <h3><?php if (isset($succes) && count($succes) > 0 ) {echo $succes; } ?></h3>
            <span><a class="btn  btn-default btn-back btn-insert" href="<?php echo base_url();?>sinhvien/show" title="">Back</a></span>
            <br>
            <h3 for="">First name</h3>
            <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo set_value("first_name"); ?>">
            <span id="eror_first_name"> </span>
            <h3 for="">Last name</h3>
            <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo set_value("last_name"); ?>">
            <h3 for="">Username</h3>
            <input type="text" name="Username" class="form-control" placeholder="Username" value="<?php echo set_value("Username"); ?>">
            <span class="fail2"><?php echo form_error("Username"); ?></span>
            <h3 for="">Email</h3>
            <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo set_value("email");?>">
            <span class="fail2"><?php echo form_error("email"); ?></span>
            <h3 for="">Password</h3>
            <input type="password" name="password" placeholder="Password" class="form-control password" value="<?php echo set_value("password");?>">
            <span class="fail2"><?php echo form_error("password"); ?></span>
            <span id="eror_password"> </span>
            <h3 for="">Confirm Password</h3>
            <input type="password" name="password_confirm" placeholder="Confirm password" class="form-control" value="<?php echo set_value("password_confirm");?>">
            <span class="fail2"><?php echo form_error("password_confirm"); ?></span>
            <span id="eror_cfpassword"> </span>
            <h3 for="">Avatar</h3>
            <input type="file" name="userfile"  class="custom-file-input">
            <h3 for="">Role</h3>
            <?php 
            if(isset($role) && count($role) > 0) { 
                foreach ($role as $keyRole => $valRole) { ?>
                    <div class="role_tr">
                        <tr selected>
                            <input class="checkbox_role" name='<?php echo $valRole['id']; ?>' type='checkbox'  value='<?php echo $valRole['id']; ?>' /><?php echo $valRole['name']; ?>
                        </tr>
                    </div> 
            <?php 

                }  

            }
             
            ?>
            <?php echo form_error("role"); ?>
            <br>
            <input type="submit" name="submit" value="Insert" class="btn btn-success btn-insert">
        </form>
    </div>
    <script src="<?php echo base_url(); ?>asset/js/student/add_fail_student.js"></script>
</body>

</html>
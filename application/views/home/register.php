<!DOCTYPE html>
<html>
<body class="dangkiBody">
    <div class="insert">
        <form action="" class="Form_insert" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <h1 class="title">Register student</h1>
            <p class="title"><?php echo $this->session->flashdata('message_register'); ?></p>
            <a class="btn btn-default btn-register" href="<?php echo base_url();?>home/login" title="">Back</a>
            <h3 for="">First name</h3>
            <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo set_value("first_name"); ?>">
            <?php echo form_error("first_name"); ?>
            <h3 for="">Last name</h3>
            <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo set_value("last_name"); ?>">
            <?php echo form_error("last_name"); ?>
            <h3 for="">Username</h3>
            <input type="text" name="Username" class="form-control" placeholder="Username" value="<?php echo set_value("Username"); ?>">
            <?php echo form_error("Username"); ?>
            <h3 for="">Email</h3>
            <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo set_value("email");?>">
            <?php echo form_error("email"); ?>
            <h3 for="">Password</h3>

            <input type="password" name="password" placeholder="Password" class="form-control" value="<?php echo set_value("password");?>">
            <?php echo form_error("password"); ?>
            <h3 for="">Confirm Password</h3>
            <input type="password" name="password_confirm" placeholder="Confirm password" class="form-control cf_password" value="<?php echo set_value("password_confirm");?>">
            <?php echo form_error("password_confirm"); ?>
            <input type="submit" name="submit" value="Register" class="btn btn-success btn-insert">
        </form>
    </div>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
    <script src="<?php echo base_url();?>asset/js/home/register_fail.js"></script>
</body>
</html>
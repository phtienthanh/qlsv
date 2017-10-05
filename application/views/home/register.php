<!DOCTYPE html>
<html>

<body>
    <div class="insert">
        <h1>Register student</h1>
        <h3 class="error"><?php if(isset($data_fail) && count($data_fail) > 0) { echo $data_fail; } ?></h3>
        <form action="" class="Form_insert" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <a class="btn btn-default btn-register" href="<?php echo base_url();?>home/login" title="">Back</a>
            <br>
            <h3 for="">First name</h3>
            <br>
            <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo set_value("first_name"); ?>">
            <?php echo form_error("first_name"); ?>
            <br>
            <h3 for="">Last name</h3>
            <br>
            <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo set_value("last_name"); ?>">
            <?php echo form_error("last_name"); ?>
            <br>
            <h3 for="">Email</h3>
            <br>
            <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo set_value("email");?>">
            <?php echo form_error("email"); ?>
            <br>
            <h3 for="">Password</h3>
            <br>
            <input type="password" name="password" placeholder="Password" class="form-control" value="<?php echo set_value("password");?>">
            <?php echo form_error("password"); ?>
            <br>
            <h3 for="">Confirm Password</h3>
            <br>
            <input type="password" name="password_confirm" placeholder="Confirm password" class="form-control cf_password" value="<?php echo set_value("password_confirm");?>">
            <?php echo form_error("password_confirm"); ?>
            <br>
            <input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-large btn-insert">
        </form>
    </div>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <script src="{{url(js/validate.js)}}"></script>
    <script src="<?php echo base_url();?>asset/js/home/register_fail.js"></script>
</body>

</html>
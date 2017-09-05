<?php  $data1; ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/login.css">
</head>

<body>
    <style type="text/css" media="screen">

    </style>
    </nav>
    <div class="tow-btn">
        <a class="btn btn-default btn-register" href="<?php echo base_url();?>home/register" title="">Register</a>
        <a class="btn btn-default" href="<?php echo base_url();?>home/forget" title="">Forgot password</a>
    </div>
    <form action="<?php echo base_url();?>home/login" method="POST" role="form">
        <div class="title"> Login</div>
        <p class="title">
            <?php if (isset($login_fail) && count($login_fail) > 0) {
   echo $login_fail;
} ?>
        </p>
        <div class="form-group form-gr">
            <label for="">Email</label>
            <br>
            <input type="text" class="form-control" name="email" placeholder="Input field">
            <?php echo form_error('email'); ?>
            <br>
            <br>
            <label for="">Password</label>
            <br>
            <input type="password" class="form-control" name="password" id="" placeholder="Input field">
            <?php echo form_error('password'); ?>
            <br>
            <input type="submit" name="submit" value="Login" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">
        </div>
    </form>
</body>

</html>
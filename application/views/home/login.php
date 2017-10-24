<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/login.css">
</head>
<body>
    <style type="text/css" media="screen">
    </style>
    </nav>
    <div class="tow-btn">
        <a class="btn btn-default btn-register" href="<?php echo base_url();?>home/register" title="">Register</a>
        <a class="btn btn-default" href="<?php echo base_url(); ?>home/forget" title="">Forgot password</a>
    </div>
    <form  class="Form_login" action="<?php echo base_url(); ?>home/login"  method="POST" role="form">
        
        
       
        <div class="form-group form-gr">
            <div class="title"> Login</div>
            <label for="">Email</label>
            <br>
            <input type="text" class="form-control" name="email" placeholder="Username">
            <?php echo form_error('email'); ?>
            <br>
            <br>
            <label for="">Password</label>
            <br>
            <input type="password" class="form-control" name="password" id="" placeholder="Password">
            <?php echo form_error('password'); ?>
            <br>
            <input type="submit" name="submit" value="Login" class="btn btn-success  btn_login" data-toggle="modal" data-target=".bs-example-modal-sm">
            <p ><?php echo $this->session->flashdata('message_login'); ?></p>
             <div class="error"> <?php echo $this->session->flashdata('message'); ?></div>
        </div>
    </form>
</body>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/home/login_fail.js"></script>
</html>
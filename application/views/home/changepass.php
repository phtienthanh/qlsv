<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<body>
    <h1 class="title"> Change password</h1>
    <div class="title"><?php echo $this->session->flashdata('message_update'); ?></div>

    <div class="insert">
        <form class="login wrapper"  action="" method="POST">
            <br>
            <label for="">New password</label>
            <br>
            <input type="password" class="form-control" name="new_password" placeholder="New password">
            <?php echo form_error("new_password"); ?>
            <br>
            <label for="">Confirm password</label>
            <br>
            <input type="password" class="form-control" name="new_password_confirm" placeholder="Confirm password">
            <?php echo form_error("new_password_confirm"); ?>
            <br>
            <input type="submit" class="btn btn-success" name="submit" value="change" class="color_input">
        </form>
        </p>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
   <!--  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <script src="{{url(js/validate.js)}}"></script>
    <script src="<?php echo base_url();?>asset/js/home/changepass_profile.js"></script> -->
</body>
</html>
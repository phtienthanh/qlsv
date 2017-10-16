<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<body>
    <h1 class="title"> Change password</h1>
    <div class="insert">
        <form class="login wrapper" action="" method="POST">
            <span > <a href="<?php echo base_url('home/profile/'.$id)?>" title="" class="btn btn-primary">Back</a></span>
            <br>
            <label for="">Current password</label>
            <br>
            <input type="password"  class="form-control" name="old_password" placeholder="Current password">
            <div class="fail2">
                <?php echo form_error('old_password'); ?>
            </div>
            <br>
            <label for="">New password</label>
            <br>
            <input type="password"  class="form-control" name="new_password" placeholder="New password">
            <div class="fail2">
                <?php echo form_error('new_password'); ?>
            </div>
            <br>
            <label for="">Confirm password</label>
            <br>
            <input type="password"  class="form-control" name="new_password_confirm" placeholder="Confirm password">
            <div class="fail2">
                <?php echo form_error("new_password_confirm"); ?>
            </div>
            <br>
            <input type="submit" class="btn btn-success"  name="change" value="change" class="color_input">
        </form>
        </p>
    </div>
</body>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="{{url(js/validate.js)}}"></script>
<script src="<?php echo base_url();?>asset/js/home/changepass_profile.js"></script>
</html>
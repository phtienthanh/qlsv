<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<body class="dangkiBody">
    <div class="insert">
        <form class="login wrapper Form_insert" action="" method="POST">
            <h1 class="title"> Change password</h1>
            <br>
            <span > <a href="<?php echo base_url('home/profile/'.$id)?>" title="" class="btn  btn-default btn-back widthbtn">Back</a></span>
            <br>
            <label for="">Current password</label>
            <input type="password"  class="form-control" name="old_password" placeholder="Current password">
            <div class="fail2">
                <?php echo form_error('old_password'); ?>
            </div>
            <label for="">New password</label>
            <input type="password"  class="form-control" name="new_password" placeholder="New password">
            <div class="fail2">
                <?php echo form_error('new_password'); ?>
            </div>
            <label for="">Confirm password</label>
            <input type="password"  class="form-control" name="new_password_confirm" placeholder="Confirm password">
            <div class="fail2">
                <?php echo form_error("new_password_confirm"); ?>
            </div>
            <input type="submit" class="btn btn-success widthbtn"  name="change" value="Change" class="color_input">
        </form>
        </p>
    </div>
</body>
<script src="<?php echo base_url(); ?>asset/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>asset/js/home/changepass_profile.js"></script>
</html>
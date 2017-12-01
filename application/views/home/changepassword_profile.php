<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<body class="dangkiBody">
    <div class="insert">
        <form class="login wrapper Form_insert" action="" method="POST">
            <h1 class="title">Change password</h1>
            <span><a href="<?php echo base_url('home/profile/'.$id)?>" title="" class="btn  btn-default btn-back widthbtn">Back</a></span>
            <p class="title"><?php echo $this->session->flashdata('message_update'); ?></p>
            <h3 for="">Current password</h3>
            <input type="password"  class="form-control" name="old_password" placeholder="Current password">
            <span class="fail2">
                <?php echo form_error('old_password'); ?>
            </span>
            <h3 for="">New password</h3>
            <input type="password"  class="form-control password" name="new_password" placeholder="New password">
            <span class="fail2">
                <?php echo form_error('new_password'); ?>
            </span>
            <h3 for="">Confirm password</h3>
            <input type="password"  class="form-control" name="new_password_confirm" placeholder="Confirm password">
            <span class="fail2">
                <?php echo form_error("new_password_confirm"); ?>
            </span>
            <br>
            <input type="submit" class="btn btn-success widthbtn"  name="change" value="Change" class="color_input">
        </form>
    </div>
</body>
<script src="<?php echo base_url();?>asset/js/home/changepass_profile.js"></script>
</html>
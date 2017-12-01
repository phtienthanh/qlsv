<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<body class="dangkiBody">
    <div class="insert">
        <form class="login wrapper Form_insert" action="" method="POST">
            <h1 class="title"> Change password</h1>
            <div class="title"><?php echo $this->session->flashdata('message_update'); ?></div>
            <br>
            <label for="">New password</label>
            <br>
            <input type="password" class="form-control" name="new_password" placeholder="New password">
            <span class="fail2"><?php echo form_error("new_password"); ?></span>
            <br>
            <label for="">Confirm password</label>
            <br>
            <input type="password" class="form-control" name="new_password_confirm" placeholder="Confirm password">
            <span class="fail2"><?php echo form_error("new_password_confirm"); ?></span>
            <br>
            <input type="submit" class="btn btn-success" name="submit" value="Change" class="color_input">
        </form>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
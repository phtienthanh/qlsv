<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/table.css" rel="stylesheet">
</head>
<body class="dangkiBody">
   
    <div class="insert">
        <form class="login wrapper changepassForm" action="" method="POST">
             <h1 class="title"> Change password</h1>
            <h3 class="title"><?php if (isset($changeSucces) && count($changeSucces) > 0) { echo $changeSucces; } ?></h3>
            <span> <a href="<?php echo base_url('sinhvien/show') ?>" title="" class="btn btn-primary">Back</a></span>
            <br>
            <br>
            <label for="">Current password</label>
            <br>
            <input type="password" class="form-control" name="old_password" placeholder="Current password">
            <?php echo form_error('old_password'); ?>
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
            <input type="submit" class="btn btn-success" name="Change" value="Change password" class="color_input">
        </form>
        </p>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
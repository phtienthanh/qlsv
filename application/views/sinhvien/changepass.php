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
            <span> <a href="<?php echo base_url('sinhvien/show') ?>" title="" class="btn btn-default btn-back">Back</a></span>
            <h3 for="">Current password</h3>
            <input type="password" class="form-control" name="old_password" placeholder="Current password">
            <div class="errors">
            <?php echo form_error('old_password'); ?>
            </div>
            <h3 for="">New password</h3>
            <input type="password" class="form-control" name="new_password" placeholder="New password">
            <div class="errors">
            <?php echo form_error("new_password"); ?> 
            </div>
            <h3 for="">Confirm password</h3>
            <input type="password" class="form-control" name="new_password_confirm" placeholder="Confirm password">
            <div class="errors">
            <?php echo form_error("new_password_confirm"); ?>   
            </div>
            <br>
            <input type="submit" class="btn btn-success" name="Change" value="Change password" class="color_input">
        </form>
        </p>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
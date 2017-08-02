<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Animated login form</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/table.css" rel="stylesheet">
    <style>
    /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */

  
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>

<body>
    <div class="insert">
        <form class="login wrapper" action="" method="POST">
            <input type="submit"   class="btn btn-warning" name="back" value="Back" class="color_input">
            <br>
            <label for="">Current password</label>
            <br>
            <input type="password"  class="form-control" name="old_password" placeholder="Current password">
            <?php echo form_error('old_password'); ?>
            <br>
            <label for="">New password</label>
            <br>
            <input type="password"  class="form-control" name="new_password" placeholder="New password">
            <?php echo form_error("new_password"); ?>
            <br>
            <label for="">Confirm password</label>
            <br>
            <input type="password"  class="form-control" name="new_password_confirm" placeholder="Confirm password">
            <?php echo form_error("new_password_confirm"); ?>
            <br>
            <input type="submit" class="btn btn-success"  name="change" value="change" class="color_input">
        </form>
        
        </p>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
   <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
</body>

</html>
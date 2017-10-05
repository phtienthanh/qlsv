<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<body>
    <h1 class="title"> Change password</h1>
    <h3 class="title"><?php if (isset($change_succes) && count($change_succes) > 0) { echo $change_succes; } ?></h3>
    <div class="insert">
        <form class="login wrapper" action="" method="POST">
            <span > <a href="<?php echo base_url('home/profile/'.$id)?>" title="" class="btn btn-primary">Back</a></span>
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

</body>

</html>
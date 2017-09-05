<!DOCTYPE html>
<html>

<body>
    <div class="insert">
        <h1>Forget password</h1>
        <h3 class="error"><?php
  
            if(isset($checkmail) && count($checkmail) > 0){

            echo $checkmail;

            }
         ?></h3>
        <form action="" class="Form_insert" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <a class="btn btn-default btn-register" href="<?php echo base_url();?>home/login" title="">Back</a>
            <br>
            <h3 for="">Please enter email</h3>
            <br>
            <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value(" first_name "); ?>">
            <?php echo form_error("email"); ?>
            <br>
            <input type="submit" name="submit" value="Forget" class="btn btn-primary btn-block btn-large btn-insert">
        </form>
    </div>
</body>

</html>
<!DOCTYPE html>
<html>
<body class="forgetBody">
    <div class="insert">
        <form class="form_forget" action="" class="Form_insert" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <h1 class="title">Forget password</h1>
            <h3 class="title error"><?php if (isset($checkMail) && count($checkMail) > 0) { echo $checkMail; } ?></h3>
            <p class=" title"><?php echo $this->session->flashdata('message_checkmail'); ?></p>
            <br>
            <br>
            <a class="btn btn-default btn-back" href="<?php echo base_url();?>home/login" title="">Back</a>
            <br>
            <h3 for="">Email</h3>
            <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value("first_name"); ?>">
            <br> 
            <span class="fail2"><?php echo form_error("email"); ?></span>
            <br>
            <input type="submit" name="submit" value="Send email" class="btn btn-success ">
        </form>
    </div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/home/forget_email.js"></script>
</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/table.css">
</head>

<body>
    <div class="insert">
        <h1>Forget password</h1>
        <form action="" class="Form_insert" method="post" accept-charset="utf-8" enctype="multipart/form-data">
           <a class="btn btn-default btn-register" href="<?php echo base_url();?>home/login" title="">Back</a>
            <br>
            <h3 for="">Please enter email</h3>
            <br>
            <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value(" first_name "); ?>">
            <?php echo form_error("email"); ?> 
            <br>
            <?php echo $this->data; ?>
            
            <input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-large btn-insert">
        </form>
    </div>

    <script src="<?php echo base_url();?>asset/js/index.js"></script>
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
</body>

</html>
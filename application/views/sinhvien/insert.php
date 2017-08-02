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
        <h1>Add new student</h1>
        <form action="" class="Form_insert" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <input type="submit" name="back" value="Back" class="btn btn-danger btn-block  btn-insert">
            <br>
            <h3 for="">First name</h3>
            <br>
            <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo set_value(" first_name "); ?>">
            <?php echo form_error("first_name"); ?>
            <br>
            <h3 for="">Last name</h3>
            <br>
            <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo set_value(" last_name "); ?>">
            <?php echo form_error("last_name"); ?>
            <br>
            <h3 for="">Email</h3>
            <br>
            <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo set_value(" email ");?>">
            <?php echo form_error("email"); ?>
            <br>
            <h3 for="">Password</h3>
            <br>
            <input type="password" name="password" placeholder="Password" class="form-control" value="<?php echo set_value(" password ");?>">
            <?php echo form_error("password"); ?>
            <br>
            <h3 for="">Confirm Password</h3>
            <br>
            <input type="password" name="confirm_password" placeholder="Confirm password" class="form-control" value="<?php echo set_value(" confirm_password ");?>">
            <?php echo form_error("confirm_password"); ?>
            <br>
            <h3 for="">Avatar</h3>
            <?php echo $error;?>
            <br>
            <input type="file" name="userfile">
            <br>
            <label for="">Role</label>
            <br>
            <select name="role" class="form-control">
                <option>Admin</option>
                <option>User</option>
            </select>
            <?php echo form_error("role"); ?>
            <br>
            <input type="submit" name="submit" value="Insert" class="btn btn-primary btn-block btn-large btn-insert">
        </form>
    </div>

    <script src="<?php echo base_url();?>asset/js/index.js"></script>
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
</body>

</html>
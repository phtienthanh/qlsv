<!DOCTYPE html>
<html>

<body>
    <div class="insert">
        <h1>Add new student</h1>
        <h3><?php if (isset($error) && count($error) > 0 ) {
            echo $error;
        } ?></h3>
        <h3><?php if (isset($succes) && count($succes) > 0 ) {
            echo $succes;
        } ?></h3>
        <form action="" name="myForm" class="Form_insert" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <span><a class="btn btn-success" href="<?php echo base_url();?>sinhvien/show" title="">Back</a></span>
            <br>
            <h3 for="">First name</h3>
            <br>
            <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo set_value("first_name"); ?>">
            <?php echo form_error("first_name"); ?>
            <span id="eror_first_name"> </span>
            <br>
            <h3 for="">Last name</h3>
            <br>
            <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo set_value("last_name"); ?>">
            <?php echo form_error("last_name"); ?>
            <br>
            <h3 for="">Email</h3>
            <br>
            <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo set_value("email");?>">
            <?php echo form_error("email"); ?>
            <br>
            <h3 for="">Password</h3>
            <br>
            <input type="password" name="password" placeholder="Password" class="form-control" value="<?php echo set_value("password");?>">
            <?php echo form_error("password"); ?>
            <span id="eror_password"> </span>
            <br>
            <h3 for="">Confirm Password</h3>
            <br>
            <input type="password" name="confirm_password" placeholder="Confirm password" class="form-control" value="<?php echo set_value("confirm_password");?>">
            <?php echo form_error("confirm_password"); ?>
            <span id="eror_cfpassword"> </span>
            <br>
            <h3 for="">Avatar</h3>
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
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <script src="{{url(js/validate.js)}}"></script>
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>asset/js/student/add_fail_student.js"></script>
</body>

</html>
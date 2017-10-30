<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Animated login form</title>
</head>
<body class="dangkiBody">
    <div class="insert">
        <form class="Form_insert" action="" method="POST">
            <div><a class=" btn  btn-default btn-back" href="<?php echo base_url('categories/home')?>">Back</a> </div>
            <br>
            <label for="">Name</label>
            <br>
            <input type="text" class="form-control form-control-line" name="input_text" value="<?php
                if(isset($student['name']) && count($student['name']) > 0) {echo $student['name'];} ?>">
            <?php echo form_error("input_text"); ?>
            <br>
            <input type="submit" class="btn btn-success" name="change" value="Change" class="color_input">
        </form>
        </p>
    </div>
</body>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script src="<?php echo base_url();?>asset/js/categories/update_fail_categories.js"></script>
</html>
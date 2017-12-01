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
                if(isset($categories['name']) && count($categories['name']) > 0) { echo $categories['name']; } ?>">
                <span class="error"><?php echo form_error("input_text"); ?> </span>
            <br>
            <input type="submit" class="btn btn-success" name="change" value="Change" class="color_input">
        </form>
        </p>
    </div>
</body>
<script src="<?php echo base_url();?>asset/js/categories/update_fail_categories.js"></script>
</html>
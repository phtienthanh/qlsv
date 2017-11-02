<!DOCTYPE html>
<html>
<body class="dangkiBody">
    <div class="insert">
        <form class="wrapper Form_insert " action="" name="myForm" method="post" accept-charset="utf-8" id="dataTable">
            <h1 class="title">Add categories</h1>
            <div> <a href="<?php echo base_url('categories/home') ?>" title="" class="btn  btn-default btn-back back">Back</a></div>
            <br>
            <label for="">Name</label>
            <br> 
            <input type="text" class="form-control form-control-line" name="input_text" class="input_text">
            <br>
            <input type="submit" name="submit" value="Add new categories" class="btn btn-success add-cate ">
            <br>
            <span class="errors"><?php echo form_error("input_text"); ?></span>
            <span id="eror_cfpassword"></span>
        </form>
    </div>
</body>
<script src="<?php echo base_url();?>asset/js/categories/add_fail_categories.js"></script>
</html>
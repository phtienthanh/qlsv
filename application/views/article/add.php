<!DOCTYPE html>
<html>

<body>
    <div class="insert">
        <h1>Add new article</h1>
        <h4><?php if (isset($slug) && count($slug) > 0) {
            echo  $slug;
        } ?></h4>
         <h4><?php if (isset($success) && count($success) > 0) {
            echo  $success;
        } ?></h4>
        <h4><?php if (isset($error['error']) && count($error['error']) > 0) {
            echo  $error['error'];
        } ?></h4>

        
        <form class="Form_insert" name="myForm" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
           
            <br>
            <h3 for="">Title</h3>
            <br>
            <input type="text" class="form-control form-control-line title" name="title" placeholder="Title" value="<?php echo set_value(" first_name "); ?>">
            <?php echo form_error("title"); ?>
            
            <br>
            <h3 for="">Content</h3>
            <br>
            <textarea rows="4" class="form-control form-control-line content" name="content" cols="35"></textarea>
            <?php echo form_error("content"); ?>
            
            <br>
            <br>
            <h3 for="">Avatar</h3>
            <br>
            <input type="file"  name="userfile" class="avatar">
            <br>
            <h3 for="">Author</h3>
            <br>
            <input type="text" class="form-control form-control-line author" name="author" placeholder="Author" value="<?php echo set_value(" author "); ?>">
            <?php echo form_error("author"); ?>
            
            <br>
            <h3 for="">Categories</h3>
            <select name="categories" class="form-control form-control-line cate categories">

                <?php 
                
 		if(isset($categories) && count($categories)) {

    	foreach ($categories as $key => $val) {

            if ($val['is_delete'] == 0) {
              
             ?>
                <option value="<?php echo $val['id']; ?>">
                    <?php echo $val['name']; ?>
                </option>
                <?php       

                    }  
                }

            }
            ?>
            </select>
            <?php echo form_error("categories"); ?>

          
            <br>
            <br>
            <input type="submit" name="submit" value="insert" class="btn btn-primary btn-block btn-large btn-insert ">

            
        </form>
        
        
    </div>
    
</body>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="{{url(js/validate.js)}}"></script>
<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>asset/js/article/add_fail_article.js"></script>
</html>
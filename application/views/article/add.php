<!DOCTYPE html>
<html>
<body class="arBody">
    <div class="insert">
        <form class="Form_insert" name="myForm" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <span class=""> <a href="<?php echo base_url('article/home')  ?>" title="" class="btn btn-primary ">Back</a></span>
            <h1 class="title">Add new article</h1>
            <h4> <?php if (isset($slug) && count($slug) > 0) { echo $slug; } ?></h4>
            <h4><?php if (isset($error['error']) && count($error['error']) > 0) { echo $error['error']; } ?></h4>
            <h3 for="">Title</h3>
            <input type="text" class="form-control form-control-line" name="title" placeholder="Title" value="<?php echo set_value("first_name"); ?>">
            <?php echo form_error("title"); ?>
            <h3 for="">Content</h3>
            <textarea rows="4" class="form-control form-control-line content" name="content" cols="35"></textarea>
            <?php echo form_error("content"); ?>
            <h3 for="">Avatar <label class="img_bb">*(Bắt buộc chọn ảnh)</label></h3>
            <input type="file" name="userfile" class="avatar hinden">
            <p class="btn btn-primary btn_select">Select image</p>
            <?php echo form_error("userfile"); ?>
            <h3 for="">Author</h3>
            <!-- <input type="text" class="form-control form-control-line author" name="author" placeholder="Author" value="<?php echo set_value("author"); ?>"> -->
            <select name="author" class="form-control form-control-line cate categories">
                <?php 
                    if (isset($authorSv) && count($authorSv) > 0) {

                        foreach ($authorSv as $keyAuthorSv => $valAuthorSv) { 
                    
                            if ($valAuthorSv['first_name'] != "" || $valAuthorSv['last_name'] != "") { ?>
                    
                            <option value="<?php echo $valAuthorSv['first_name'].$valAuthorSv['last_name']; ?>">
                                <?php echo $valAuthorSv['first_name'].$valAuthorSv['last_name']; ?>
                            </option>
                <?php
                            }  else {
                            
                            ?>
                                <option value="<?php echo $valAuthorSv['first_name'].$valAuthorSv['last_name']; ?>">
                                    <?php echo $valAuthorSv['username']; ?>
                                </option>
                            <?php
                            }
                    
                        }
                    
                    }

                ?>

            </select>
            <?php echo form_error("author"); ?>
            <h3 for="">Categories</h3>
            <select name="categories" class="form-control form-control-line cate categories">
      
                <?php 
                    if (isset($categories) && count($categories) > 0) {

                        foreach ($categories as $keyCategories => $valCategories) { 
                    
                            if ($valCategories['is_deleted'] == 0) { ?>
                    
                            <option value="<?php echo $valCategories['id']; ?>">
                                
                                <?php echo $valCategories['name']; ?>

                            </option>
                <?php
                    
                            }
                    
                        }
                    
                    }

                ?>

            </select>
            <?php echo form_error("categories"); ?>
            <input type="submit" name="submit" value="Insert" class="btn btn-success btn-insert">
        </form>
    </div>
</body>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>asset/js/article/add_fail_article.js"></script>
</html>
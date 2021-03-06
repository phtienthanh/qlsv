<!DOCTYPE html>
<html>

<body class="arBody">
    <div class="insert">
        <form class="Form_insert" name="myForm" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <span class=""> <a href="<?php echo base_url('article/home')  ?>" title="" class="btn  btn-default btn-back">Back</a></span>
            <h1 class="title">Add new article</h1>
            <h4 class=" title fail2"> <?php if (isset($slug) && count($slug) > 0) { echo $slug; } ?></h4>

            <?php echo $this->session->flashdata('message_add'); ?>

            <h3 for="">Title</h3>
            <input type="text" class="form-control form-control-line" name="title" placeholder="Title" value="<?php echo set_value("first_name");?>">
            <span class="fail2"><?php echo form_error("title"); ?></span>
            <h3 for="">Content</h3>
            <textarea rows="4" class="form-control form-control-line content" name="content" cols="35"></textarea>
            <h3 for="">Avatar <label class="img_bb">*(Compulsory photo selection)</label></h3>
            <input type="file" name="userfile" class="custom-file-input">
            <?php echo form_error("userfile"); ?>
            <span class="fail2"><?php echo form_error("userfile"); ?></span>
            <h3 for="">Author</h3>
            <select name="author" class="form-control form-control-line cate categories">

                <?php

                    if (isset($authorSv) && count($authorSv) > 0) {

                        foreach ($authorSv as $keyAuthorSv => $valAuthorSv) { 
                    
                            if ($valAuthorSv['first_name'] != "" || $valAuthorSv['last_name'] != "") { ?>
                            
                                <option value="<?php echo $valAuthorSv['first_name'].$valAuthorSv['last_name']; ?>"<?php if ($name == $valAuthorSv['first_name'].$valAuthorSv['last_name']) { echo "selected"; }?>>

                                    <?php echo $valAuthorSv['first_name']." ".$valAuthorSv['last_name']; ?>

                                </option>

                             <?php } else { ?>

                                <option value="<?php echo $valAuthorSv['username']; ?>" <?php if ($username == $valAuthorSv['username']) { echo "selected"; } ?>>

                                    <?php echo $valAuthorSv['username']; ?>
                                
                                </option>

                            <?php
                            
                            }
                    
                        }
                    
                    }

                ?>

            </select>
            <span class="fail2"><?php echo form_error("author"); ?></span>
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
            <div>
                <input type="submit" name="submit" value="Insert" class="btn btn-success btn-insert">
            </div>
        </form>
    </div>
</body>
<script src="<?php echo base_url();?>asset/js/article/add_fail_article.js"></script>

</html>
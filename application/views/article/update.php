<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body class="fix-header card-no-border dangkiBody">
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid page-wrapper">
                <div class="row page-titles">
                    <div class="title">
                        <h1 class="colorMana"> Update article</h3>
                        <p class="title colorMana"><?php echo $this->session->flashdata('message_upload'); ?></p>
                        <?php echo $this->session->flashdata('message_add'); ?>
                    </div>
                    <div class="mark-air">
                        <a href="<?php echo base_url();?>article/home" class="btn hidden-sm-down btn-default btn-back widthbtn"> Back</a>
                    </div>
                </div>
                <div class="row row_ud">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="">
                                <form action="<?php echo base_url();?>article/upload/<?php echo $get_article["id"]; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                    <center class="m-t-30"> <img class="img_article" src="<?php echo base_url();?>medias/article/<?php echo $get_article["image"]; ?>" width="150" />
                                        <br>
                                        <input type="file" name="userfile"  class="custom-file-input">
                                        <br>
                                        <input type="text" class="hinden" name="img_name" value="<?php echo $get_article["image"]; ?>">
                                        <input type="submit" name="submit" value="Upload" class="btn btn-success">
                                </form>
                                <h4 class="card-title m-t-10"><?php echo $get_article["title"]; ?></h4>
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <form action="" name="myForm" method="post" class="form-horizontal form-material form_update" enctype="multipart/form-data">
                                    <div class="form-group btn-gre">
                                        <h3 class="col-md-12">Title</h3>
                                        <div class="col-md-12 cols">
                                            <input type="text" name="title" placeholder="Title" class="form-control form-control-line" value="<?php echo $get_article["title"]; ?>">
                                        </div>
                                        <span class="fail2"><?php echo form_error("title"); ?></span>
                                    </div>
                                    <div class="form-group btn-gre">
                                        <h3 class="col-md-12">Slug</h3>
                                        <div class="col-md-12 cols">
                                            <input type="text" name="slug" placeholder="Slug" class="form-control form-control-line" value="<?php echo substr($get_article["slug"], 0, -5); ?>">
                                        </div>
                                        <span class="fail2"><?php echo form_error("slug"); ?></span>
                                    </div>
                                    <div class="form-group btn-gre">
                                        <h3 class="col-md-12">Author</h3>
                                        <div class="col-md-12 cols">
                                            <select name="author" class="form-control form-control-line cate categories">
                                                
                                                <?php 
                                                
                                                    if (isset($authorSv) && count($authorSv) > 0) {

                                                        foreach ($authorSv as $keyAuthorSv => $valAuthorSv) { 
                                                    
                                                            if ($valAuthorSv['first_name'] != "" || $valAuthorSv['last_name'] != "") {

                                                            ?>

                                                                <option value="<?php echo $valAuthorSv['first_name'].$valAuthorSv['last_name']; ?>" 

                                                                    <?php

                                                                        if ($get_article["author"] == $valAuthorSv['first_name'].$valAuthorSv['last_name']) {

                                                                            echo "selected"; 

                                                                        }

                                                                    ?>>

                                                                    <?php echo $valAuthorSv['first_name']." ".$valAuthorSv['last_name']; ?>

                                                                </option>

                                                            <?php } else { ?>

                                                                <option value="<?php echo  $valAuthorSv['username']; ?>"

                                                                <?php if ($get_article["author"] == $valAuthorSv['username']) {
                                                                
                                                                   echo "selected";
                                                                
                                                                } ?>>
                                                                
                                                                    <?php echo $valAuthorSv['username']; ?>

                                                                </option>
                                                            
                                                            <?php
                                                            
                                                            }
                                                    
                                                        }
                                                    
                                                    }

                                                ?>

                                            </select>
                                        </div>
                                        <span class="fail2"><?php echo form_error("author"); ?></span>
                                    </div>
                                    <div class="form-group btn-gre">
                                        <h3 for="example-email" class="col-md-12">Content</h3>
                                        <div class="col-md-12 cols">
                                            <textarea rows="4" cols="85" class="form-control form-control-line" name="content"><?php echo $get_article["content"]; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group btn-gre">
                                        <h3 class="col-md-12">Categories</h3>
                                        <div class="col-md-12 cols">
                                            <select name="categories" class="form-control form-control-line cate">
                                                
                                                <?php  

                                                if (isset($category_all) && count($category_all) > 0) { 

                                                    foreach ($category_all as $keyCategory_all => $valCategory_all) { 

                                                        if ($valCategory_all['is_deleted'] == 0) { 

                                                ?>

                                                    <option value="<?php echo $valCategory_all['id']; ?>" <?php if ($get_article["categories"] == $valCategory_all['id']) { echo "selected"; } ?>> <?php echo $valCategory_all['name']; ?>
                                                        
                                                    </option>

                                                <?php
                                                
                                                        }
                                                
                                                    }

                                                } 

                                                ?>

                                            </select>   
                                        </div>
                                    </div>
                                    <div class="form-group btn-gre">
                                        <div class="col-sm-12 btn-form">
                                            <input type="submit" name="submit" class="btn btn-success update-btn widthbtn" value="Update">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url();?>asset/js/article/update_fail.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body class="fix-header card-no-border">
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid page-wrapper">
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0"> Update article</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Article</a></li>
                            <li class="breadcrumb-item active">Update</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <a href="<?php echo base_url();?>article/home" class="btn pull-right hidden-sm-down btn-warning float_r"> Back</a>
                    </div>
                </div>
                <div class="row row_ud">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="">
                                <form action="<?php echo base_url();?>article/upload/<?php echo  $student[" id "]; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                    <center class="m-t-30"> <img class="img_article" src="<?php echo base_url();?>medias/article/<?php echo $student[" image "]; ?>" width="150" />
                                        <input type="file" name="userfile" class="userfile hinden">
                                        <p class="btn btn-primary btn_select ">Select image</p>
                                        <input type="text" class="hinden" name="img_name" value="<?php echo $student[" image "]; ?>">
                                        <input type="submit" name="submit" value="upload" class="btn btn-success">
                                </form>
                                <h4 class="card-title m-t-10"><?php echo  $student["title"]; ?></h4>
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
                                    <div class="form-group">
                                        <label class="col-md-12">Title</label>
                                        <div class="col-md-12">
                                            <input type="text" name="title" placeholder="Title" class="form-control form-control-line" value="<?php echo $student[" title "]; ?>">
                                        </div>
                                        <?php echo form_error("title"); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Slug</label>
                                        <div class="col-md-12">
                                            <input type="text" name="slug" placeholder="Slug" class="form-control form-control-line" value="<?php echo substr($student[" slug "],0,-5); ?>">
                                        </div>
                                        <?php echo form_error("slug"); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Author</label>
                                        <div class="col-md-12">
                                            <input type="text" name="author" placeholder="Author" class="form-control form-control-line" value="<?php echo $student[" author "]; ?>">
                                        </div>
                                        <?php echo form_error("author"); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Content</label>
                                        <div class="col-md-12">
                                            <textarea rows="4" cols="85" class="form-control form-control-line" name="content">
                                                <?php echo $student["content"];?>
                                            </textarea>
                                        </div>
                                        <?php echo form_error("content"); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Categories</label>
                                        <div class="col-md-12">
                                            <select name="categories" class="form-control form-control-line cate">
                                                
                                                <?php  if(isset($categoriess) && count($categoriess) > 0) { ?>

                                                    <?php foreach ($categoriess as $key => $val) { ?>

                                                        <?php if ( $val['is_deleted'] == 0) { ?>

                                                            <option value="<?php echo $val['id']; ?>" <?php if ($student[ "categories"] == $val[ 'id'] ) { 

                                                                echo "selected";
                                                                
                                                                } ?> > <?php echo $val['name']; ?>
                                                            </option>

                                                        <?php } ?>

                                                    <?php } ?>

                                                <?php } ?>
                                             
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 btn-form">
                                            <input type="submit" name="submit" class="btn btn-warning update-btn" value="Update">
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
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <script src="{{url(js/validate.js)}}"></script>
    <script src="<?php echo base_url();?>asset/js/article/update_fail.js"></script>
</body>

</html>
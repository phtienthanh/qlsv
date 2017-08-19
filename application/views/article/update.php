<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <link href="<?php echo base_url();?>asset/css/article/blue.css" id="theme" rel="stylesheet">   
     <link rel="stylesheet" href="<?php echo base_url();?>asset/css/table.css" rel="stylesheet">
</head>


<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
 
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!--  -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0"> Update article</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>

                    <div class="col-md-6 col-4 align-self-center">
                     <a href="<?php echo base_url();?>article/home" class="btn pull-right hidden-sm-down btn-warning float_r"> Back</a>

                       
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row row_ud">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <form action="<?php echo base_url();?>article/upload/<?php echo  $student["id"]; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                    <center class="m-t-30"> <img src="<?php echo base_url();?>asset/images/article/<?php echo $student["image"]; ?>"  width="150" />
                                        <input type="file" name="userfile" class="btn">
                                        <input type="text" class="hinden" name="img_name" value="<?php echo $student["image"]; ?>">
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
                                <form action="" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-12">Title</label>
                                        <div class="col-md-12">
                                            <input type="text" name="title" placeholder="Title" class="form-control form-control-line" value="<?php echo $student["title"]; ?>">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12">Slug</label>
                                        <div class="col-md-12">
                                            <input type="text"  name="slug" placeholder="Slug" class="form-control form-control-line" value="<?php echo substr($student["slug"],0,-5); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Author</label>
                                        <div class="col-md-12">
                                            <input type="text" name="author" placeholder="Author" class="form-control form-control-line" value="<?php echo $student["author"]; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Content</label>
                                        <div class="col-md-12">
                                            <textarea rows="4"  cols="85"  class="form-control form-control-line" name="content" > <?php echo  $student["content"]; ?></textarea>
                                        </div>
                                    </div>
                                    <!--  <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="password" value="<?php echo $password; ?>" class="form-control form-control-line">
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-md-12">Categories</label>
                                        <div class="col-md-12">
                                            <select name="categories" class="form-control form-control-line cate" >

                                            <option value="1" selected>
                                               --- Select categories ---
                                            </option>

                                            <?php 
                                                    
                                            if(isset($categoriess) && count($categoriess)) {

                                                foreach ($categoriess as $key => $val) {

                                                    if ( $val['delete_is'] == 0) {

                                                    ?>

                                                        <option value="<?php echo $val['id']; ?>"  <?php if ($student["categories"] == $val['id'] ) {

                                                            echo "selected";
                                                            
                                                            } 
                                                        ?>>
                                                        
                                                         <?php echo $val['name']; ?>

                                                        </option>

                                                        <?php  

                                                    }
                                                }

                                            }
                                            ?>

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
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>asset/profile/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url();?>asset/profile//plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
</body>

</html>
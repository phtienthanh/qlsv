<!DOCTYPE html>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid page-wrapper">
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Preview</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <a href="<?php echo base_url();?>home" class="btn pull-right hidden-sm-down btn-success"> Home</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xlg-9 col-md-7 ">
                        <div class="card">
                            <div class="card-block ">
                                <form action="<?php echo base_url();?>article/home" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-3"><b>Author :</b></label>
                                        <div class="col-md-3">
                                            <p>
                                                <?php echo $student["author"]; ?>
                                            </p>
                                        </div>
                                        <label class="col-md-3"><b>Categories :</b></label>
                                        <div class="col-md-3">
                                            <p>
                                                <?php echo $newArray[$student['categories']] ?> </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p>
                                            <?php echo nl2br( $student["content"], false); ?>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 btn-form">
                                            <input type="submit" name="submit" class="btn btn-success" value="Back">
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
</body>

</html>
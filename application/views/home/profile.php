<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body class="fix-header card-no-border body-profile">
    <h1 class="title">Manage profile</h1>

    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid container-f">
                <div class="row row_av">
                    
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            
                                <form action="<?php echo base_url();?>home/upload/<?php echo  $student["id"]; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="upload_img_p">
                                    Upload image

                                    <p><?php echo $this->session->flashdata('message_upload'); ?></p>
                                </div>
                                    <center class="m-t-30"> <img src="<?php echo base_url();?>medias/student/<?php echo $student["avatar"]; ?>" width="150" />
                                        <input type="file" name="userfile" class="btn">
                                        <input type="text" class="hinden" name="img_name" value="<?php echo $student["avatar"]; ?>">
                                        <input type="submit" name="submit" value="upload" class="btn btn-success">
                                </form>
                                <h4 class="card-title m-t-10"><?php echo  $student["last_name"]; ?></h4>
                                </center>
                            
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7 Content-right">
                        <div class="card">
                         <div class="upload_img_p">
                                    User information
                                    <p><?php echo $this->session->flashdata('message_profile'); ?></p>
                                </div>
                            <div class="card-block">

                                <form action="" method="post" class="form-horizontal form-material">
                                    <div class="form-group">
                                        <label class="col-md-12">First Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="first_name" placeholder="First name" class="form-control form-control-line" value="<?php echo $student["first_name"]; ?>">
                                            <?php echo form_error("first_name"); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Last Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="last_name" placeholder="Last name" class="form-control form-control-line" value="<?php echo $student["last_name"]; ?>">
                                            <?php echo form_error("last_name"); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" readonly="value" name="email" class="form-control form-control-line" name="example-email" id="example-email" value="<?php echo  $student["email"]; ?>">
                                            <?php echo form_error("email"); ?>
                                        </div>
                                    </div>
                                    <div class="form-group form-g">
                                        <label class="col-md-12 col-role">Role</label>
                                        <input type="text" name="role" readonly="value" class="form-control form-control-line" value="<?php echo $newArray[$student['id']] ?>">
                                        <?php echo form_error("role"); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 btn-form">
                                            <input type="submit" name="submit" class="btn btn-success" value="Update">
                                        </div>
                                        <div class="col-sm-3 btn-form">
                                            <span><a class="btn btn-success" href="<?php echo base_url();?>home/changepass_profile/<?php echo $student["id"];?>" title=""> Change password</a></span>
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
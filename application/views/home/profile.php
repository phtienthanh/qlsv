<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body class="fix-header card-no-border body-profile">
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid container-f">
                <h1 class="title">Manage profile</h1>
                <div class="title">
                    <p class="title"><?php echo $this->session->flashdata('message_update'); ?></p>
                    <p><?php echo $this->session->flashdata('message_upload'); ?></p>
                    <p><?php echo $this->session->flashdata('message_profile'); ?></p>
                </div>
                <div class="row row_av">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <form action="<?php echo base_url();?>home/upload/<?php echo $student["id"]; ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="upload_img_p">
                                    Upload image
                                </div>
                                <center class="m-t-30"> <img src="<?php echo base_url(); ?>medias/student/<?php echo $student["avatar"]; ?>" width="150" />
                                    <div>
                                    <br>
                                   <input type="file" name="userfile"  class="custom-file-input">
                                   <br>
                                    <!-- <p class=" ">Select image</p> -->
                                    <input type="text" class="hinden" name="img_name" value="<?php echo $student["avatar"]; ?>">
                                    <input type="submit" name="submit" value="Upload" class="btn btn-success">
                                    </div>

                                    <h4 class="card-title m-t-10">

                                        <?php if ($student['last_name'] == "" && $student['first_name'] == "") {

                                            echo $student["username"];

                                        } else {

                                            echo  $student['first_name']." ".$student['last_name'];

                                        }?>

                                    </h4>
                                </center>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7 Content-right">
                        <div class="card">
                            <div class="upload_img_p">
                                User information
                            </div>
                            <div class="card-block">
                                <form class="form_profile" method="post" class="form-horizontal form-material">
                                    <div class="form-group btn-gre">
                                        <h3 class="col-md-12">First Name</h3>
                                        <div class="col-md-12">
                                            <input type="text" name="first_name" placeholder="First name" class="form-control form-control-line" value="<?php if (isset($student['first_name']) && count($student['first_name']) > 0) { echo $student["first_name"]; }?>">
                                            <span class="errors"><?php echo form_error("first_name"); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group btn-gre">
                                        <h3 class="col-md-12">Last Name</h3>
                                        <div class="col-md-12">
                                            <input type="text" name="last_name" placeholder="Last name" class="form-control form-control-line" value="<?php if (isset($student['last_name']) && count($student['last_name']) > 0) { echo $student["last_name"]; } ?>">
                                            <span class="errors"><?php echo form_error("last_name"); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group btn-gre">
                                        <h3 class="col-md-12">Username</h3>
                                        <div class="col-md-12">
                                            <input type="text"  name="username" placeholder="Username" class="form-control form-control-line" value="<?php if (isset($student['username']) && count($student['username']) > 0) { echo $student["username"]; } ?>">
                                            <span class="errors"><?php echo form_error("username"); ?></span>
                                        </div>
                                    </div>
                                    <div class="form-group btn-gre">
                                        <h3 for="example-email" class="col-md-12">Email</h3>
                                        <div class="col-md-12">
                                            <input type="email" readonly="value" name="email" class="form-control form-control-line" name="example-email" id="example-email" value="<?php echo  $student["email"]; ?>">
                                            <?php echo form_error("email"); ?>
                                        </div>
                                    </div>
                                    <div class="form-group btn-gre form-g">
                                        <h3 class="col-md-12 col-role">Role</h3>
                                            <br>

                                            <?php if (isset($role) && count($role) > 0) { ?>

                                                <?php foreach ($role as $keyRole => $valRoler) { ?>

                                                    <div class="role_tr">
                                                        <tr selected><input class="checkbox_role" name='<?php echo $valRoler['id']; ?>' type='checkbox' value='<?php echo $valRoler['id']; ?>'

                                                        <?php
                                                        
                                                            if (in_array($valRoler['name'], $getUserGroups) == true) {
                                                                
                                                                echo "checked"; 

                                                            }

                                                        ?> disabled/> <?php echo $valRoler['name']; ?></tr>
                                                    </div>
                                                    
                                                <?php } ?>
                                            
                                            <?php } ?>  
                                        
                                            <?php echo form_error("role"); ?>
                                    </div>
                                    <div class="form-group btn-gre">
                                        <div class="col-sm-6 btn-form">
                                            <input type="submit" name="submit" class="btn btn-success" value="Update">
                                        </div>
                                        <div class="col-sm-3 btn-form">
                                            <span><a class="btn btn-success" href="<?php echo base_url(); ?>home/changepass_profile/<?php echo $student["id"];?>" title=""> Change password</a></span>
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
    <script src="<?php echo base_url(); ?>asset/js/home/profile_fail.js"></script>
</html>
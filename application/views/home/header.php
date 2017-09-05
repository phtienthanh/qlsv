<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="favicon.ico" rel="shortcut icon">
    <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/header.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/table.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>home">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a class="manage_student" href="<?php echo base_url();?>sinhvien/show">Manage student</a></li>
                    <li><a class="manage_student" href="<?php echo base_url();?>article/home">Manage article</a></li>
                    <li><a class="" href="<?php echo base_url();?>home/show_article">Show article</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="manage_login1" href="<?php echo base_url();?>home/login">Login</a></li>
                    <li class="dropdown manage_logout">
                        <a href="#" class="dropdown-toggle fa fa-user " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
                        <ul class="dropdown-menu menu-header">
                            <li class="manage_logout"><a class="manage_logout" href="<?php echo base_url();?>home/profile/<?php echo $id; ?>"> Manage profile </a></li>
                            <li class="manage_logout"><a href="<?php echo base_url();?>home/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <?php

    if($this->ion_auth->logged_in() == false) {
    ?>
        <script type="text/javascript">
        $('.manage_logout').hide();

        $('.manage_student').hide();

        $('.manage_login1').show();
        </script>
        <?php

    } else  if($this->ion_auth->logged_in() == true) {

    ?>
            <?php
    
        if(($role) == 'Admin') {

    ?>
    
        <script type="text/javascript">
        $('.manage_student').show();
        </script>
        <?php
   
        } else  if(($role) == 'User') {
   
    ?>
        <script type="text/javascript">
        $('.manage_student').hide();
        </script>
        <?php

        }

        ?>

        <script type="text/javascript">
        $('.manage_login1').hide();

        $('.manage_logout').show();
        </script>
        <?php

    }
    ?>
</body>
<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
</html>
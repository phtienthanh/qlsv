<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link href="favicon.ico" rel="shortcut icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap.css" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/nexus.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/custom.css" rel="stylesheet">
    <!-- Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Raleway:100,300,400" type="text/css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <style type="text/css" media="screen">
    .navbar-default {
        margin: 0px !important;
    }

    a {
        font-weight: bold;
    }

    .container-fluid {
        margin: 0 !important;
    }

    .menu-header {
        background-color: #fff !important;
    }
    </style>
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
                <a class="navbar-brand" href="<?php echo base_url();?>index.php/home">Home</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a class="manage_student" href="<?php echo base_url();?>index.php/sinhvien/show">Manage student</a></li>
                    <li><a class="manage_student" href="<?php echo base_url();?>index.php/article/home">Manage article</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="manage_login1" href="<?php echo base_url();?>index.php/home/login">Login</a></li>
                    <li class="dropdown manage_logout">
                        <a href="#" class="dropdown-toggle fa-user " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
                        <ul class="dropdown-menu menu-header">
                            <li class="manage_logout"><a class="manage_logout" href="<?php echo base_url();?>index.php/home/profile/<?php echo $id; ?>"> Manage profile </a></li>
                            <li class="manage_logout"><a href="<?php echo base_url();?>index.php/home/logout">Logout</a></li>
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

</html>
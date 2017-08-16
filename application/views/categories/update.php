<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Animated login form</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/table.css" rel="stylesheet">
</head>

<body>
    <div class="insert">
        <form class="wrapper" action="" method="POST">
            <div ><a  class=" btn btn-warning"  href="<?php echo base_url('categories/home')?>">Back</a> </div>
            <br>
            <label for="">Name</label>
            <br>
            <input type="text" class="form-control form-control-line" name="input_text" value="<?php echo $student['name'];  ?>">
            <?php echo form_error("name"); ?>
            <br>
            <input type="submit" class="btn btn-success"  name="change" value="change" class="color_input">
        </form>
        
        </p>
    </div>
  
</body>
<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>

</html>
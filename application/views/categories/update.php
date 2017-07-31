<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Animated login form</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
     <link rel="stylesheet" href="<?php echo base_url();?>asset/css/categories/changepass.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <form class="login" action="" method="POST">
            <input type="submit" name="back" value="Back" class="color_input">
            <br>
            <label for="">Name</label>
            <br>
            <input type="text" name="name" value="<?php echo $student['name'];  ?>">
            <?php echo form_error("name"); ?>
            <br>
            <input type="submit" name="change" value="change" class="color_input">
        </form>
        <footer><a target="blank" href="http://boudra.me/">boudra.me</a></footer>
        </p>
    </div>
  
</body>

</html>
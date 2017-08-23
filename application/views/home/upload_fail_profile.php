<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/table.css">
</head>

<body class="title">
        <h1 >Upload fail</h1>
<?php var_dump($id); ?>
        <h3 >Please click on the button to upload again</h3>

         <span> <a class="btn btn-default btn-register" href="<?php echo base_url();?>home/profile/<?php echo $id; ?>" title="">Upload again</a></span>

    <script src="<?php echo base_url();?>asset/js/index.js"></script>
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
</body>

</html>
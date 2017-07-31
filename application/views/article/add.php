<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/article/add.css" rel="stylesheet">
</head>

<body>
    <div class="login">
        <h1>Add new article</h1>
        <form action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <input type="submit" name="back" value="Back" class="btn btn-primary btn-block btn-large">
            <br>
            <h3 for="">Title</h3>
            <br>
            <input type="text" name="title" placeholder="Title" value="<?php echo set_value(" first_name "); ?>">
            <?php echo form_error("title"); ?>
            <br>
            <h3 for="">Content</h3>
            <br>
            <textarea rows="4" name="content" cols="35">
            </textarea>
            <?php echo form_error("content"); ?>
            <br>
            <br>
            <h3 for="">Avatar</h3>
            <br>
            <input type="file" name="userfile">
            <br>
            <h3 for="">Author</h3>
            <br>
            <input type="text" name="author" placeholder="Content" value="<?php echo set_value(" author "); ?>">
            <?php echo form_error("author"); ?>
            <br>
            <h3 for="">Categories</h3>
            <select name="categories" class="cate">
                <?php 
                
 		if(isset($student) && count($student)) {

    	foreach ($student as $key => $val) { ?>
                <option>
                    <?php echo $val['name']; ?>
                </option>
                <?php       

     }

}
?>
            </select>
            <?php echo form_error("categories"); ?>
            <br>
            <br>
            <input type="submit" name="submit" value="insert" class="btn btn-primary btn-block btn-large">
        </form>
    </div>
    
</body>

</html>
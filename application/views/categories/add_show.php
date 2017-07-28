
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> </title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/table.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/add_show.css" rel="stylesheet">
<body>
   
    </style>
    <h1 class="title">Manage categories</h1>
    <span> <a href="<?php echo base_url('article/home')  ?>" title="" class="btn btn-primary back">Back</a></span>
    <br>
    <form action="" method="post" accept-charset="utf-8" id="dataTable">
        <input type="text" name="input_text" class="input_text">
        <input type="submit" name="submit" value="thêm mới" class="btn btn-primary">
        <?php echo form_error("input_text"); ?>
    </form>
    <table class="table container responstable">
        <thead class="thead-inverse">
            <tr>
                <th>
                    <INPUT type="checkbox" name="checkAll" class="checkAll" /> </th>
                <th>Id</th>
                <th>Name</th>
                <th class="center"></th>
                <th class="center"></th>
            </tr>
        </thead>
        <tbody>
            <?php 

        if(isset($student) && count($student)) {

            foreach ($student as $key => $val) { ?>
            <tr class="reload">
                <td>
                    <input type="checkbox" name="checkboxlist[]" value=<?php echo $val[ 'id'];?> ></td>
                <td>
                    <?php echo $val['id']; ?> </td>
                <td>
                    <?php echo $val['name']; ?>
                </td>
                <td class="center"><a class="btn btn-success" href="<?php echo base_url();?>categories/update/<?php echo $val['id']; ?>" title="">Update</a></td>
                <td class="center"><a class="btn btn-danger" href="<?php echo base_url();?>categories/delete/<?php echo $val['id']; ?>" title="">Delete</a></td>
            </tr>
            <?php       

             }

        }
           
          ?>
        </tbody>
    </table>
    <input type="submit" name="delall" class="btn btn-primary dellall" value="Delete">
   
</body>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/js-add.js"></script>

</html>
<style>
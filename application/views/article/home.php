<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> </title>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/article/stylesheet.css">
</head>

<body>
    <h1 class="title">Manage article</h1>
    <span class="back"> <a href="<?php echo base_url('home') ?>" title="" class="btn btn-primary back">Back</a></span>
    <br>
    <span class=""> <a href="<?php echo base_url('article/add') ?>" title="" class="btn btn-success back">Add article</a></span>
    <span class="addcate"> <a href="<?php echo base_url('categories/home') ?>" title="" class="btn btn-warning back">Categories</a></span>
    <table>
       
        <thead class="thead-inverse">
            <tr>
            
                
            </tr>
        </thead>
        <tbody>
                  <?php 
      
if(isset($student) && count($student)) {

    foreach ($student as $key => $val) { ?>
    <tr>
    <td><div class="row row_xxx row_xxx<?php echo $val['id'];?>">
            <div class="col-md-1 checkbox">
                <input type="checkbox" name="checkboxlist[]" value="<?php echo $val['id'];?>">
            </div>
            <div class="col-md-3"> <img class="avarta_1" src="<?php echo base_url();?>asset/images/<?php echo $val['image']; ?>" width="90%"></div>
            <div class="col-md-5">
                <p class="title">
                    <?php echo $val['title']; ?>
                </p>
                <pre class="content1">
         <?php echo $val['content']; ?>

    </pre>
                <div>
                    <p class="col-md-6"><b>Categories:</b>
                        <?php echo $val['categories']; ?>
                    </p>
                    <p class="col-md-6"><b>Author:</b>
                        <?php echo $val['author']; ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3 btn_control">
                <span><a class="btn btn-success" href="<?php echo base_url();?>article/update/<?php echo $val['id']; ?>" title="">Update</a></span>
                 <button class="btn btn-danger"  data-toggle="modal" data-target="#confirm-delete">
                  Delete
                </button>
                 <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                   Delete 
                </div>
                 <div class="modal-header">
                    You want to delete ???
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a  href="<?php echo base_url();?>article/delete/<?php echo $val['id']; ?>" class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
                <span><a class="btn btn-warning" href="<?php echo base_url();?>article/preview/<?php echo $val['id']; ?>" title="">Preview</a></span>
            </div>
        </div></td>
        
    </tr>
    <?php       

        }

}
   
  ?>
        </tbody>
    </table>
    
        <tbody> 
        
  <tbody>
    <input type="submit" name="delall" class="btn btn-primary dellall" value="Delete">
    <button type="button" class="btn btn-primary dell-11" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
    <div class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content content-ss">
     Please Select atleast one checkbox
    </div>
  </div>
</div>
    
</body>
<script type="text/javascript"> 
  var baseURL = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/article/show.js"></script>
</html>
<style>
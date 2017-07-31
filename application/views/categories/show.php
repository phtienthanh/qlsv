
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> </title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="<?php echo base_url();?>asset/css/table.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/categories/show.css" rel="stylesheet">

<body>
   
    </style>
    <h1 class="title">Manage categories</h1>

    <span> <a href="<?php echo base_url('article/home')  ?>" title="" class="btn btn-primary back">Back</a></span>
    <br>
    <span class="addcate"> <a href="<?php echo base_url('categories/add') ?>" title="" class="btn btn-warning back">Add Categories</a></span>
   
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
                <td>
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
                                <a  href="<?php echo base_url();?>categories/delete/<?php echo $val['id']; ?>" class="btn btn-danger btn-ok">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                </td>
                
            </tr>
            <?php       

             }

        }
           
          ?>
        </tbody>
    </table>
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
   
</body>
<script type="text/javascript">
var baseURL = "<?php echo base_url();?>";
</script>


<script type="text/javascript" src="<?php echo base_url();?>asset/js/categories/show.js"></script>

</html>
<style>
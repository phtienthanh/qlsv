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
    <script type="text/javascript" src="<?php echo base_url();?>asset/js/show.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/table.css" rel="stylesheet">
</head>

<body>
  
    <h1 class="title">Manage student</h1>
    <form action="<?php echo base_url('index.php/sinhvien/insert')  ?> " method="get" accept-charset="utf-8" id="dataTable">
        <input type="submit" value="Add new student" class="btn btn-primary">
    </form>
    <table class="table container responstable">
        <thead class="thead-inverse">
            <tr>
                <th>
                    <INPUT type="checkbox" name="checkAll" class="checkAll" /> </th>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Avarta</th>
                <th>Role</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            

if(isset($student) && count($student)) {

    foreach ($student as $key => $val) { 
        if ( $val['delete_is'] == 0) {
            # code...
        

        ?>
            <tr class="reload">
                <td>
                    <input type="checkbox" name="checkboxlist[]" value=<?php echo $val[ 'id'];?> ></td>
                <td>
                    <?php echo $val['id']; ?> </td>
                <td>
                    <?php echo $val['first_name']; ?>
                </td>
                <td>
                    <?php echo $val['last_name']; ?>
                </td>
                <td>
                    <?php echo $val['email']; ?>
                </td>
                <td>
                    <img src="<?php echo base_url();?>asset/images/<?php echo $val['avatar']; ?>" width="50px">
                </td>
                <td>
                    <?php echo $val['role']; ?>
                </td>

                <td><a  class="btn btn-default"  href="<?php echo base_url();?>sinhvien/update/<?php echo $val['id']; ?>" title="">Sửa</a></td>
              
                <td>
                <button class="btn btn-default"  data-toggle="modal" data-target="#<?php echo $val['id']; ?>">
                  Delete
                </button>
                 <div class="modal fade <?php echo $val['id']; ?>" id="<?php echo $val['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 
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
                <a  href="<?php echo base_url();?>sinhvien/delete/<?php echo $val['id']; ?>" class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>
</td>
            </tr>
            <?php  
            }     

     }

}
   
  ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary dell-11" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
    <input type="submit" name="delall" class="btn btn-primary dellall" value="Delete">
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
<script type="text/javascript" src="<?php echo base_url();?>asset/js/student/show.js"></script>
</html>
<style>
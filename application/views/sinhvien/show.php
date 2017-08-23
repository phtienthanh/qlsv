<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> </title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/table.css" rel="stylesheet">
</head>

<body>
  
    <h1 class="title">Manage student</h1>
    <form action="<?php echo base_url('sinhvien/insert')  ?> " method="get" accept-charset="utf-8" id="dataTable">
        <input type="submit" value="Add new student" class="btn btn-primary">
    </form>
    <table class="table container responstable">
        <thead class="thead-inverse">
            <tr>
                <th>
                    <INPUT type="checkbox" value="0" name="checkAll" class="checkAll" /> </th>
                <th >Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Avarta</th>
                <th>Role</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php 

        if(isset($student) && count($student > 0)) {

            foreach ($student as $key => $val) { 
                
                if ( $val['delete_is'] == 0) {
                
        ?>
            <tr class="reload">

            <tr class="<?php echo $val['role']; ?>"> 
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
                    <img src="<?php echo base_url();?>image_upload/student/<?php echo $val['avatar']; ?>" height="75px">
                </td>
                <td>
                    <?php echo $val['role']; ?>
                </td>

                <td><a  class="btn btn-default glyphicon glyphicon-edit"  href="<?php echo base_url();?>sinhvien/update/<?php echo $val['id']; ?>" title=""></a></td>
            </tr>   
            </tr>  
          
            <?php  
        }     
    }

}
   
  ?>
        </tbody>
    </table>
 
   <button class="btn btn-danger delete_std"  data-toggle="modal" data-target="#delall"> Delete</button>

    <div class="modal fade" id="delall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog model-de">
            <div class="modal-content">
                <div class="modal-header">
                Delete 
                </div>
                <div class="modal-header">
                You want to delete ???
                </div>
                <div class="modal-footer for-footer">
                <button type="button" class="btn btn-default btn-can" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger btn-ok dellall">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-info btn-lg checkxxx" data-toggle="modal" data-target="#erroModal">Open Modal</button>
    <div id="erroModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
    <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p>Please select checkbox.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
  </div>
</div>

<button type="button" class="btn btn-info btn-lg hinden Delete " data-toggle="modal" data-target="#Delete">Open Modal</button>
    <div id="Delete" class="modal fade" role="dialog">
        <div class="modal-dialog">
    <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p>Successfully deleted !!! </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
  </div>
</div>

<button type="button" class="btn btn-info btn-lg hinden nodelete" data-toggle="modal" data-target="#nodelete">Open Modal</button>
    <div id="nodelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
    <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p>Can't Delete Admin Account !!!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
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
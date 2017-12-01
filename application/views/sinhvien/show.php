<!DOCTYPE html>
<html>
<body class="dangkiBody">
    <h1 class="title colorMana">Manage student</h1>
    <div class="title">
           <?php echo $this->session->flashdata('message_update'); ?>
    </div>
    <form action="<?php echo base_url('sinhvien/create_user');?> " method="post" accept-charset="utf-8" id="dataTable">
        <input type="submit" value="Add new student" <?php if ($AdminPr == false) { echo 'disabled'; } ?> class="btn btn-primary">
        
    </form>
    <button <?php if ($AdminPr == false) { echo 'disabled'; } ?> class="btn btn-danger widthbtn delete_std" data-toggle="modal" data-target="#delall"> Delete</button>
    <table class="table container responstable">
        <thead class="thead-inverse">
            <tr>
                <th><input type="checkbox" value="0" name="checkAll" class="checkAll" /> </th>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Avarta</th>
                <th>Role</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($student) && count($student > 0)) { ?>

                <?php foreach ($student as $keyStudent => $valStudent) { ?>

                    <?php if ($valStudent['is_deleted'] == 0) { ?>

                        <tr class="reload">
                            <tr class="

                                <?php foreach ($role as $keyRole => $valRole) {  ?>

                                    <?php if ($valStudent['id'] == $valRole['user_id']) { ?>

                                        <?php echo $listGroup[$valRole['group_id']]; ?>

                                    <?php } ?>

                                <?php } ?>">

                                <td>
                                    <input type="checkbox" class="checkbox_role" name="checkboxlist[]" value=<?php echo $valStudent[ 'id'];?> <?php if ($AdminPr == false) { echo 'disabled'; } ?> >
                                </td>
                                <td><?php echo $valStudent['id']; ?></td>
                                <td><?php echo $valStudent['first_name']; ?></td>
                                <td><?php echo $valStudent['last_name']; ?></td>
                                <td><?php echo $valStudent['email']; ?></td>
                                <td>
                                    <img src="<?php echo base_url();?>medias/student/<?php echo $valStudent['avatar']; ?>" height="75px">
                                </td>
                                <td>

                                    <?php foreach ($role as $keyRole => $valRole) {  ?>

                                        <?php if ($valStudent['id'] == $valRole['user_id']) { ?>

                                            <?php echo $listGroup[$valRole['group_id']]; ?> <br>

                                        <?php } ?>

                                    <?php } ?>

                                </td>
                                <td><a class="btn btn-default glyphicon glyphicon-edit" <?php if ($AdminPr == false) {
                                    echo 'disabled'; } ?> href="<?php echo base_url();?>sinhvien/update/<?php echo $valStudent['id']; ?>" title=""></a></td>

                            </tr>
                        </tr>

                    <?php } ?>

                <?php } ?>

            <?php } ?>

        </tbody>
    </table>
    
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
                    <p class="messStudent"></p>
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
<script type="text/javascript" src="<?php echo base_url();?>asset/js/student/show.js"></script>
</html>
<style>
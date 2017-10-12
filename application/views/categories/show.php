<!DOCTYPE html>
<html>
<body>
    </style>
    <h1 class="title">Manage categories</h1>

    <?php echo $this->session->flashdata('message_add'); ?>
    <span class="addcate"> <a href="<?php echo base_url('article/home')  ?>" title="" class="btn btn-primary ">Back</a></span>
    <br>
    <span class="addcate"> <a href="<?php echo base_url('categories/add') ?>" title="" class="btn btn-warning btn-addct">Add Categories</a></span>
    <table class="table container responstable">
        <thead class="thead-inverse">
            <tr>
                <th>
                    <INPUT type="checkbox" name="checkAll" class="checkAll" /> </th>
                <th>Id</th>
                <th>Name</th>
                <th class="center"></th>
            </tr>
        </thead>
        <tbody>

            <?php if(isset($categories) && count($categories) > 0) { ?>

                <?php foreach ($categories as $keyCategories => $valCategories) { ?>

                    <?php if ($valCategories['is_deleted'] == 0 ) { ?>

                        <tr class="reload <?php echo $valCategories['id']; ?>">
                            <td><input type="checkbox" name="checkboxlist[]" <?php if ($valCategories['id'] == '1') {
                               echo 'disabled'; } ?> value=<?php echo $valCategories[ 'id']; ?> ></td>
                            <td><?php echo $valCategories['id']; ?></td>
                            <td><?php echo $valCategories['name']; ?></td>
                            <td class="center"><a class="btn btn-success" <?php if ($valCategories['id'] == '1') {
                               echo 'disabled'; } ?> href="<?php echo base_url();?>categories/update/<?php echo $valCategories['id']; ?>" title="">Update</a></td>

                        </tr>

                    <?php } ?>

                <?php } ?>

            <?php } ?>     

        </tbody>
    </table>
    <button class="btn btn-danger delete_std" data-toggle="modal" data-target="#delall"> Delete</button>
    <div class="modal fade" id="delall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog model-de">
            <div class="modal-content">
                <div class="modal-header">
                    Delete
                </div>
                <div class="modal-header">
                    You want to delete ???
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-can" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger btn-ok dellall">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <input type="submit" name="delall" class="btn btn-primary dellall" value="Delete"> -->
    <button type="button" class="btn btn-primary dell-11" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
    <div class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content content-ss">
                Please Select atleast one checkbox
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
</body>
<script type="text/javascript">
var baseURL = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/categories/show.js"></script>
</html>
<style>
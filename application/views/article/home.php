<!DOCTYPE html>
<html>
<body>
    <h1 class="title">Manage article</h1>
    <?php echo $this->session->flashdata('message_add'); ?>
    <span class="back"> <a href="<?php echo base_url('home') ?>" title="" class="btn btn-primary">Back</a></span>
    <br>
    <span class=""> <a href="<?php echo base_url('article/add') ?>" title="" class="btn btn-success back">Add article</a></span>
    <span class="addcate"> <a href="<?php echo base_url('categories/home') ?>" title="" class="btn btn-warning back">Categories</a></span>
    <div>
        <table class="table_article">
            <thead class="thead-inverse"></thead>
            <tbody>
                <?php if (isset($article) && count($article) > 0) { ?>

                    <?php foreach ($article as $keyArticle => $valArticle) { ?>

                        <?php if ( $valArticle['is_deleted'] == 0) { ?>
                            <tr>
                                <td>
                                    <div class="row row_xxx row_xxx<?php echo $valArticle['id'];?>">
                                        <div class="col-md-1 checkbox">
                                            <input type="checkbox" name="checkboxlist[]" value="<?php echo $valArticle['id'];?>">
                                        </div>
                                        <div class="col-md-3"> <img class="avarta_1" src="<?php echo base_url();?>medias/article/<?php echo $valArticle['image']; ?>" width="90%"></div>
                                        <div class="col-md-5">
                                            <p class="title title_article">
                                                <?php 

                                                if (strlen($valArticle['title']) > 30 ) {

                                                    echo substr($valArticle['title'],0,30); echo '...';
                                                    
                                                } else {

                                                    echo $valArticle['title'];
                                                   
                                                } 

                                                ?>
                                            </p>
                                            <pre class="content1">
                                                <?php
                                                
                                                echo substr( htmlentities($valArticle['content']),0,100);
                                                
                                                echo "...";
                                                
                                                ?>
                                            </pre>
                                            <div class="form-group">
                                                <label class="col-md-3"><b>Author :</b></label>
                                                <div class="col-md-3">
                                                    <p><?php echo $valArticle["author"]; ?></p>
                                                </div>
                                                <label class="col-md-3"><b>Categories :</b></label>
                                                <div class="col-md-3">
                                                    <p><?php echo $newArray[$valArticle['categories']] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 btn_control">
                                            <span><a class="btn btn-success" href="<?php echo base_url();?>article/update/<?php echo $valArticle['slug']; ?>" title="">Update</a></span>
                                            <div class="modal fade" id="<?php echo $valArticle['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                            <a href="<?php echo base_url();?>article/delete/<?php echo $valArticle['id']; ?>" class="btn btn-danger btn-ok">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span><a class="btn btn-warning" href="<?php echo base_url();?>article/preview/<?php echo $valArticle['slug']; ?>" title="">Preview</a></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    <?php } ?>

                <?php } ?>
            </tbody>
        </table>
    </div>
    <tbody>
        <tbody>
            <button class="btn btn-danger delete" data-toggle="modal" data-target="#delall"> Delete</button>
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
            <button type="button" class="btn btn-info btn-lg checkxxx" data-toggle="modal" data-target="#erroModal">Open Modal</button>
            <div id="erroModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
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
            <button type="button" class="btn btn-info btn-lg hinden delete-c" data-toggle="modal" data-target="#nodelete">Open Modal</button>
            <div id="nodelete" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"></button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <p>Successfully deleted !!!</p>
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
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/article/show.js"></script>

</html>
<style>
<!DOCTYPE html>
<html>
<body class="dangkiBody">
    <h1 class="title colorMana">Manage article</h1>
    <div class="title">
        <?php echo $this->session->flashdata('message_add'); ?>
    </div>
    <br>
    <br>
    <br>
    <div class="col-md-2 col2">
        <span class="back"> <a href="<?php echo base_url('home');?>" title="" class="btn btn-default btn-back">Back</a></span>
    <br>
    <span class=""> <a href="<?php echo base_url('article/add') ?>"  class="btn btn-primary back">Add article</a></span>
    <span class="addcate"> <a href="<?php echo base_url('categories/home') ?>"  class="btn btn-warning back">Manage categories</a></span>
    <br>

    <?php if (count($article) > 0) { ?>

        <button class="btn btn-danger back delete"  data-toggle="modal" data-target="#delall"> Delete</button>

    <?php } ?>

    </div>
    
    <div class="col-md-10 content-10">
        <div>

            <?php if (count($article) == 0) { ?>

                <h3 class="title" style="color:#FFF">There are no records</h3>

            <?php } ?>
           
        </div>
        <table class="table_article">
            <thead class="thead-inverse"></thead>
            <tbody>

                <?php if (isset($article) && count($article) > 0) { ?>

                    <?php foreach ($article as $keyArticle => $valArticle) { ?>

                        <?php if ($valArticle['is_deleted'] == 0) { ?>

                            <tr>
                                <td>
                                    <div class="row row_xxx row_xxx<?php echo $valArticle['id'];?>">
                                        <div class="col-md-4 height-img">
                                        <input type="checkbox" class="checkboxhe"  name="checkboxlist[]" value="<?php echo $valArticle['id'];?>">
                                            <div class="img-avarta">
                                                <img class="avarta_1" src="<?php echo base_url();?>medias/article/<?php echo $valArticle['image']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-7 body-content">
                                            <p class="col-md-12 title_article">

                                                <?php 

                                                if (strlen($valArticle['title']) > 30) {

                                                    echo substr($valArticle['title'], 0, 30); echo '...';
                                                    
                                                } else {

                                                    echo $valArticle['title'];
                                                   
                                                } 

                                                ?>

                                            </p>
                                            <pre class="col-md-12 content1">

                                                <?php

                                                    if (strlen($valArticle['content']) > 200) {

                                                        echo substr(preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($valArticle['content'])), 0, 200); echo '...';
                                                        
                                                    } else {

                                                        echo $valArticle['content'];

                                                    }
                                                    
                                                ?>

                                            </pre>
                                            <div class="form-group btn-group col-md-12">
                                                <label><b>Author :</b></label>
                                                <span>

                                                    <?php 

                                                        if (in_array($valArticle["author"], $studentName)) {

                                                            echo $valArticle["author"];
                                                        
                                                        } else {

                                                            echo "Admin";

                                                        }

                                                    ?>
                                                        
                                                </span>
                                                <br> 
                                                <label><b>Categories : </b></label>
                                                <span><?php echo $listName[$valArticle['categories']]; ?></span>
                                                <div class="form-group datetime">
                                                <label><b>Poster on: </b></label>
                                                <span><?php echo $valArticle['date']; ?></span>
                                            </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-1 btn_control"> 
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
                                            <span><a class="btn btn-warning" href="<?php echo base_url();?>article/preview/<?php echo $valArticle['slug']; ?>" title=""><span class="glyphicon glyphicon-eye-open"></span></a></span>
                                            <span><a class="btn btn-success" href="<?php echo base_url();?>article/update/<?php echo $valArticle['slug']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></span>
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
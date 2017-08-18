<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> </title>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/table.css">
</head>

<body>
    <h1 class="title">Manage article</h1>
    <span class="back"> <a href="<?php echo base_url('home') ?>" title="" class="btn btn-primary">Back</a></span>
    <br>
    <span class=""> <a href="<?php echo base_url('article/add') ?>" title="" class="btn btn-success back">Add article</a></span>
    <span class="addcate"> <a href="<?php echo base_url('categories/home') ?>" title="" class="btn btn-warning back">Categories</a></span>
    <table class="table_article">
       
        <thead class="thead-inverse">
            <tr>
            </tr>
        </thead>
        <tbody>
                  <?php 
      
if(isset($article) && count($article)) {

    foreach ($article as $keyarticle => $val) { 

        if ( $val['delete_is'] == 0) {
        ?>
    <tr>
    <td>
    <div class="row row_xxx row_xxx<?php echo $val['id'];?>">
            <div class="col-md-1 checkbox">
                <input type="checkbox" name="checkboxlist[]" value="<?php echo $val['id'];?>">
            </div>
            <div class="col-md-3"> <img class="avarta_1" src="<?php echo base_url();?>asset/images/article/<?php echo $val['image']; ?>" width="90%"></div>
            <div class="col-md-5">
                <p class="title">
                    <?php echo $val['title']; ?>
                </p>
        <pre class="content1">
            <?php echo substr( htmlentities($val['content']),0,100);
            echo "..."; ?>
        </pre>
                <div>

                    <p class="col-md-6"><b>Categories:</b> <?php echo $newArray[$val['categories']] ?>
                        <!-- <?php 
                         foreach ($categories as $keycate => $categories) {

                            if ($val['categories'] == $categories['id'] && $categories['delete_is'] == 0) {

                                echo $categories['name'];

                            } else if ($val['categories'] == $categories['id'] && $categories['delete_is'] == 1) {
                            
                                echo "Default";
                            
                            }

                        } ?> -->
                    </p>
                    <p class="col-md-6"><b>Author:</b>
                        <?php echo $val['author']; ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3 btn_control">
                <span><a class="btn btn-success" href="<?php echo base_url();?>article/update/<?php echo $val['slug']; ?>" title="">Update</a></span>
                 <div class="modal fade" id="<?php echo $val['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <span><a class="btn btn-warning" href="<?php echo base_url();?>article/preview/<?php echo $val['slug']; ?>" title="">Preview</a></span>
            </div>
        </div></td>
        
    </tr>
    <?php   
            }    

        }

    }
   
  ?>
        </tbody>
    </table>
    
        <tbody> 
        
  <tbody>
   <button class="btn btn-danger delete"  data-toggle="modal" data-target="#delall"> Delete</button>
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
<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/article/show.js"></script>
</html>
<style>
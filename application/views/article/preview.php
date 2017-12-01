<!DOCTYPE html>
<body class="fix-header card-no-border dangkiBody">
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid page-wrapper">
                <div class="row page-titles">
                    <h1 class="title colorMana">

                        <?php

                            if (isset($get_article["title"]) && count($get_article["title"]) > 0) {
                            
                                echo $get_article["title"];

                            } 

                        ?>
                            
                    </h1>
                    <div class="col-lg-12 col-xlg-9 col-md-7 ">
                        <a href="<?php echo base_url();?>article/home" class="btn hidden-sm-down  btn-default btn-back"> Back</a>
                    </div>
                </div>
                 <br> 
                <div class="row">
                    <div class="col-lg-12 col-xlg-9 col-md-7 ">
                        <div class="card">
                            
                            <div class="card-block ">
                                <form action="<?php echo base_url();?>article/home" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-3"><b>Author :</b></label>
                                        <div class="col-md-3">
                                            <p>

                                                <?php 

                                                    if (in_array($get_article["author"], $nameStudent)) {

                                                        echo $get_article["author"];
                                                        
                                                    } else {

                                                        echo "Admin";
                                                        
                                                    }

                                                ?>
                                                        
                                            </p>
                                        </div>
                                        <label class="col-md-3"><b>Categories :</b></label>
                                        <div class="col-md-3">
                                            <p>

                                                <?php 
                                                
                                                    if (isset($categoryName[$get_article['categories']]) && count($categoryName[$get_article['categories']]) > 0) {

                                                        echo $categoryName[$get_article['categories']];
                                                     
                                                    } 

                                                ?>
                                                    
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p class="col-md-12">

                                            <?php 

                                                if (isset($get_article["content"]) && count($get_article["content"]) > 0) {

                                                    echo nl2br($get_article["content"], false);
                                                
                                                } 

                                            ?>

                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
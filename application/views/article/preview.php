<!DOCTYPE html>
<body class="fix-header card-no-border dangkiBody">
    <div id="main-wrapper">
        <div class="page-wrapper">
            <div class="container-fluid page-wrapper">
                <div class="row page-titles">
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
                                    <h1 class="title">

                                        <?php

                                            if (isset($get_article["title"]) && count($get_article["title"]) > 0) {
                                            
                                                echo $get_article["title"];

                                            } 

                                        ?>
                                            
                                    </h1>
                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <div class="col-md-12">
                                                <span >Article -></span>
                                                <span>
                                                    <?php 
                                                    
                                                        if (isset($categoryName[$get_article['categories']]) && count($categoryName[$get_article['categories']]) > 0) {

                                                            echo $categoryName[$get_article['categories']];
                                                         
                                                        } 

                                                    ?>
                                                        
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class=""><b>Date :</b></label>
                                                <span>
                                                    
                                                    <?php

                                                        if (isset($get_article["date"]) && count($get_article["date"]) > 0) {
                                                        
                                                            echo $get_article["date"];

                                                        } 

                                                    ?>
                                                        
                                                </span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <img class="image_width" src="<?php echo base_url();?>medias/article/<?php echo $get_article['image']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <p class="col-md-12" style="padding-top: 30px;">

                                            <?php 

                                                if (isset($get_article["content"]) && count($get_article["content"]) > 0) {

                                                    echo nl2br($get_article["content"], false);
                                                
                                                } 

                                            ?>

                                        </p>
                                    </div>  
                                    <div class="col-md-12">
                                                <p style="float: right;">
                                                
                                                <?php 

                                                    if (in_array($get_article["author"], $nameStudent)) {

                                                        echo $get_article["author"];
                                                        
                                                    } else {

                                                        echo "Admin";
                                                        
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
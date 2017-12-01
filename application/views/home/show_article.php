<html>
<body>
    <div class="container">
           <h1 class="title">Show article</h1>
           <?php if(isset($searchAr) && count($searchAr)) { ?>

        <h3 class="title searchAr"> Found <?php echo $searchAr; ?> result</h3>

        <?php } ?>
    <div class="col-md-8">
    
        <?php if (count($query) == 0) { ?>

        <h3 class="title">No article show to</h3>

        <?php } ?>

        <?php foreach($query as $row) { ?>

            <?php if ($row['is_deleted'] == 0 ) { ?>

                <div class="card mb-4">
                    <div class="image_post">
                        <img class="image_width" src="<?php echo base_url();?>medias/article/<?php echo $row['image']; ?>">
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">
                        <?php if (strlen($row['title']) > 30 ) {

                            echo substr($row['title'],0,30); echo '...';
                            
                        } else {

                            echo $row['title'];
                           
                        } ?>    
                        </h2>
                        <div class="card-text">
                            <div>
                                <?php if (strlen($row['content']) > 200){

                                    echo substr(preg_replace('/([^\pL\.\ ]+)/u', '', strip_tags($row['content'])), 0, 200); echo '...';
                                    
                                } else {

                                    echo $row['content'];

                                } ?>
                            </div>
                            
                        </div>
                        <a class="btn btn-primary" href="<?php echo base_url();?>home/preview/<?php echo $row['slug']; ?>" title="">Article detail</a>
                    </div>
                    <div class="card-footer footer_post">
                        <p class="cate_show"><b>Categories: </b><?php echo $categoryVariable[$row['categories']] ?></p>
                        <p class="cate_show"><b>Author: </b><?php if (in_array($row["author"], $nameStudent)) { echo $row["author"]; } else { echo "Admin"; } ?></p>
                        <p><b> Poster on : </b> <span class="date-time"> <?php echo $row['date']; ?></span></p>
                    </div>
                </div>
            
            <?php } ?>

        <?php } ?>

        <div class="paging"><?php echo $paginator; ?></div>
    </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <form action="" class="Form_insert form_search form_search_show" method="get" accept-charset="utf-8">
                        <input type="text" name="keyword" class="form-control input_search">
                        <button type="submit" class="btn btn-primary btn_searchAr">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div> 
</body>
</html>
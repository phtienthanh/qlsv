<html>

<body class="title">

<form action="" class="Form_insert form_search" method="get" accept-charset="utf-8">
	<input type="text" name="keyword" class="form-control input_search">
	<button type="submit" class="btn btn-primary">Search</button>
</form>
    <?php foreach($query as $row):

      if ($row['is_deleted'] == 0 ) {
       ?>
    <div class="Form_insert">
        <h3 class="title"> <?php echo $row['title']; ?> </h3>
        <p class="date-time">
            <?php echo $row['date']; ?> </p>
        <p class="author_show"><b>Author:  </b>
            <?php echo $row['author']; ?> </p>
        <p class="cate_show"><b>Categories:  </b>
            <?php echo $newArray[$row['categories']] ?> </p>
        <div class="img_show"><img src="<?php echo base_url();?>medias/article/<?php echo $row['image']; ?>" width="100%"></div>
        <p class="content_ct">
            <?php echo substr( htmlentities($row['content']),0,100);
            echo "..."; ?> </p>
        <div class="title">
            <a class="btn btn-primary" href="<?php echo base_url();?>home/preview/<?php echo $row['slug']; ?>" title="">Article detail</a>
        </div>
        <hr class="color_hr">
    </div>
    <?php 
    }
    endforeach;?>
    <div class="paging">
        <?php echo $paginator; ?>
    </div>
    
</body>

</html>
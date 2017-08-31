
<html>

<head>

</head>

<body class="title">

<form action="" class="Form_insert form_search" method="get" accept-charset="utf-8">
	<input type="text" name="keyword" class="form-control input_search">
	<button type="submit" class="btn btn-primary">Search</button>
	<!-- <input type="submit" name="search" class="btn btn-primary" value="Search">  -->
</form>
    <?php foreach($query as $row):

      if ($row['is_delete'] == 0 ) {
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
        <p class="container content_ct">
            <?php echo substr( htmlentities($row['content']),0,200);
            echo "..."; ?> </p>
        <div class="title">
            <a class="btn btn-primary" href="<?php echo base_url();?>home/preview/<?php echo $row['slug']; ?>" title="">Preview</a>
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
<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>

</html>
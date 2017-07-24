<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> </title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script> -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.shorten.1.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/csstable/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/stylesheet.css" rel="stylesheet">
</head>

<body>
    <h1 class="title">Manage article</h1>
    <span class="back"> <a href="<?php echo base_url('home') ?>" title="" class="btn btn-primary back">Back</a></span>
    <br>
    <span class=""> <a href="<?php echo base_url('article/add') ?>" title="" class="btn btn-success back">Add article</a></span>
    <span class="addcate"> <a href="<?php echo base_url('categories/add') ?>" title="" class="btn btn-warning back">Add categories</a></span>
    <?php 
            
if(isset($student) && count($student)) {

    foreach ($student as $key => $val) { ?>
    <tr>
        <div class="row row_xxx row_xxx<?php echo $val['id'];?>">
            <div class="col-md-1 checkbox">
                <input type="checkbox" name="checkboxlist[]" value="<?php echo $val['id'];?>">
            </div>
            <div class="col-md-3"> <img class="avarta_1" src="<?php echo base_url();?>images/<?php echo $val['image']; ?>" width="90%"></div>
            <div class="col-md-5">
                <p class="title">
                    <?php echo $val['title']; ?>
                </p>
                <pre class="content1">
      <?php echo $val['content']; ?>

    </pre>
                <div>
                    <p class="col-md-6"><b>Categories:</b>
                        <?php echo $val['categories']; ?>
                    </p>
                    <p class="col-md-6"><b>Author:</b>
                        <?php echo $val['author']; ?>
                    </p>
                </div>
            </div>
            <div class="col-md-3 btn_control">
                <span><a class="btn btn-success" href="<?php echo base_url();?>article/update/<?php echo $val['id']; ?>" title="">Update</a></span>
                <span><a class="btn btn-danger" href="<?php echo base_url();?>article/delete/<?php echo $val['id']; ?>" title="">Delete</a></span>
                <span><a class="btn btn-warning" href="<?php echo base_url();?>article/preview/<?php echo $val['id']; ?>" title="">Preview</a></span>
            </div>
        </div>
    </tr>
    <?php       

     }

}
   
  ?>
    <input type="submit" name="delall" class="btn btn-primary dellall" value="Delete">
    <script>
    $(document).ready(function() {

        $('.dellall').click(function() {

            if (confirm("Are you sure you want to delete this?")) {

                var id = [];

                var reload = [];

                $(':checkbox:checked').each(function(i) {

                    id[i] = $(this).val();

                });


                if (id.length === 0) {

                    alert("Please Select atleast one checkbox");

                } else {

                    url = '<?php echo base_url();?>index.php/article/delete_multiple/';

                    $.ajax({

                        url: '<?php echo base_url();?>index.php/article/delete_multiple/',

                        method: 'POST',

                        data: {
                            id: id
                        },

                        success: function(events) {


                            $(".row").removeAttr('checked');

                        },
                        error: function(events) {
                            alert("that bai");
                        },

                    });

                }

            } else {

                return false;
            }

        });

        $(".dellall").on("click", function() {
            $("input:checkbox").each(function() {
                if ($(this).is(":checked")) {
                    $('.row_xxx').parent().remove();
                }
            });
        });

    });

    $(document).ready(function() {

        $('.checkAll').on('click', function() {

            $(this).closest('table').find('tbody :checkbox')

                .prop('checked', this.checked)

                .closest('tr').toggleClass('selected', this.checked);

        });

        $('tbody :checkbox').on('click', function() {

            $(this).closest('tr').toggleClass('selected', this.checked); //Classe de seleção na row

            $(this).closest('table').find('.checkAll').prop('checked', ($(this).closest('table').find('tbody :checkbox:checked').length == $(this).closest('table').find('tbody :checkbox').length)); //Tira / coloca a seleção no .checkAll

        });


    });
    </script>
</body>

</html>
<style>
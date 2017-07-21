<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> </title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--  <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/csstable/style.css" rel="stylesheet">
</head>

<body>  
    <style>
    .container-fluid{
        background-color: #eee;
        margin-bottom: 50px;
    }
    form{
        margin: 27px;
    }
    table{
        padding: 27px;
    }
    .title{
        text-align: center;
    }
    .back{
        margin-bottom: 30px;
    }
    .left{
        float: right;
    }

    </style>
   
    <h1 class="title" >Manage article</h1>
    <span> <a href="" title="" class="btn btn-primary back">Back</a></span>
    <br>

    
    <span> <a href="" title="" class="btn btn-primary left"> Add new categories</a></span>

    <form action="<?php echo base_url('index.php/controller_article/add')  ?> " method="get" accept-charset="utf-8" id="dataTable"  >
        <input type="submit" value="Add new article" class="btn btn-primary" >
    </form>
    <table class="table container responstable">
        <thead class="thead-inverse">
            <tr>
                <th>
                    <INPUT type="checkbox" name="checkAll" class="checkAll" /> </th>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Avarta</th>
                <th>Author</th>
                <th>Categories</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            

if(isset($student) && count($student)) {

    foreach ($student as $key => $val) { ?>
        <tr class="reload">
             <td>
                <input type="checkbox" name="checkboxlist[]" value=<?php echo $val[ 'id'];?> ></td>
            <td>
                <?php echo $val['id']; ?> </td>
            <td>
                <?php echo $val['title']; ?>
            </td>
            <td>
                <?php echo $val['content']; ?>
            </td>
            
            <td>
            <img src="<?php echo base_url();?>images/<?php echo $val['image']; ?>" width="50px">
                   
            </td>
            <td>
                <?php echo $val['author']; ?>
            </td>
              <td>
                <?php echo $val['categories']; ?>
            </td>
            <td><a href="<?php echo base_url();?>controller_article/update/<?php echo $val['id']; ?>" title="">Sửa</a></td>
            <td><a href="<?php echo base_url();?>controller_article/delete/<?php echo $val['id']; ?>" title="">xóa</a></td>
            </tr>
        <?php       

     }

}
   
  ?>
        </tbody>
    </table>
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

                    url = '<?php echo base_url();?>index.php/controller_article/delete_multiple/';

                    $.ajax({

                        url: '<?php echo base_url();?>index.php/controller_article/delete_multiple/',

                        method: 'POST',

                        data: {
                            id: id
                        },

                        success: function(events) {

                            $('.selected').remove();

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

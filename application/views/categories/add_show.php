
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
    .container-fluid {
        background-color: #eee;
        margin-bottom: 50px;
    }

    form {
        margin: 27px;
    }

    table {
        padding: 27px;
    }

    .title {
        text-align: center;
    }

    .back {
        margin-bottom: 30px;
    }

    .left {
        float: right;
    }

    .input_text {
        width: 50%;
        padding: 4px;
    }

    .responstable {}

    .center {
        text-align: center !important;
        width: 10%;
    }
    </style>
    <h1 class="title">Manage categories</h1>
    <span> <a href="<?php echo base_url('article/home')  ?>" title="" class="btn btn-primary back">Back</a></span>
    <br>
    <form action="" method="post" accept-charset="utf-8" id="dataTable">
        <input type="text" name="input_text" class="input_text">
        <input type="submit" name="submit" value="thêm mới" class="btn btn-primary">
        <?php echo form_error("input_text"); ?>
    </form>
    <table class="table container responstable">
        <thead class="thead-inverse">
            <tr>
                <th>
                    <INPUT type="checkbox" name="checkAll" class="checkAll" /> </th>
                <th>Id</th>
                <th>Name</th>
                <th class="center"></th>
                <th class="center"></th>
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
                    <?php echo $val['name']; ?>
                </td>
                <td class="center"><a class="btn btn-success" href="<?php echo base_url();?>categories/update/<?php echo $val['id']; ?>" title="">Update</a></td>
                <td class="center"><a class="btn btn-danger" href="<?php echo base_url();?>categories/delete/<?php echo $val['id']; ?>" title="">Delete</a></td>
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

                    url = '<?php echo base_url();?>index.php/categories/delete_multiple/';

                    $.ajax({

                        url: '<?php echo base_url();?>index.php/categories/delete_multiple/',

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
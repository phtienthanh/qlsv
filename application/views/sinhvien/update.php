<!DOCTYPE html>
<html>

<body>
    <h1 class="title">Update student
<p class="title"> <?php  if (isset($upload['error']) && count($upload['error'])) {

    echo $upload['error'];
   
} ?></p></h1>
    <p class="title">
        <?php  if (isset($upload_fail) && count($upload_fail)) {

    echo $upload_fail;
   
} ?>
    </p>
    <div class="insert">
        <form action="" class="Form_insert" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <input type="submit" name="back" value="Back" class="btn btn-danger btn-block btn-insert">
            <br>
            <label for="">First name</label>
            <br>
            <input type="text" name="first_name" class="form-control" placeholder="First name" value="<?php echo $student["first_name"];?>">
            <?php echo form_error("first_name"); ?>
            <br>
            <label for="">Last name</label>
            <br>
            <input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?php echo $student["last_name"];?>">
            <?php echo form_error("last_name"); ?>
            <br>
            <label for="">Email</label>
            <br>
            <input type="text" name="email" class="form-control" readonly="value" placeholder="Email" value="<?php echo $student["email"];?> ">
            <br>
            <label for="">Avatar</label>
            <br>
            <img src="<?php echo base_url();?>medias/student/<?php echo $student["avatar"];?>" width="150">
            <input type="text" name="img_name" class="form-control hinden" value="<?php echo $student["avatar"]; ?>"/>
            <input type="file" name="userfile" class="userfile hinden">
             <p class="btn btn-primary btn_select ">Select image</p>
            <br>
            <!--  <input type="text"  name="avarta" placeholder="Avatar" value="<?php echo $student["avatar"];?>"> -->
            <?php echo form_error("avarta"); ?>
            <br>
            <label for="">Role</label>
            <br>
   
            
                <?php 
                    
            if(isset($role) && count($role)) {

            foreach ($role as $key => $val) {
                             
                 ?><tr selected>
                     <input name='<?php echo $val['id']; ?>' type='checkbox' value='<?php echo $val['id']; ?>'  <?php  if (isset($$val['name']) && count($$val['name'])) {

    echo 'checked';
   
} ?> /><?php echo $val['name']; ?>
                 </tr>
                   
                    <?php       

                        }  
                    }
                
                ?>
            <?php echo form_error("role"); ?>
            <br>
            <input class="btn btn-warning" type="submit" name="insert" value="Update">
            <span><a class="btn btn-success" href="<?php echo base_url();?>sinhvien/changepass/<?php echo $student["id"];?>" title=""> Change password</a></span>
        </form>
    </div>
    <?php echo form_open_multipart('home/upload');?>
</body>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="{{url(js/validate.js)}}"></script>
<script src="<?php echo base_url();?>asset/js/student/update_fail_student.js"></script>

</html>
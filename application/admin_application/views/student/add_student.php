<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?php echo $title;?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $title;?></li>
          </ol>
        </div>
      </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title;?></h3>
              </div>
              <!-- /.card-header -->
              <?php $this->load->view('theme/error_msg');?>
              <!-- form start -->
              <?php  echo form_open_multipart($action, array('id' => 'quickForm'));?>
              <div class="card-body">
                <div class="form-group">
                  <?php //print_r($admin_details); exit();
                      $level= $admin_details->admin_level;
                      $zon=$admin_details->zon_id;
                  ?>
                  <label for="exampleInputEmail1">Enter  Student Name*</label>
                  <input type="text" name="std_name" required="required" class="form-control" id="std_name" placeholder="Enter Student Name "value="<?php echo @$row->std_name?>"  >

                  <label for="exampleInputEmail1">Enter Date of Birth*</label>
                  <input type="date" name="std_dob" value="<?php echo @$row->std_dob?>" required="required" class="form-control">

                  <label for="exampleInputEmail1">Enter Parent's Phone Number:</label>
                  <input type="text" name="phone" class="form-control" id="std_name" placeholder="Enter Parent's Phone Number "value="<?php echo @$row->std_phone?>"  >
                  
                  <label for="exampleInputEmail1">Gender: *</label><br>
                  <input type="radio" name="gender" value="Male" <?php if(@$row->std_gender == "Male"){?> checked <?php } ?>  required>Male
                  <input type="radio" name="gender" value="Female" <?php if(@$row->std_gender == "Female"){?> checked <?php } ?>>Female

                      <br>
                  <label for="exampleInputEmail1">Medium: *</label><br>
                  <input type="radio" name="medium" value="English" <?php if(@$row->std_medium == "English"){?> checked <?php } ?> >English
                  <input type="radio" name="medium" value="Malayalam" <?php if(@$row->std_medium == "Malayalam"){?> checked <?php } ?> >Malayalam

                      <br> <label>Enter Student Class *</label>
                        <select class="form-control" name="std_class" required="required" id="stf_class">
                          <option value="">----Select----</option>
                          <?php
                          foreach ($std_class as $std) {
                          ?>
                          <option <?php  if($std->class_id == @$row->std_class){?> selected <?php }?> value="<?php echo $std->class_id;?>"><?php echo $std->class_name;?></option>
                          <?php } ?>
                        </select>
                          </div>
              </div>
            </div>
          </div>
             <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
               <div class="card-body">
                         <label for="exampleInputEmail1">Enter  Aadhaar Number </label>
                  <input type="text" name="std_proof"  class="form-control" id="" placeholder="Enter Aadar  Number "value="<?php echo @$row->std_id_proof?>"  >
              
               
                

                  <?php  
                    if($level==1){
                  ?>
                  
                         <label>Select Zone *</label>
                        <select class="form-control" name="std_zone"  id="zone_id">
                          <option value="">----Select----</option>
                          <?php
                          foreach ($zone as $rel) {
                          ?>
                          <option <?php  if($rel->zone_id == @$row->std_zone){?> selected <?php }?> value="<?php echo $rel->zone_id;?>"><?php echo $rel->zone_name;?></option>
                          <?php } ?>
                        </select>
                        
                        <div id="">
                         <label>Select District </label>
                        <select class="form-control" name="std_district" id="dist">
                          <option value="">----Select----</option>
                          <?php if(@$row_dist->dist_name){ ?>
                    <option selected  value="<?php echo @$row_dist->dist_id;?>" ><?php echo @$row_dist->dist_name;?></option><?php } ?>
                          
                         
                            <option></option>
                        </select>
                        </div>
                        <div id="">
                          <label>Select Local Centers *</label>
                        <select class="form-control" name="std_local" id="local">
                          <option value="">----Select----</option>
                         <?php if(@$row_local->center_name){ ?>
                    <option selected  value="<?php echo @$row_local->center_id;?>" ><?php echo @$row_local->center_name;?></option><?php } ?>

                          
                            <option></option>
                        </select>
                        </div>

                <?php 
              }
              else if($level==2){
              ?>
               <div id="">
                         <label>Select District </label>
                        <select class="form-control" name="std_district" id="dist">
                          <option value="">----Select----</option>
                         
                             <?php
                          foreach ($district as $rel) {
                          ?>
                          <option <?php  if($rel->dist_id == @$row->std_district){?> selected <?php }?> value="<?php echo $rel->dist_id;?>"><?php echo $rel->dist_name;?></option>
                          <?php } ?>
                        </select>
                        </div>
                        <div id="">
                          <label>Select Local Centers *</label>
                        <select class="form-control" name="std_local" id="local">
                          <option value="">----Select----</option>
                          <?php if(@$row_local->center_name){ ?>
                    <option selected  value="<?php echo @$row_local->center_id;?>" ><?php echo @$row_local->center_name;?></option><?php } ?>
                            <option></option>
                        </select>
                        </div>

            <?php  
          }
          else if($level==3)
          {
            ?>
            <div id="">
                          <label>Select Local Centers *</label>
                        <select class="form-control" name="std_local" id="local">
                          <option value="">----Select----</option>
                              <?php
                          foreach ($loc as $rel) {
                          ?>
                          <option <?php  if($rel->center_id == @$row->std_district){?> selected <?php }?> value="<?php echo $rel->center_id;?>"><?php echo $rel->center_name;?></option>
                          <?php } ?>
                        </select>
                        </div>
            <?php
          }
         
            ?>



        

                  <?php  
                  if(@$row->std_photo)
                  {

                    ?>
                   <br> <img style="width: 15%;" alt="<?php echo $row->std_name?>" src="<?php echo $this->config->item('image_url')?>student/<?php echo $row->std_photo?>"/>
                    <?php
                  }
                  ?>
                  <br>
                  <label for="exampleInputEmail1">Student Image </label><br>
                  <input type="file" name="image" id="image">
                
                
                <!-- /.card-body -->
                <div><br>
                <button type="button" onclick="javascript:history.back()" class="btn btn-default">Back</button>
                <button type="submit" class="btn btn-primary"><?php echo $btn_label;?></button>
                </div>
                <?php echo form_close();?>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
        <script type="text/javascript">
      $(document).ready(function(){
      // Category Change
      $('#zone_id').change(function(){
      var cat_id = $(this).val();
      // alert(cat_id);exit();
      $.ajax({
      url:"<?php echo base_url('local_center/get_district'); ?>",
      method:"POST",
      data:{zone:cat_id},
      dataType: 'json',
      success: function(response) {
        // alert(response);
      $('#dist').find('option').not(':first').remove();
      // Add options
      $.each(response,function(key,value){
      $('#dist').append('<option value="'+value.dist_id+'">'+value.dist_name+'</option>');
      });
      }
      });
      });


      $('#dist').change(function(){
      var di_id = $(this).val();
      // alert(di_id);exit();
      $.ajax({
      url:"<?php echo base_url('staff/get_local_centers'); ?>",
      method:"POST",
      data:{district:di_id},
      dataType: 'json',
      success: function(response) {
        // alert(response);
      $('#local').find('option').not(':first').remove();
      // Add options
      $.each(response,function(key,value){
      $('#local').append('<option value="'+value.center_id+'">'+value.center_name+'</option>');
      });
      }
      });
      });

      });
      
      // caste Change



    
      
      // caste Change

      
      </script>
<script type="text/javascript">
    

  </script>

  <!-- check existing ussername -->

  <script type="text/javascript">
// Ajax post
$(document).ready(function() 
{
$("#email").change(function() 
{
var email = $('#email').val();
// alert(email);exit();

  if(email!="")
  {
    $.ajax({
    method: "POST",
    url: "<?php echo base_url('staff/checkUser'); ?>",
    dataType: 'html',
    data: {email: email},
    success: function(response) 
    {
      // alert(response);
      if(response==1)
      {
      $("#msg").css({"color":"red"});
      $("#msg").html("This user already exists");
      }
      else
      {
      $("#msg").css({"color":"green"});
      $("#msg").html("Congrates username available !"); 
      }
      
    }
   
    });
  }
  else
  {
  alert("pls enter username ");
  }

});
});
</script>
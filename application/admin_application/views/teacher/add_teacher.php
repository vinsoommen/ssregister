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
                  <label for="exampleInputEmail1">Enter  Teacher Name*</label>
                  <input type="text" name="t_name" required="required" class="form-control" id="std_name" placeholder="Enter Teacher Name "value="<?php echo @$row->t_name?>"  >

                  <label for="exampleInputEmail1">Enter Age *</label>
                  <input type="number" name="t_age" value="<?php echo @$row->t_age?>" placeholder="Enter Age  "  class="form-control">

                  <label for="exampleInputEmail1">Enter Phone Number:</label>
                  <input type="text" name="t_phone" class="form-control" id="std_name" placeholder="Enter Phone Number "value="<?php echo @$row->t_phone?>"  >

                  <label for="exampleInputEmail1">Enter Qualification:</label>
                   <input type="text" name="t_qualification" class="form-control" id="" placeholder="Enter Qualification "value="<?php echo @$row->t_qualification?>"  >

                  <label for="exampleInputEmail1">Enter Job :</label>
                  <input type="text" name="t_job" class="form-control" id="" placeholder="Enter  Job "value="<?php echo @$row->t_job?>"  >
                  <label for="exampleInputEmail1">Gender</label><br>
                  <input type="radio" name="t_gender" value="Male" <?php if(@$row->t_gender == "Male"){?> checked <?php } ?>>Male
                  <input type="radio" name="t_gender" value="Female" <?php if(@$row->t_gender == "Female"){?> checked <?php } ?>>Female

                        </div>
              </div>
            </div>
          </div>
             <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
               <div class="card-body">                  <label for="exampleInputEmail1">Medium</label><br>
                  <input type="radio" name="t_medium" value="English" <?php if(@$row->t_medium == "English"){?> checked <?php } ?> >English
                  <input type="radio" name="t_medium" value="Malayalam" <?php if(@$row->t_medium == "Malayalam"){?> checked <?php } ?>>Malayalam
                  
                      <br> <label>Enter  Class *</label>
                        <select class="form-control" name="t_class" required="required" id="stf_class">
                          <option value="">----Select----</option>
                          <?php
                          foreach ($std_class as $std) {
                          ?>
                          <option <?php  if($std->class_id == @$row->t_class){?> selected <?php }?> value="<?php echo $std->class_id;?>"><?php echo $std->class_name;?></option>
                          <?php } ?>
                        </select>

                         <label for="exampleInputEmail1">Enter  Aadhaar Number </label>
                  <input type="text" name="t_proof"  class="form-control" id="" placeholder="Enter Aadar  Number "value="<?php echo @$row->t_proof?>"  >
                  <?php  
                    if($level==1){
                  ?>
                  
                         <label>Select Zone *</label>
                        <select class="form-control" name="t_zone"  id="zone_id">
                          <option value="">----Select----</option>
                          <?php
                          foreach ($zone as $rel) {
                          ?>
                          <option <?php  if($rel->zone_id == @$row->t_zone){?> selected <?php }?> value="<?php echo $rel->zone_id;?>"><?php echo $rel->zone_name;?></option>
                          <?php } ?>
                        </select>
                        
                        <div id="">
                         <label>Select District </label>
                        <select class="form-control" name="t_district" id="dist">
                          <option value="">----Select----</option>
                           <?php if(@$row_dist->dist_name){ ?>
                    <option selected  value="<?php echo @$row_dist->dist_id;?>" ><?php echo @$row_dist->dist_name;?></option><?php } ?>
                         
                            <option></option>
                        </select>
                        </div>
                        <div id="">
                          <label>Select Local Centers *</label>
                        <select class="form-control" name="t_local" id="local">
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
                        <select class="form-control" name="t_district" id="dist">
                          <option value="">----Select----</option>
                         
                             <?php
                          foreach ($district as $rel) {
                          ?>
                          <option <?php  if($rel->dist_id == @$row->std_dis){?> selected <?php }?> value="<?php echo $rel->dist_id;?>"><?php echo $rel->dist_name;?></option>
                          <?php } ?>
                        </select>
                        </div>
                        <div id="">
                          <label>Select Local Centers *</label>
                        <select class="form-control" name="t_local" id="local">
                          <option value="">----Select----</option>
                          
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
                        <select class="form-control" name="t_local" id="local">
                          <option value="">----Select----</option>
                              <?php
                          foreach ($loc as $rel) {
                          ?>
                          <option <?php  if($rel->center_id == @$row->std_dis){?> selected <?php }?> value="<?php echo $rel->center_id;?>"><?php echo $rel->center_name;?></option>
                          <?php } ?>
                        </select>
                        </div>
            <?php
          }
         
            ?>



        

                
                </div>
                
                <!-- /.card-body -->
                <div>
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
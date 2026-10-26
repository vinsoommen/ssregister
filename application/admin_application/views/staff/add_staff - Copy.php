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
                  <label for="exampleInputEmail1">Enter  Staff Name*</label>
                  <input type="text" name="stf_name" required="required" class="form-control" id="stf_name" placeholder="Enter Staff Name "value="<?php echo @$row->name?>"  >

                

                  <label for="exampleInputEmail1">Enter Staff Designation*</label>
                  <select class="form-control" name="stf_desg"  required="required" id="stf_desg">
                    <option>---Select---</option>
                  

                    <?php if(@$row->designation){ ?>
                    <option selected  value="<?php echo @$row->designation;?>" ><?php echo @$row->designation;?></option><?php } ?>
                    <option value="Zone Admin">Zone Admin</option>
                    <option value="District Admin">District Admin</option>
                    <option value="Local Center Admin">Local Center Admin</option>
                  </select>

                       <label>Select Zone *</label>
                        <select class="form-control" name="zone" required="required" id="zone_id">
                          <option value="">----Select----</option>
                          <?php
                          foreach ($zone as $rel) {
                          ?>
                          <option <?php  if($rel->zone_id == @$row->zon_id){?> selected <?php }?> value="<?php echo $rel->zone_id;?>"><?php echo $rel->zone_name;?></option>
                          <?php } ?>
                        </select>
                        <div id="if_district">
                         <label>Select District </label>
                        <select class="form-control" name="district" id="dist">
                          <option value="">----Select----</option>
                           <?php if(@$row_dist->d_id){ ?>
                    <option selected  value="<?php echo @$row_dist->dis_id;?>" ><?php echo @$row_dist->dist_name;?></option><?php } ?>
                          
                            <option></option>
                        </select>
                        </div>
                        <div id="if_local">
                          <label>Select Local Centers *</label>
                        <select class="form-control" name="local" id="local">
                          <option value="">----Select----</option>
                          
                            <option></option>
                        </select>
                        </div>
                  <label for="exampleInputEmail1">Enter  Start Date: *</label>
                  <input type="date" name="start_date" required="required" class="form-control" id="stf_name" placeholder="Enter Start Date  "value="<?php echo @$row->start_date?>"  >
                   <label for="exampleInputEmail1">Enter  End Date: *</label>
                  <input type="date" name="end_date" required="required" class="form-control" id="stf_name" placeholder="Enter End Date  "value="<?php echo @$row->end_date?>"  >

                         <?php  
                   if(@$row->admin_pass==''){
                   ?>
                  <label for="exampleInputEmail1">Enter  Username*</label>
                  <input type="text" name="email" required="required" class="form-control" id="email" placeholder="Enter Username " value="<?php echo @$row->admin_Name?>" >
                   <label id="msg"></label><br>
                  
                  <label for="exampleInputEmail1">Enter  Password*</label>
                  <input type="password" name="password"  class="form-control" id="password" placeholder="Enter Password " value="<?php echo @$row->admin_Pass?>" >
                   <label for="exampleInputEmail1">Staff Image*</label><br>
                  <input type="file" name="image" id="image">
                <?php } ?>
                 
                </div>
                
                <!-- /.card-body -->
                <div>
                <button type="button" onclick="javascript:history.back()" class="btn btn-default">Back</button>
                <button type="submit" class="btn btn-primary" name="submit" id="submit"><?php echo $btn_label;?></button>
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
    
    // code for if hindhu
$(document).ready(function(){
$("#if_district").hide();
$("#if_local").hide();
  $("#stf_desg").change(function(){
    var desg=  this.value;;
   // alert(desg);
   // exit();
   if(desg == 'Zone Admin'){
     $("#if_district").hide();
     $("#if_local").hide();
}
else if(desg=='District Admin')
    {
        $("#if_district").show();
        $("#if_local").hide();
    }
    else
    {
       $("#if_district").show();
       $("#if_local").show();
    }
  });
});



// end code for hindhu
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
      $("#submit").attr('disabled', true);
      }
      else
      {
      $("#msg").css({"color":"green"});
      $("#msg").html("Congrates username available !"); 
      $("#submit").attr('disabled', false);
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
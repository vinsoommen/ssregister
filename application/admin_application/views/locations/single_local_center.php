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
              <!-- <div class="card-header">
                <h3 class="card-title"><?php echo $title;?></h3>
              </div> -->
              <!-- /.card-header -->
               <?php $this->load->view('theme/error_msg');?>
              <!-- form start -->
              
             
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1"> Location Name *</label>
                      <input type="text" name="local_center" required="required" class="form-control" id="" placeholder="Enter Location  Name" value="<?php echo @$row->center_name?>" disabled>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Select Zone </label>
                        <select class="form-control" name="zone" required="required" id="zone_id" disabled>
                          <option value="">-Select-</option>
                          <?php
                          foreach ($zone as $rel) {
                          ?>
                          <option <?php  if($rel->zone_id == @$row->z_id){?> selected <?php }?> value="<?php echo $rel->zone_id;?>"><?php echo $rel->zone_name;?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Select District</label>
                        <select class="form-control" name="district" id="dist" disabled>
                          <option value="">-Select-</option>
                           <?php if(@$row_dist->dist_name){ ?>
                    <option selected  value="<?php echo @$row_dist->dist_id;?>" ><?php echo @$row_dist->dist_name;?></option><?php } ?>
                            <option></option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Head of Institution Chairman/HOD/ Precident : *</label>
                      <input type="text" name="head_of_institution" required="required" class="form-control" id="" placeholder="Head of Institution Chairman/HOD/ Precident " value="<?php echo @$row->head_of_institution?>" disabled>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Phone Number :</label>
                        <input type="text" name="head_phone" class="form-control" placeholder="Phone Number" maxlength="10" value="<?php echo @$row->head_phone?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-group">
                       
                        <label>Location Address :</label>
                        <input type="text" name="head_location_add" class="form-control" placeholder="Location Address" value="<?php echo @$row->head_location_add?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-group">
                       
                        <label>Pincode :</label>
                        <input type="text" name="head_pincode" class="form-control" placeholder="Pincode" maxlength="6" value="<?php echo @$row->head_pincode?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                
                
                </div>
             
                <!-- <div>
                  <button type="button" onclick="javascript:history.back()" class="btn btn-default">Back</button>
                  <button type="submit" class="btn btn-primary"><?php echo $btn_label;?></button>
                </div> -->
                
              </div>
              <!-- /.card -->
            </div>
            <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              
              
              <div class="card-body">
               
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Head Master Name *</label>
                      <input type="text" name="master_name" required="required" class="form-control" id="" placeholder="Head Master Name " value="<?php echo @$row->master_name?>" disabled>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-group">
                        <label> Head Master Phone Number :</label>
                        <input type="text" name="master_phone" class="form-control" placeholder="Phone Number" maxlength="10" value="<?php echo @$row->master_phone?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-group">
                       
                        <label>Head Master Address :</label>
                        <input type="text" name="master_add" class="form-control" placeholder="Head Master Address" value="<?php echo @$row->master_add?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-group">
                       
                        <label>Pincode :</label>
                        <input type="text" name="master_pincode" class="form-control" placeholder="Pincode" maxlength="6" value="<?php echo @$row->master_pincode?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                
                </div>
             
                <!-- <div>
                  <button type="button" onclick="javascript:history.back()" class="btn btn-default">Back</button>
                  <button type="submit" class="btn btn-primary"><?php echo $btn_label;?></button>
                </div> -->
             
               
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
      });
      
      // caste Change

     
      
      </script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
      
    
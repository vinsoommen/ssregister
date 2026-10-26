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
              <?php echo form_open($action, ['id' => 'quickForm']);?>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter  District Name *</label>
                  <input type="text" name="district" required="required" class="form-control" id="" placeholder="Enter  District Name "  value="<?php echo @$row->dist_name?>" >
                </div>
                <div class="form-group">
                    <label>Select Zone</label>
                    <select class="form-control" name="zone_id" required="required">
                      <option value="">-Select-</option>
                      <?php
                      foreach ($zone as $z) {

                      ?>
                      <option <?php  if($z->zone_id == @$row->zoneId){?> selected <?php }?> value="<?php echo $z->zone_id;?>"><?php echo $z->zone_name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter  President Name *</label>
                  <input type="text" name="pre_name" required="required" class="form-control" id="" placeholder="Enter  President Name "  value="<?php echo @$row->dist_pre_name?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter  President Phone Number *</label>
                  <input type="text" name="pre_phone" required="required" class="form-control" id="" placeholder="Enter  President Phone "  value="<?php echo @$row->dist_pre_phone?>" maxlength="10">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter Secretary Name *</label>
                  <input type="text" name="sec_name" required="required" class="form-control" id="" placeholder="Enter  Secretary Name "  value="<?php echo @$row->dist_sec_name?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter  Secretary Phone Number  *</label>
                  <input type="text" name="sec_phone" required="required" class="form-control" id="" placeholder="Enter  Secretary Phone Number "  value="<?php echo @$row->dist_sec_phone?>" maxlength="10">
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
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
            
              <!-- form start -->
         
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter  Zone Name *</label>
                  <input type="text" name="zone" required="required" class="form-control" id="" placeholder="Enter  Zone Name "  value="<?php echo @$row->zone_name?>" disabled >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter President Name *</label>
                  <input type="text" name="pre_name" required="required" class="form-control" id="" placeholder="Enter President Name "  value="<?php echo @$row->zon_pre_name?>"disabled >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter President Phone Number *</label>
                  <input type="text" name="pre_phone" required="required" class="form-control" id="" placeholder="Enter  President Phone Number "  value="<?php echo @$row->zon_pre_phone?>" disabled>

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter Secretory Name *</label>
                  <input type="text" name="zon_sce_name" required="required" class="form-control" id="" placeholder="Enter Secretory Name "  value="<?php echo @$row->zone_name?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter Secretory Phone Number *</label>
                  <input type="text" name="sec_phone" required="required" class="form-control" id="" placeholder="Enter  Secretory Phone Number "  value="<?php echo @$row->zon_sec_phone?>" disabled>
                  
                </div>
                <!-- /.card-body -->
                
               
              </div>

              <!-- /.card -->
            </div>

            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
            </div>
            <!--/.col (right) -->
          </div>
           <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
             
              <!-- /.card-header -->
             
              <!-- form start -->
              
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter  Join Secretory Name *</label>
                  <input type="text" name="jsec_name" required="required" class="form-control" id="" placeholder="Enter  Join Secretory Name "  value="<?php echo @$row->zon_jsce_name?>"disabled >
                </div>
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter Join Secretory Phone Number *</label>
                  <input type="text" name="jsec_phone" required="required" class="form-control" id="" placeholder="Enter  Join Secretory Phone Number "  value="<?php echo @$row->zon_jsec_phone?>" disabled>

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter Treasurer Name *</label>
                  <input type="text" name="tre_name" required="required" class="form-control" id="" placeholder="Enter Treasurer Name "  value="<?php echo @$row->zon_tre_name?>" disabled>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter Treasurer Phone Number *</label>
                  <input type="text" name="tre_phone" required="required" class="form-control" id="" placeholder="Enter  Treasurer Phone Number "  value="<?php echo @$row->zon_tre_phone?>"disabled >
                  
                </div>
                <!-- /.card-body -->
                
                
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
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
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title;?></h3>
              </div>
              <!-- /.card-header -->
              <?php $this->load->view('theme/error_msg');?>
              <!-- form start -->
              <?php
              echo form_open($action, array('id' => 'quickForm'));
              ?>
              <div class="card-body">
                <div class="row">
              <!--     <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name *</label>
                      <input type="text" name="pname" required="required" class="form-control" id="pname" placeholder="Enter Product Name" value="<?php echo @$row->product_name?>">
                    </div>
                  </div>
                </div> -->
            
                
                  
                  
                
                
                
                
              
               
                <div class="row">
                  <div class="col-md-2">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Enter Name</label>
                        <!-- <label for="exampleInputEmail1">Name </label> -->
                      <input type="text" name="name"  class="form-control" id="name" placeholder="Enter  Name" >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Select Class</label>
                        <select class="form-control" name="class" >
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
                 <div class="col-md-2">
                    <div class="form-group">
                      <div class="form-group">
                         <label>Select Zone </label>
                        <select class="form-control" name="std_zone"  id="zone_id">
                          <option value="">----Select----</option>
                          <?php
                          foreach ($zone as $rel) {
                          ?>
                          <option <?php  if($rel->zone_id == @$row->std_zone){?> selected <?php }?> value="<?php echo $rel->zone_id;?>"><?php echo $rel->zone_name;?></option>
                          <?php } ?>
                        </select>

                      </div>

                    </div>
                  </div>
               <div class="col-md-2">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Select District </label>
                        <select class="form-control" name="std_district" id="dist">
                          <option value="">----Select----</option>
                         
                            <option></option>
                        </select>

                      </div>

                    </div>
                  </div>
                <div class="col-md-2">
                    <div class="form-group">
                      <div class="form-group">
                        <label>Select Local Center</label>
                        <select class="form-control" name="std_local" id="local">
                          <option value="">----Select----</option>
                          
                            <option></option>
                        </select>

                      </div>

                    </div>
                  </div>
              
             
                  
              
                <div> <br>&nbsp;
                  <button type="submit" class="btn btn-primary" id="search" ><?php echo $btn_label;?></button>&nbsp;&nbsp;
                  <!-- <button type="button"   id="print" class="btn btn-default">Print</button>&nbsp; -->

                  <button id="btnExport"   value="Export" ><i class="fa fa-download" aria-hidden="true"></i> Export</button>

                  <?php
                   
                    $nucrand= time();
                    ?>
                    <script src="<?php echo $this->config->item('assets_url');?>js/table2excel.js" type="text/javascript"></script>
<script type="text/javascript">
        $(function () {
            $("#btnExport").click(function () {
                $("#tblCustomers").table2excel({
                    filename: "<?php echo  $nucrand; ?>.xls"
                });
            });
        });
    </script>
                  
                </div>
                <?php echo form_close();?>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <?php 
            if($result){
            ?>
            <div class="col-md-12" id="result">
              <div id="tableWrap">
               <h3>Search Result</h3>

               <div class="card-body table-responsive p-0">
                <table class="table table-hover" id="tblCustomers">
                  <thead>
                    <tr>
                     <th>No.</th>
        <th>Image</th>
        <th>Student Name</th>
        <th>Register Number</th>
        <th>Aadhaar Number</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Medium</th>
        <th>Standard </th>
        <th>Age</th>
        <th>Zone</th>
        <th>District</th>
        <th>Local Center</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // print_r($result);exit();
                    $i=1;
                    foreach($result as $std){
                    ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td style="width: 10%;"><img style="width: 75%;" alt="<?php echo $std->std_name?>" src="<?php echo $this->config->item('image_url')?>student/<?php echo $std->std_photo?>"/></td>
                     <td><?php echo $std->std_name?></td>
        <td><?php echo $std->std_reg_no?></td>
        <td><?php echo $std->std_id_proof?></td>
        <td><?php echo $std->std_phone?></td>
        <td><?php echo $std->std_gender?></td>
        <td><?php echo $std->std_medium?></td>
        <td><?php echo $std->class_name?></td>
                      <td>
                        <?php  
                        $dob=$std->std_dob;
                        $year = (date('Y') - date('Y',strtotime($dob)));
                          echo $year;
                        ?>
                      </td>
                      <td><?php echo $std->zone_name?></td>
                      <td><?php echo $std->dist_name?></td>
                      <td><?php echo $std->center_name?></td>
                    
                    
                    
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
           </div>
         <?php 
       }
       else{
        echo "No Result";
       } ?>
          </div>
       
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>

<script type="text/javascript">
  
// $(document).ready(function(){
// $("#result").hide();
// $("#search").click(function(){
//   $("#result").show();
// });

// });
</script>

<script type="text/javascript">
$(function(){
    $('#print').click(function(){
        var url='data:application/vnd.ms-excel,' + encodeURIComponent($('#tableWrap').html()) 
        location.href=url
        return false
    })
})
</script>

      <script type="text/javascript">
      $(document).ready(function(){
      // Category Change
      $('#cat_id').change(function(){
      var cat_id = $(this).val();
      $.ajax({
      url:"<?php echo base_url('subcategory/get_scat'); ?>",
      method:"POST",
      data:{cat_id:cat_id},
      dataType: 'json',
      success: function(response) {
      $('#subcategory').find('option').not(':first').remove();
      // Add options
      $.each(response,function(key,value){
      $('#subcategory').append('<option value="'+value.id+'">'+value.scname+'</option>');
      });
      }
      });
      });
      // Type Change
      $('#type').change(function(){
      var type_id = $(this).val();
      $.ajax({
      url:"<?php echo base_url('product_type/get_type_qty'); ?>",
      method:"POST",
      data:{type_id:type_id},
      dataType: 'json',
      success: function(response) {
      $('#type_qty').find('option').not(':first').remove();
      // Add options
      $.each(response,function(key,value){
      $('#type_qty').append('<option value="'+value.type_qty+' '+value.unit+'">'+value.type_qty+' '+value.unit+'</option>');
      });
      }
      });
      });
      });
      </script>

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
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
      <script>
      $(document).ready(function(){
      $('#date-pick').datepicker({
      format: 'yyyy-mm-dd',
      todayHighlight: true,
      autoclose: true,
      startDate: new Date(),
      ignoreReadonly: true,
      allowInputToggle: true
      })

      $('#start_date').datepicker({
      format: 'yyyy-mm-dd',
      todayHighlight: true,
      autoclose: true,
      startDate: new Date(),
      ignoreReadonly: true,
      allowInputToggle: true
      }).on('changeDate', function (selected) {
      var minDate = new Date(selected.date.valueOf());
      $('#end_date').datepicker('setStartDate', minDate);
      $('#end_date').datepicker('setDate', minDate); // <--THIS IS THE LINE ADDED
      });

      $('#end_date').datepicker({
      format: 'yyyy-mm-dd',
      todayHighlight: true,
      autoclose: true,
      startDate: new Date(),
      ignoreReadonly: true,
      allowInputToggle: true
      })

      })
      </script>
      <script>
      $(function () {
      // Summernote
      $('#summernote').summernote()
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
      });
      })
      </script>
      <script>
      $(document).ready(function(){
      $(".add-row").click(function(){
      var $tableBody = $('#tbl').find("tbody"),
      $trLast = $tableBody.find("tr:last"),
      $trNew = $trLast.clone();
      $trLast.after($trNew);
      $trNew.find("input:text").val("").end();
      $trNew.find("input:hidden").val("").end();
      $trNew.find("select").val("").end();
      });
      // Find and remove selected table rows
      $(".delete-row").click(function(){
      $("table tbody").find('input[name="record"]').each(function(){
      if($(this).is(":checked")){
      $(this).parents("tr").remove();
      }
      });
      });
      });
      </script>
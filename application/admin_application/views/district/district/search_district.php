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
                <div class="col-md-12">
        
              
               
                <div class="row">
                 
                
                 <div class="col-md-4">
                    <div class="form-group">
                      <div class="form-group">
                         <label>Select Zone </label>
                        <select class="form-control" name="zone"  id="zone_id">
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
               <div class="col-md-4">
                    <div class="form-group">
                      <div class="form-group">
                       <!--  <label>Select District </label>
                        <select class="form-control" name="district" id="dist">
                          <option value="">----Select----</option>
                         
                            <option></option>
                        </select> -->

                        <label>Enter District</label>
                         <input type="text" name="district"  class="form-control" id="name" placeholder="Enter District  Name" >
                      </div>

                    </div>
                  </div>
           
             
                  
              &nbsp; &nbsp;<br>
                <div> 
                  <button type="submit" class="btn btn-primary" id="search" ><?php echo $btn_label;?></button>&nbsp;&nbsp;
                  <!-- <button type="button"   id="print" class="btn btn-default">Print</button>&nbsp; -->
                  
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
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>District  Name</th>
                      <th>Zone</th>
                      <th>President</th>
                      <th>President Phone</th>
                      <th>Secretory</th>
                      <th>Secretory Phone</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    foreach ($result as $dt) {
                    ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $dt->dist_name?></td>
                      <td><?php echo $dt->zone_name?></td>
                      <td><?php echo $dt->dist_pre_name?></td>
                      <td><?php echo $dt->dist_pre_phone?></td>
                      <td><?php echo $dt->dist_sec_name?></td>
                      <td><?php echo $dt->dist_sec_phone?></td>
                      <td>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <input type="checkbox" class="custom-control-input active-inactive" id="customSwitch<?php echo $dt->dist_id?>" <?php echo ($dt->dist_status)?'checked':'';?> data-target="<?php echo $this->config->item('base_url')."district/active_inactive/".$this->common_functions->url_encode($dt->dist_id)."/"?><?php echo ($dt->dist_status)?0:1?>">
                          <label class="custom-control-label" for="customSwitch<?php echo $dt->dist_id?>"></label>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo $this->config->item('base_url')."district/edit/".$this->common_functions->url_encode($dt->dist_id)?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                          <a href="<?php echo $this->config->item('base_url')."district/delete/".$this->common_functions->url_encode($dt->dist_id)?>" class="btn btn-danger delete"><i class="fas fa-trash"></i></a>
                        </div>
                      </td>
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
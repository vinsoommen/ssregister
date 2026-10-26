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
<style>
.serchbox{
float:right;
overflow: hidden;
background: #CCC;
position: fixed;
display:none;
z-index: 999;
right:0;
width:25%;
}
.serchbox .srchclose_btn{
float:right;
}
.card-title.search{
width:100%;
}
/* Add padding and border to inner content
for better animation effect */

</style>
<!-- Search Area -->
<div class="serchbox">
<section class="content">
<div class="container-fluid">
<div class="">
<!-- left column -->
<div>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title search">Search <a href="javascript:void(0);" class="srchclose_btn">X</a></h3>
	</div>
	<?php $this->load->view('theme/error_msg');?>
	<?php echo form_open('product', ['id' => 'searchArea']);?>
	<div class="card-body">
		<div class="form-group">
			<label for="exampleInputEmail1">Name</label>
			<input type="text" name="name"  class="form-control" id="name" placeholder="Enter Student Name" value="<?php echo @$search_ary['pname']?>">
			 <div id="display" class="pop"></div>
		</div>
		<!-- <div class="form-group">
			<label>Expiry Date *</label>
			<input type="text" name="expiry_date_start" class="form-control" id="date-pick" value="<?php echo @$search_ary['expiry_date_start']?>">
			~
			<input type="text" name="expiry_date_end" class="form-control" id="date-pick2" value="<?php echo @$search_ary['expiry_date_end']?>">
		</div> -->
		<<!-- div class="form-group">
			<label>Select Brand</label>
			<select class="form-control" name="brand" id="brand">
				<option value="">-Select-</option>
				<?php
				foreach ($brand as $brand) {
				?>
				<option <?php  if($brand->id == @$search_ary['brand']){?> selected <?php }?> value="<?php echo $brand->id;?>"><?php echo $brand->brand;?></option>
				<?php } ?>
			</select>
		</div> -->
	</div>
	<div class="card-footer">
		<button type="submit" class="btn btn-default" name="clear" value="clear">Clear</button>
		<button type="submit" class="btn btn-primary" name="search" value="search">Search</button>
	</div>
	<?php echo form_close();?>
</div>
</div>
<div class="col-md-6">
</div>
</div>
</div>
</section>
</div>
<!-- Search Area End  -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">

<!-- /.row -->
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
	<div class="btn-group">
		<a href="<?php echo base_url('teacher/add'); ?>">
			<span class="btn btn-primary col fileinput-button dz-clickable">
				<i class="fas fa-plus"></i>
				<span>Add New</span>
			</span>
		</a>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?php echo base_url('teacher/search'); ?>" >
			<span class="btn btn-primary col fileinput-button dz-clickable">
				<i class="fas fa-search"></i>
				<span>Search</span>
			</span>
		</a>
	</div>
	<div class="card-tools">
		<?php echo $links?>
		
	</div>
</div>
<!-- /.card-header -->
<?php $this->load->view('theme/error_msg');?>
<div class="card-body table-responsive p-0">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>No.</th>
				<th>Teacher Name</th>
				
				<th>Age</th>
			
				
				<th>Standard </th>
				<th>Qualification</th>
				
				<th>Zone</th>
				<th>District</th>
				<th>Local Center</th>
				<th>Status</th>
				
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// print_r($result);exit();
			$i=1;
			foreach($result as $thr){
			?>
			<tr>
				<td><?php echo $i++;?></td>
				<!-- <td style="width: 10%;"><img style="width: 75%;" alt="<?php echo $std->std_name?>" src="<?php echo $this->config->item('image_url')?>student/<?php echo $std->std_photo?>"/></td> -->
				<td><?php echo $thr->t_name?></td>
				
				<td><?php echo $thr->t_age?></td>
			
				
				<td><?php echo $thr->class_name?></td>
				<td><?php echo $thr->t_qualification?></td>
				<td><?php echo $thr->zone_name?></td>
				<td><?php echo $thr->dist_name?></td>
				<td><?php echo $thr->center_name?></td>
				<td>
					<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
						<input type="checkbox" class="custom-control-input active-inactive" id="customSwitch<?php echo $thr->t_status?>" <?php echo ($thr->t_status)?'checked':'';?> data-target="<?php echo $this->config->item('base_url')."teacher/active_inactive/".$this->common_functions->url_encode($thr->t_id)."/"?><?php echo ($thr->t_status)?0:1?>">
						<label class="custom-control-label" for="customSwitch<?php echo $thr->t_status?>"></label>
					</div>
				</td>
			
				<td>
					<div class="btn-group btn-group-sm">
						
						<a href="<?php echo $this->config->item('base_url')."teacher/view/".$this->common_functions->url_encode($thr->t_id)?>" class="btn btn-warning"><i class="nav-icon far fa-eye"></i></a> 
						<a href="<?php echo $this->config->item('base_url')."teacher/edit/".$this->common_functions->url_encode($thr->t_id)?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
						<a href="<?php echo $this->config->item('base_url')."teacher/delete/".$this->common_functions->url_encode($thr->t_id)?>" class="btn btn-danger delete"><i class="fas fa-trash"></i></a>
					</div>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>
<!-- /.row -->

<!-- /.row -->

<!-- /.row -->

<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
$(document).ready(function(){
$(".slide-toggle").click(function(){
$(".serchbox").animate({
width: "toggle"
});
});

$(".srchclose_btn").click(function(){
$(".serchbox").animate({
width: "toggle"
});
});
});
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
$(document).ready(function(){
var date_input=$('#date-pick'); //our date input has the name "date"
date_input.datepicker({
format: 'yyyy-mm-dd',
todayHighlight: true,
autoclose: true,
startDate: new Date(),
ignoreReadonly: true,
allowInputToggle: true
})
var date_input=$('#date-pick2'); //our date input has the name "date"
date_input.datepicker({
format: 'yyyy-mm-dd',
todayHighlight: true,
autoclose: true,
startDate: new Date(),
ignoreReadonly: true,
allowInputToggle: true
})
})
</script>

<script type="text/javascript">
function fill(Value)
{
$('#name').val(Value);
$('#display').hide();
}

$(document).ready(function(){
$("#name").keyup(function() {
var name = $('#name').val();
// alert(name);exit();
if(name=="")
{
$("#display").html("");
}
else
{
$.ajax({
method: "POST",
url: "<?php echo base_url('students/search_student_by_name'); ?>",
data:{name:name},
dataType: 'json',
success: function(response) {
alert(response);
$("#display").html(html).show();
}
});
}
});
});
</script>
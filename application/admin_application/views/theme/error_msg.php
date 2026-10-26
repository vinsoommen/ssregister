


<?php  if($this->session->flashdata('success_msg')){ ?>
<div class="alert alert-success alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="icon fas fa-check"></i><?php echo $this->session->flashdata('success_msg');?>
</div>
<?php }
  if(isset($_SESSION['success_msg'])){
            unset($_SESSION['success_msg']);
        }
if($this->session->flashdata('error_msg')){ 
	?>

<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="icon fas fa-ban"></i><?php echo $this->session->flashdata('error_msg');?>
</div>
<?php } 
if(isset($_SESSION['error_msg'])){
            unset($_SESSION['error_msg']);
        }
  if(validation_errors()){ ?>
	<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<?php echo validation_errors();?>
</div>
<?php } ?>
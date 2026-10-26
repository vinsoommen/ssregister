<!-- Content Wrapper. Contains page content  -->
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
				
				<!-- /.row -->
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<div class="btn-group">
									<a href="<?php echo base_url('zone/add'); ?>">
										<span class="btn btn-primary col fileinput-button dz-clickable">
											<i class="fas fa-plus"></i>
											<span>Add New</span>
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
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th>No.</th>
											<th>Zone  Name</th>
											<th>President</th>
											<th>Secretory</th>
											<th>Join Secretory</th>
											<th>Treasurer</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i=1;
										foreach ($result as $zn) {
										?>
										<tr>
											<td><?php echo $i++;?></td>
											<td><?php echo $zn->zone_name?></td>
											<td><?php echo $zn->zon_pre_name?></td>
											<td><?php echo $zn->zon_sce_name?></td>
											<td><?php echo $zn->zon_jsce_name?></td>
											<td><?php echo $zn->zon_tre_name?></td>
											<td>
												<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
													<input type="checkbox" class="custom-control-input active-inactive" id="customSwitch<?php echo $zn->zone_id?>" <?php echo ($zn->zone_status)?'checked':'';?> data-target="<?php echo $this->config->item('base_url')."zone/active_inactive/".$this->common_functions->url_encode($zn->zone_id)."/"?><?php echo ($zn->zone_status)?0:1?>">
													<label class="custom-control-label" for="customSwitch<?php echo $zn->zone_id?>"></label>
												</div>
											</td>
											<td>
												<div class="btn-group btn-group-sm">
													<a href="<?php echo $this->config->item('base_url')."zone/single_zone/".$this->common_functions->url_encode($zn->zone_id)?>" class="btn btn-warning"><i class="nav-icon far fa-eye"></i></a> 
													<a href="<?php echo $this->config->item('base_url')."zone/edit/".$this->common_functions->url_encode($zn->zone_id)?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
													<a href="<?php echo $this->config->item('base_url')."zone/delete/".$this->common_functions->url_encode($zn->zone_id)?>" class="btn btn-danger delete"><i class="fas fa-trash"></i></a>
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
		<!-- /.content-wrapper
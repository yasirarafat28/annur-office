
				<?php $this->load->view('admin/inc/header.php');?>

				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle"><?php echo $panel_name.' | '.$page_name; ?></h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span><?php echo $panel_name; ?></span>
									</li>
									<li class="active">
										<span><?php echo $page_name; ?></span>
									</li>
							</div>
						</section>

						<div class="alert-container">
							<?php if($this->session->flashdata('success')){ ?>
						        <div class="alert alert-success">
						            <a href="#" class="close" data-dismiss="alert">&times;</a>
						            <strong><i class="fa fa-check-circle" style="color: green;"></i>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
						        </div>

						    <?php } else if($this->session->flashdata('error')){  ?>

						        <div class="alert alert-danger">
						            <a href="#" class="close" data-dismiss="alert">&times;</a>
						            <strong><i class="fa fa-times-circle" style="color: darkred;"></i>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
						        </div>

						    <?php } else if($this->session->flashdata('warning')){  ?>

						        <div class="alert alert-warning">
						            <a href="#" class="close" data-dismiss="alert">&times;</a>
						            <strong><i class="fa fa-warning" style="color: red;"></i>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
						        </div>

						    <?php } else if($this->session->flashdata('info')){  ?>

						        <div class="alert alert-info">
						            <a href="#" class="close" data-dismiss="alert">&times;</a>
						            <strong><i class="fa fa-info-circle" style="color: lightblue;"></i>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
						        </div>
						    <?php } ?>
						</div>

						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<div>

	          							<form class="form-inline" method="GET">
										    <div class="form-group">
										      <a href="<?php echo site_url(); ?>admin/teachers/create" class=" btn btn-primary form-control" title="Add New teacher" style="border-radius: 0px"><i class="fa fa-plus" aria-hidden="true"></i> Add New teacher</a> 
										    </div>
										    
										  </form>


											<p style="color:red;"><?php echo isset($_SESSION['msg'])?$_SESSION['msg']:'';?></p>
										
									</div>

									<table class="table table-bordered table-striped table-hover  dataTable" id="example" >
										<thead>
											<tr>
												<th class="center">#</th>
												<th>Full Name</th>
												<th>Designation</th>
												<th>Adress</th>
												<th>Phone </th>
												<th>Action</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$cnt=1;
											foreach($teachers as $row)
											{
											?>
											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['name'];?></td>
												<td><?php echo $row['designation'];?></td>
												<td><?php echo $row['present_address'];?></td>
												<td><?php echo $row['phone'];?>
												</td>
												<td style="width: 10%">

													<a href="<?php echo site_url(); ?>admin/teachers/edit/<?php echo $row['teacher_id']; ?>"  title="Edit" class="btn btn-success btn-xs tooltips"><i class="fa fa-pencil"></i></a>

													<a href="<?php echo site_url(); ?>admin/teachers/show/<?php echo $row['teacher_id']; ?>" class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="View"><i class="fa fa-eye"></i></a>

													<a href="<?php echo site_url(); ?>admin/teachers/delete/<?php echo $row['teacher_id']; ?>" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="Remove"><i class="fa fa-times fa fa-white"></i></a>
													
												</td>
											</tr>

											<?php
												$cnt=$cnt+1;
											 }

											 ?>


										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php  $this->load->view('admin/inc/footer.php');?>?>



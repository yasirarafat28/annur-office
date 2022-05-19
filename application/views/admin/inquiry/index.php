
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

									<table class="table table-bordered table-striped table-hover  dataTable" id="example" >
										<thead>
											<tr>
												<th class="center">#</th>
												<th>Name</th>
												<th>Phone</th>
												<th>Email</th>
												<th>Timestamp</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$cnt=1;
											foreach($inquiries as $row)
											{
											?>
											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['name'];?></td>
												<td class="hidden-xs"><?php echo $row['phone'];?></td>
												<td class="hidden-xs"><?php echo $row['email'];?></td>
												<td class="hidden-xs"><?php echo $row['created_at'];?></td>
												<td>
													<!--Row Delete Start -->
													<a href="<?php echo site_url(); ?>admin/inquiry/delete/<?php echo $row['id'];?>" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="Remove"><i class="fa fa-times fa fa-white"></i></a>

													<!--Row Delete End -->

									                <!--Row View Start-->


													<a  data-toggle="modal" data-target="#modal-view<?php echo $row['id'];?>" class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="View"><i class="fa fa-eye"></i></a>

										            <!-- Modal -->
										            <div class="modal fade" id="modal-view<?php echo $row['id'];?>">
										              <div class="modal-dialog">
										                <div class="modal-content">
										                  <div class="modal-header">
										                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										                      <span aria-hidden="true">&times;</span></button>
										                    <h4 class="modal-title">View Inquiry</h4>
										                  </div>
										                  <div class="modal-body">
										                  	<table class="table">
										                  		<tr>
										                  			<td>Name</td>
										                  			<td><?php echo $row['name'] ?></td>
										                  		</tr>
										                  		<tr>
										                  			<td>Phone</td>
										                  			<td><?php echo $row['phone'] ?></td>
										                  		</tr>
										                  		<tr>
										                  			<td>Email</td>
										                  			<td><?php echo $row['email'] ?></td>
										                  		</tr>
										                  		<tr>
										                  			<td>message</td>
										                  			<td><?php echo $row['message'] ?></td>
										                  		</tr>
										                  		<tr>
										                  			<td>Timestamp</td>
										                  			<td><?php echo $row['created_at'] ?></td>
										                  		</tr>
										                  	</table>
									                      </div>                    
									                    </div>
									                    <!-- /.modal-content -->
									                  </div>
									                  <!-- /.modal-dialog -->
									                </div>


									                <!--Row View End-->
												</td>
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




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
										      <a  data-toggle="modal" data-target="#modal-create" href="" class=" btn btn-primary form-control" title="Add New Notice" style="border-radius: 0px"><i class="fa fa-plus" aria-hidden="true"></i> Add New Notice</a>
										    </div>
										  </form>


											<p style="color:red;"><?php isset($page_message)?$page_message:'';?></p>
										
									</div>

									<table class="table table-bordered table-striped table-hover  dataTable" id="example" >
										<thead>
											<tr>
												<th class="center">#</th>
												<th>Notice Title</th>
												<th>Notice</th>
												<th>Status</th>
												<th>Action</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$cnt=1;
											foreach($notices as $row)
											{
											?>
											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['notice_title'];?></td>
												<td><?php echo $row['notice'];?></td>
												<td><?php echo $row['status']?'Active':'';?></td>
												<td style="8%">
													<!--Row Delete Start -->
													<a href="<?php echo site_url(); ?>admin/noticeboard/delete/<?php echo $row['notice_id'];?>" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="Remove"><i class="fa fa-times fa fa-white"></i></a>

													<!--Row Delete End -->

													<!-- Row Edit Start-->

													<a  data-toggle="modal" data-target="#modal-edit<?php echo $row['notice_id'];?>"  href="" class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>


										            <!-- Modal -->
										            <div class="modal fade" id="modal-edit<?php echo $row['notice_id'];?>">
										              <div class="modal-dialog">
										                <div class="modal-content">
										                  <div class="modal-header">
										                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										                      <span aria-hidden="true">&times;</span></button>
										                    <h4 class="modal-title">Update Notice</h4>
										                  </div>
										                  <div class="modal-body">
										     
									                        <form method="POST" action="<?php echo site_url(); ?>admin/noticeboard/update/<?php echo $row['notice_id'];?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

									                            
								                            	<div class="form-group ">
								                                    <label for="name" class="col-md-4 control-label">Notice Title</label>
								                                    <div class="col-md-6">
								                                        <input class="form-control" name="notice_title" type="text" id="name" value="<?php echo $row['notice_title']; ?>">
								                                        
								                                    </div>
								                                </div>
								                                <div class="form-group ">
								                                    <label for="name" class="col-md-4 control-label">Notice</label>
								                                    <div class="col-md-6">
								                                        <textarea rows="15" class="form-control" name="notice" type="text"><?php echo $row['notice']; ?></textarea>
								                                    </div>
								                                </div>

								                                <div class="form-group">
								                                    <div class="col-md-offset-4 col-md-8">
								                                        <input class="btn btn-primary btnusercreate btnper" type="submit" value="Create">
								                                    </div>
								                                </div>

									                            </form>
									                      </div>                    
									                    </div>
									                    <!-- /.modal-content -->
									                  </div>
									                  <!-- /.modal-dialog -->
									                </div>

									                <!--Row Edit End-->


									                <!--Row View Start-->


													<a  data-toggle="modal" data-target="#modal-view<?php echo $row['notice_id'];?>" class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="View"><i class="fa fa-eye"></i></a>

										            <!-- Modal -->
										            <div class="modal fade" id="modal-view<?php echo $row['notice_id'];?>">
										              <div class="modal-dialog">
										                <div class="modal-content">
										                  <div class="modal-header">
										                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										                      <span aria-hidden="true">&times;</span></button>
										                    <h4 class="modal-title">View Notice</h4>
										                  </div>
										                  <div class="modal-body">
										     
									                        <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

								                            	<div class="form-group ">
								                                    <label for="name" class="col-md-4 control-label">Notice Title</label>
								                                    <div class="col-md-6">
								                                        <p class="form-control"><?php echo $row['notice_title'] ?></p>
								                                        
								                                    </div>
								                                </div>
								                                <div class="form-group ">
								                                    <label for="name" class="col-md-4 control-label">Notice</label>
								                                    <div class="col-md-6">
								                                        <p ><?php echo $row['notice'] ?></p>
								                                    </div>
								                                </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Created Date </label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['created_at'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Updated Date</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['updated_at'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
								                                <div class="form-group ">
								                                    <label for="password" class="col-md-4 control-label">Status</label>
								                                    <div class="col-md-6">
								                                    	<p class="form-control"><?php echo $row['status']==1? 'Active' :'Inactive' ?></p>
								                                        
								                                    </div>
								                                </div>

									                            </form>
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



						            <!-- Modal -->
						            <div class="modal fade" id="modal-create">
						              <div class="modal-dialog">
						                <div class="modal-content">
						                  <div class="modal-header">
						                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                      <span aria-hidden="true">&times;</span></button>
						                    <h4 class="modal-title">Create New Notice</h4>
						                  </div>
						                  <div class="modal-body">
						     
						                        <form method="POST" action="<?php echo site_url(); ?>admin/noticeboard/store/" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

						                            	<div class="form-group ">
						                                    <label for="name" class="col-md-4 control-label">Notice Title</label>
						                                    <div class="col-md-6">
						                                        <input class="form-control" name="notice_title" type="text" id="name">
						                                        
						                                    </div>
						                                </div>
						                                <div class="form-group ">
						                                    <label for="name" class="col-md-4 control-label">Notice</label>
						                                    <div class="col-md-6">
						                                        <textarea rows="15" class="form-control" name="notice" type="text"></textarea>
						                                    </div>
						                                </div>

						                                <div class="form-group">
						                                    <div class="col-md-offset-4 col-md-8">
						                                        <input class="btn btn-primary btnusercreate btnper" type="submit" value="Create">
						                                    </div>
						                                </div>

						                            </form>
						                      </div>                    
						                    </div>
						                    <!-- /.modal-content -->
						                  </div>
						                  <!-- /.modal-dialog -->
						                </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			

	<?php  $this->load->view('admin/inc/footer.php');?>?>



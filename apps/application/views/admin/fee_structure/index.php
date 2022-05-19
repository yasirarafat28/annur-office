
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
										      <a  data-toggle="modal" data-target="#modal-create" href="" class=" btn btn-primary form-control" title="Add New Fee Structure" style="border-radius: 0px"><i class="fa fa-plus" aria-hidden="true"></i> Add New Fee Structure</a>
										    </div>
										  </form>


											<p style="color:red;"><?php echo isset($_fee_structure['msg'])?$_fee_structure['msg']:'';?></p>
										
									</div>

									<table class="table table-bordered table-striped table-hover  dataTable" id="example" >
										<thead>
											<tr>
												<th class="center">#</th>
												<th>Student Name</th>
												<th>Class Name</th>
												<th>Admission Fee</th>
												<th>Tution Fee</th>
												<th>Breakfast Fee </th>
												<th>Exam Fee </th>
												<th>Action</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$cnt=1;
											foreach($stuctures as $row)
											{
											?>
											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['student_name'];?></td>
												<td class="hidden-xs"><?php echo $row['class_name'];?></td>
												<td><?php echo $row['addmission_fee'];?></td>
												<td><?php echo $row['tution_fee'];?></td>
												<td><?php echo $row['breakfast_fee'];?>
												<td><?php echo $row['exam_fee'];?>
												</td>
												<td >
													<!--Row Delete Start -->
													<a href="<?php echo site_url(); ?>admin/fee_structure/delete/<?php echo $row['fee_structure_id'];?>" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="Remove"><i class="fa fa-times fa fa-white"></i></a>

													<!--Row Delete End -->

													<!-- Row Edit Start-->

													<a  data-toggle="modal" data-target="#modal-edit<?php echo $row['fee_structure_id'];?>"  href="" class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>


										            <!-- Modal -->
										            <div class="modal fade" id="modal-edit<?php echo $row['fee_structure_id'];?>">
										              <div class="modal-dialog">
										                <div class="modal-content">
										                  <div class="modal-header">
										                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										                      <span aria-hidden="true">&times;</span></button>
										                    <h4 class="modal-title">Edit Fee Structure</h4>
										                  </div>
										                  <div class="modal-body">
										     
									                        <form method="POST" action="<?php echo site_url(); ?>admin/fee_structure/update/<?php echo $row['fee_structure_id'];?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

									                            <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Class</label>
			                                                        <div class="col-md-6">
			                                                            <select class="form-control"  onchange="get_student_list_by_class(this.value)">
			                                                                <option disabled="disabled">Select Class</option>
			                                                                <?php foreach ($classes as $item) : ?>
			                                                                <option value="<?php echo $item['class_id']; ?>"  <?php echo  $item['class_id']==$row['class_id'] ?'selected': '' ?>><?php echo $item['name']; ?></option>
			                                                              <?php endforeach; ?>
			                                                            </select>
			                                                              
			                                                        </div>
			                                                    </div>			                            
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Student</label>
			                                                        <div class="col-md-6">
			                                                            <select class="form-control" name="student_id" id="student_id-update">
			                                                            	<option value="<?php echo $row['student_id']; ?>"><?php echo $row['student_name']; ?></option>
			                                                            </select>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Admission Fee</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="addmission_fee" type="number" id="name" value="<?php echo $row['addmission_fee'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Tuition Fee</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="tution_fee" type="number" id="name" value="<?php echo $row['tution_fee'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Service Fee</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="service_fee" type="number" id="name" value="<?php echo $row['service_fee'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Breakfast Fee</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="breakfast_fee" type="number" id="name" value="<?php echo $row['breakfast_fee'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Meal Fee</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="meal_fee" type="number" id="name" value="<?php echo $row['meal_fee'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Habitation Fee</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="habitation_fee" type="number" id="name" value="<?php echo $row['habitation_fee'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Exam Fee</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="exam_fee" type="number" id="name" value="<?php echo $row['exam_fee'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Other Fee</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="other_fee" type="number" id="name" value="<?php echo $row['other_fee'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>


								                                <div class="form-group">
								                                    <div class="col-md-offset-4 col-md-8">
								                                        <input class="btn btn-primary btnsectioncreate btnper" type="submit" value="upgrade">
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


													<a  data-toggle="modal" data-target="#modal-view<?php echo $row['fee_structure_id'];?>" class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="View"><i class="fa fa-eye"></i></a>

										            <!-- Modal -->
										            <div class="modal fade" id="modal-view<?php echo $row['fee_structure_id'];?>">
										              <div class="modal-dialog">
										                <div class="modal-content">
										                  <div class="modal-header">
										                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										                      <span aria-hidden="true">&times;</span></button>
										                    <h4 class="modal-title">View Fee Structure</h4>
										                  </div>
										                  <div class="modal-body">
										     
									                        <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">


									                            <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Class</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['class_name'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>			                            
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Student</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['student_name'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Admission Fee</label>
			                                                        <div class="col-md-6">
			                                                              <p class="form-control"><?php echo $row['addmission_fee'] ?></p>
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Tuition Fee</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['tution_fee'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Service Fee</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['service_fee'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Breakfast Fee</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['breakfast_fee'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Meal Fee</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['meal_fee'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Habitation Fee</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['habitation_fee'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Exam Fee</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['exam_fee'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                   <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Other Fee</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['other_fee'] ?></p>
			                                                              
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
						                    <h4 class="modal-title">Add New Fee Structure</h4>
						                  </div>
						                  <div class="modal-body">
						     
						                        <form method="POST" action="<?php echo site_url(); ?>admin/fee_structure/store/" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

	                                                    <div class="form-group ">
	                                                        <label for="name" class="col-md-4 control-label">Class</label>
	                                                        <div class="col-md-6">
	                                                            <select class="form-control"  onchange="get_student_list_by_class(this.value)">
	                                                                <option disabled="disabled">Select Class</option>
	                                                                <?php foreach ($classes as $item) : ?>
	                                                                <option value="<?php echo $item['class_id']; ?>"><?php echo $item['name']; ?></option>
	                                                              <?php endforeach; ?>
	                                                            </select>
	                                                              
	                                                        </div>
	                                                    </div>			                            
	                                                    <div class="form-group ">
	                                                        <label for="name" class="col-md-4 control-label">Student</label>
	                                                        <div class="col-md-6">
	                                                            <select class="form-control" name="student_id" id="student_id-create">
	                                                            </select>
	                                                              
	                                                        </div>
	                                                    </div>
	                                                    <div class="form-group ">
	                                                        <label for="name" class="col-md-4 control-label">Admission Fee</label>
	                                                        <div class="col-md-6">
	                                                            <input class="form-control" name="addmission_fee" type="number" id="name">
	                                                              
	                                                        </div>
	                                                    </div>
	                                                   <div class="form-group ">
	                                                        <label for="name" class="col-md-4 control-label">Tuition Fee</label>
	                                                        <div class="col-md-6">
	                                                            <input class="form-control" name="tution_fee" type="number" id="name">
	                                                              
	                                                        </div>
	                                                    </div>
	                                                   <div class="form-group ">
	                                                        <label for="name" class="col-md-4 control-label">Service Fee</label>
	                                                        <div class="col-md-6">
	                                                            <input class="form-control" name="service_fee" type="number" id="name">
	                                                              
	                                                        </div>
	                                                    </div>
	                                                   <div class="form-group ">
	                                                        <label for="name" class="col-md-4 control-label">Breakfast Fee</label>
	                                                        <div class="col-md-6">
	                                                            <input class="form-control" name="breakfast_fee" type="number" id="name">
	                                                              
	                                                        </div>
	                                                    </div>
	                                                   <div class="form-group ">
	                                                        <label for="name" class="col-md-4 control-label">Meal Fee</label>
	                                                        <div class="col-md-6">
	                                                            <input class="form-control" name="meal_fee" type="number" id="name">
	                                                              
	                                                        </div>
	                                                    </div>
	                                                   <div class="form-group ">
	                                                        <label for="name" class="col-md-4 control-label">Habitation Fee</label>
	                                                        <div class="col-md-6">
	                                                            <input class="form-control" name="habitation_fee" type="number" id="name">
	                                                              
	                                                        </div>
	                                                    </div>
	                                                   <div class="form-group ">
	                                                        <label for="name" class="col-md-4 control-label">Exam Fee</label>
	                                                        <div class="col-md-6">
	                                                            <input class="form-control" name="exam_fee" type="number" id="name">
	                                                              
	                                                        </div>
	                                                    </div>
	                                                   <div class="form-group ">
	                                                        <label for="name" class="col-md-4 control-label">Other Fee</label>
	                                                        <div class="col-md-6">
	                                                            <input class="form-control" name="other_fee" type="number" id="name">
	                                                              
	                                                        </div>
	                                                    </div>

						                                <div class="form-group">
						                                    <div class="col-md-offset-4 col-md-8">
						                                        <input class="btn btn-primary btnfee_structurecreate btnper" type="submit" value="Create">
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
			

<script>
    function get_student_list_by_class(val) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url(); ?>admin/students/get_student_list_by_class",
            data: 'class_id=' + val,
            success: function (data) {
                $("#student_id-create").html(data);
            }
        });
    }
</script>

	<?php  $this->load->view('admin/inc/footer.php');?>?>




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
										      <a  data-toggle="modal" data-target="#modal-create" href="" class=" btn btn-primary form-control" title="Add New teacher" style="border-radius: 0px"><i class="fa fa-plus" aria-hidden="true"></i> Add New Payment</a>
										    </div>
										  </form>


											<p style="color:red;"><?php echo isset($_salary_payment['msg'])?$_salary_payment['msg']:'';?></p>
										
									</div>

									<table class="table table-bordered table-striped table-hover  dataTable" id="example" >
										<thead>
											<tr>
												<th class="center">#</th>
												<th>Teacher Name</th>
												<th>Basic Salary</th>
												<th>House Rent</th>
												<th>Medical Allowance</th>
												<th>Provident Fund </th>
												<th>Pro. Tax </th>
												<th>Action</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$cnt=1;
											foreach($payments as $row)
											{
											?>
											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['teacher_name'];?></td>
												<td class="hidden-xs"><?php echo $row['basic'];?></td>
												<td><?php echo $row['house_rent'];?></td>
												<td><?php echo $row['medical'];?></td>
												<td><?php echo $row['pf'];?>
												<td><?php echo $row['pro_tax'];?>
												</td>
												<td >
													<!--Row Delete Start -->
													<a href="<?php echo site_url(); ?>admin/salary_payment/delete/<?php echo $row['payment_id'];?>" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="Remove"><i class="fa fa-times fa fa-white"></i></a>

													<!--Row Delete End -->

													<!-- Row Edit Start-->

													<a  data-toggle="modal" data-target="#modal-edit<?php echo $row['payment_id'];?>"  href="" class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>


										            <!-- Modal -->
										            <div class="modal fade" id="modal-edit<?php echo $row['payment_id'];?>">
										              <div class="modal-dialog">
										                <div class="modal-content">
										                  <div class="modal-header">
										                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										                      <span aria-hidden="true">&times;</span></button>
										                    <h4 class="modal-title">Update salary_payment</h4>
										                  </div>
										                  <div class="modal-body">
										     
									                        <form method="POST" action="<?php echo site_url(); ?>admin/salary_payment/update/<?php echo $row['payment_id'];?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

	                                                    
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Teacher</label>
			                                                        <div class="col-md-6">
			                                                            <select class="form-control" name="staff_id">
			                                                                <option disabled="disabled">Select Teacher </option>
			                                                                <?php foreach ($teachers as $item) : ?>
			                                                                <option value="<?php echo $item['teacher_id']; ?>"><?php echo $item['name']; ?></option>
			                                                              <?php endforeach; ?>
			                                                            </select>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Basic Salary</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="basic" type="number" id="name" value="<?php echo $row['basic'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Dearness Allowance</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="dearness" type="number" id="name" value="<?php echo $row['dearness'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">House Rent Allowance</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="house_rent" type="number" id="name" value="<?php echo $row['house_rent'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Medical Allowance</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="medical" type="number" id="name" value="<?php echo $row['medical'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Bonus</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="bonus" type="number" id="name" value="<?php echo $row['bonus'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Other Addition</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="other_addition" type="number" id="name" value="<?php echo $row['other_addition'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Provident Fund</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="pf" type="number" id="name" value="<?php echo $row['pf'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Professional Tax</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="pro_tax" type="number" id="name" value="<?php echo $row['pro_tax'] ?>" >
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Other Deduction</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="other_deduction" type="number" id="name" value="<?php echo $row['other_deduction'] ?>">
			                                                              
			                                                        </div>
			                                                    </div>


								                                <div class="form-group">
								                                    <div class="col-md-offset-4 col-md-8">
								                                        <input class="btn btn-primary btnsectioncreate btnper" type="submit" value="Update">
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


													<a  data-toggle="modal" data-target="#modal-view<?php echo $row['payment_id'];?>" class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="View"><i class="fa fa-eye"></i></a>

										            <!-- Modal -->
										            <div class="modal fade" id="modal-view<?php echo $row['payment_id'];?>">
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
			                                                        <label for="name" class="col-md-4 control-label">Teacher Name</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['teacher_name'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>			                            
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Basic Salary</label>
			                                                        <div class="col-md-6">
			                                                         <p class="form-control"><?php echo $row['basic'] ?></p>
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Dearness Allowance</label>
			                                                        <div class="col-md-6">
			                                                             <p class="form-control"><?php echo $row['dearness'] ?></p>

			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">House Rent Allowance</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['house_rent'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Medical Allowance</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['medical'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Bonus</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['bonus'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Other Addition</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['other_addition'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Provident Fund</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['pf'] ?></p>

			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Professional Tax</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['pro_tax'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>
			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Other Deduction</label>
			                                                        <div class="col-md-6">
			                                                            <p class="form-control"><?php echo $row['other_deduction'] ?></p>
			                                                              
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
						                    <h4 class="modal-title">Create New Salary Payment</h4>
						                  </div>
						                  <div class="modal-body">
						     
						                        <form method="POST" action="<?php echo site_url(); ?>admin/salary_payment/store/" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

	                                                    
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Teacher</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="staff_id">
                                                                <option disabled="disabled">Select Teacher </option>
                                                                <?php foreach ($teachers as $item) : ?>
                                                                <option value="<?php echo $item['teacher_id']; ?>"><?php echo $item['name']; ?></option>
                                                              <?php endforeach; ?>
                                                            </select>
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Basic Salary</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="basic" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Dearness Allowance</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="dearness" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">House Rent Allowance</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="house_rent" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Medical Allowance</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="medical" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Bonus</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="bonus" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Other Addition</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="other_addition" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Provident Fund</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="pf" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Professional Tax</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="pro_tax" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Other Deduction</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="other_deduction" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Fine</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="fine" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Remarks</label>
                                                        <div class="col-md-6">
                                                            <textarea class="form-control" name="remark" type="text" id="name"></textarea> 
                                                              
                                                        </div>
                                                    </div>
                                                    


					                                <div class="form-group">
					                                    <div class="col-md-offset-4 col-md-8">
					                                        <input class="btn btn-primary btnsalary_paymentcreate btnper" type="submit" value="Create">
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



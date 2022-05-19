
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
										      <a  data-toggle="modal" data-target="#modal-create" href="" class=" btn btn-primary form-control" title="Add Teacher Attendance" style="border-radius: 0px"><i class="fa fa-plus" aria-hidden="true"></i> Add Teacher Attendance</a>
										    </div>


										    

										  </form>


											<p style="color:red;"><?php echo isset($_fee_structure['msg'])?$_fee_structure['msg']:'';?></p>
										
									</div>

									<table class="table table-bordered table-striped table-hover" >
										<thead>
											<tr>
												<th class="center">Name</th>
												<?php $month=date("m");
													if($month==1 ||$month==3 ||$month==5 ||$month==7 ||$month==8 ||$month==10 ||$month==12)
													{
														$date_limit=31;
													}
													else if($month==2){$date_limit=29;}
													else{$date_limit=30;}
													
													for($date_day=1;$date_day<=$date_limit;$date_day++)
													{						
												?>
												<th class="table-header"><?php echo $date_day ;?></th>
												<?php } ?>
												<th class="table-header">Total</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												if(!empty($staffs)):
													foreach ($staffs as $row) :
											 ?>
													 <tr>
														<td class="hidden-xs"><?php echo $row['name'];?></td>
														<?php
															$total=0;
															for($date_day=1;$date_day<=$date_limit;$date_day++)
															{
																$date=date('Y')."-".$month."-".$date_day;
																$date_daysss= $date_day+1;
																$next_date=date('Y')."-".$month."-".$date_daysss;

																$attendance_query="SELECT* FROM staff_attendance WHERE teacher_id='".$row['teacher_id']."' AND login_time>='".date("Y-m-d h:i:s",strtotime($date))."' AND login_time<'".date("Y-m-d h:i:s",strtotime($next_date))."'  AND status=1";
																$query = $this->db->query($attendance_query);

																if ($query->num_rows()>0) {$total+=1;}
															?>
															<td id="attendance-status<?php echo $row['teacher_id'].'-'.$date_day ?>"><input disabled type="checkbox" <?php echo $query->num_rows()>0 ?'checked':'' ?> ></td>
														
															<?php } ?>
														<td><?php echo $total ?></td>
													</tr>
												<?php endforeach;

												endif; ?>
										</tbody>
									</table>

						            <!-- Modal -->
						            <div class="modal fade" id="modal-create">
						              <div class="modal-dialog">
						                <div class="modal-content">
						                  <div class="modal-header">
						                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                      <span aria-hidden="true">&times;</span></button>
						                    <h4 class="modal-title">Add Teacher Attendence</h4>
						                  </div>
						                  <div class="modal-body">
						     
						                        <form method="POST" action="<?php echo site_url(); ?>admin/staff_attendance/store/" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

	                                                    <div class="form-group ">
	                                                        <label for="name" class="col-md-4 control-label">Teacher Name</label>
	                                                        <div class="col-md-6">
	                                                            <select class="form-control" name="teacher_id"  onchange="get_staff_attendence_form(this.value)">
	                                                                <option disabled="disabled">Select a Teacher</option>
	                                                                <?php foreach ($staffs as $item) : ?>
	                                                                <option value="<?php echo $item['teacher_id']; ?>"><?php echo $item['name']; ?></option>
	                                                              <?php endforeach; ?>
	                                                            </select>
	                                                              
	                                                        </div>
	                                                     </div>

	                                                        <div id="attendence-form"></div>


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
                $("#teacher_id-create").html(data);
            }
        });
    }
</script>

<script>
    function get_month(val) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url(); ?>admin/ajax_function/get_month",
            data: 'class_id=' + val,
            success: function (data) {
                $("#month-create").html(data);
            }
        });
    }
</script>
<script>
    function get_attendence_form(class_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url(); ?>admin/ajax_function/get_attendence_form",
            data: 'class_id=' + class_id,
            success: function (data) {
                $("#attendence-form").html(data);
            }
        });
    }
</script>
<script>
    function get_staff_attendence_form(teacher_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url(); ?>admin/ajax_function/get_staff_attendence_form",
            data: 'teacher_id=' + teacher_id,
            success: function (data) {
                $("#attendence-form").html(data);
            }
        });
    }
</script>
	<?php  $this->load->view('admin/inc/footer.php');?>?>



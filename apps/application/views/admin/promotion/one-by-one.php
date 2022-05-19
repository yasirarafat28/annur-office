
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
			      								<select class="form-control " name="class_id" onchange="get_session_list(this.value)" id="class_id">
			      									<?php foreach ($classes as $item): ?>

			      									<option value="<?php echo $item['class_id'] ?>"><?php echo $item['name'] ?></option>

			      									<?php endforeach; ?>
                                                </select>
										    </div>

										    <div class="form-group">
			      								<select class="form-control col-sm-2" disabled="" name="session_id" id="session_id" onchange="get_exam_list_by_session_class(<?php echo $this->setting->current_session_id(); ?>, $('#class_id').val())">

			      									<option value="" ="" selected="">Promoted to Session</option>
                                                </select>
										    </div>
										    <div class="form-group">
			      								<select class="form-control" disabled="" name="exam_id" id="exam_id" onchange="this.form.submit();">
			      									<option value=""  selected="">Select an Examination</option>
                                                </select>
										    </div>
								            

										  </form>


											<p style="color:red;"><?php echo isset($_fee_structure['msg'])?$_fee_structure['msg']:'';?></p>
										
									</div>

									<form method="post" action="<?php echo site_url() ?>admin/promotion/one_by_one">

										<input type="number" name="session_id" hidden value="<?php echo $this->input->get('session_id'); ?>" >

									<table class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th class="center">Roll</th>
												<th class="center">Name</th>
												<th class="center">Total Obtained Mark</th>
												<th class="center">Total Full Mark</th>
												<th class="center">Percentage(%)</th>
												<th class="center">Promotion Class</th>
												<th class="table-header">Promotion</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											if(!empty($students)):
											foreach ($students as $student) :
											$mark_total=$this->mark_model->get_total_obtain_mark_by_student_id_exam_id($student['student_id'], $this->input->get('exam_id'));
											$full_mark_total=$this->mark_model->get_total_full_mark_by_student_id_exam_id($student['student_id'], $this->input->get('exam_id'));
										?>
												 <tr <?php if($mark_total	/	$full_mark_total	*	100 < 34) { echo 'style="background-color: #f2d57c;"'; } ?>>
													<td><?php echo $student['roll'];?></td>
													<td><?php echo $student['name_bangla'];?></td>
													<td ><?php echo $mark_total;?></td>
													<td ><?php echo $full_mark_total;?></td>
													<td ><?php echo $mark_total	/	$full_mark_total	*	100;?> %</td>
													<td>
														<select class="form-control" name="class_id[]">

															<option  readonly >Select a Class</option>
															<?php foreach ($classes as $class):?>
                                                            <option  value="<?php echo $class['class_id'] ?>"><?php echo $class['name'] ?></option>
                                                        <?php endforeach; ?>
                                                        </select>
													</td>
													<td>
														<input type="number" name="student_id[]" hidden value="<?php echo  $student['student_id']; ?>">
														<select name="promote[]" class="form-control">
															<option  readonly >Select an Option</option>
															<option value="1" <?php if($mark_total	/	$full_mark_total	*	100 >=34) { echo 'selected'; } ?> >Promoting</option>
															<option value="0" <?php if ($mark_total	/	$full_mark_total	*	100 < 34) { echo 'selected'; } ?>>Not Promoting</option>
															
														</select>
													</td>

												</tr>
										<?php endforeach;

											endif; 
										?>
										</tbody>
									</table>

									<?php  if(!empty($students)): ?>


		                            <div class="form-group">
		                                <div class="col-md-offset-4 col-md-4">
		                                    <input class="btn btn-primary" type="submit" onclick="return confirm('Are you sure?');" value="Promote">
		                                </div>
		                            </div>

		                        <?php endif ?>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	function get_session_list(val)
	{
		$('#session_id').removeAttr('disabled');
		$.ajax({
			type:"POST",
			url: '<?php echo site_url(); ?>admin/ajax_function/get_session_list',
			data:'class_id='+val,
			success: function(data){
				$('#session_id').html(data);
			}
		});
	}
</script>

<script type="text/javascript">
	function get_exam_list_by_session_class(session_id,class_id)
	{

		$('#exam_id').removeAttr('disabled');
		$.ajax({
			type:"POST",
			url: '<?php echo site_url(); ?>admin/ajax_function/get_exam_list_by_session_class',
			data:'session_id='+session_id+'&class_id='+class_id,
			success: function(data){
				$('#exam_id').html(data);
			}
		});
	}
</script>
	<?php  $this->load->view('admin/inc/footer.php');?>?>



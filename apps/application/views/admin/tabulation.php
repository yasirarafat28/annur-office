
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
			      								<select class="form-control col-sm-2" disabled="" name="session_id" id="session_id" onchange="get_exam_list_by_session_class(this.value, $('#class_id').val())">

			      									<option value="" ="" selected="">Select a Session</option>
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

									<table class="table table-bordered table-striped table-hover" id="example" >
										<thead>
											<tr>
												<th class="center">Roll</th>
												<th class="center">Name</th>
												<?php  foreach ($subjects as $subject) :?>
												<th class="table-header"><?php echo $subject['name'] ;?></th>
												<?php endforeach; ?>
												<th class="table-header">Total</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											if(!empty($students)):
											foreach ($students as $student) :
											$mark_total=0;
											$full_mark_total=0;
										?>
												 <tr>
													<td class="hidden-xs"><?php echo $student['roll'];?></td>
													<td class="hidden-xs"><?php echo $student['name_bangla'];?></td>
													<?php  foreach ($subjects as $subject) :?>
														<td ><?php
														foreach ($marks as $mark) {
															if ($mark['student_id']==$student['student_id']	&& $mark['subject_id']== $subject['subject_id']) {
																$mark_total 	+=	$mark['mark_obtained'];
																$full_mark_total 	+=	$mark['mark_total'];

																echo 'Mark : <b>'.$mark['mark_obtained'].'</b> <br> Full &nbsp&nbsp: <b>'.$mark['mark_total'].'</b> <br>(%)  &nbsp&nbsp: <b>'.number_format($mark['mark_obtained']/$mark['mark_total']*100,'1').'</b>';
															}
														}
														?>		
														</td>
													<?php endforeach; ?>
													<td><?php echo 'Mark : '.$mark_total.'<br> Full: '.$full_mark_total; ?></td>
												</tr>
										<?php endforeach;

											endif; 
										?>
										</tbody>
									</table>
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



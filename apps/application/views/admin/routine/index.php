
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
	          								<a  href="<?php echo site_url() ?>admin/routine/create" class=" btn btn-primary form-control" title="Routine Setup" style="border-radius: 0px"><i class="fa fa-plus" aria-hidden="true"></i> Routine Setup</a>

										    <div class="form-group">
			      								<select class="form-control " name="class_id" onchange="this.form.submit()" id="class_id">
			      									<?php foreach ($classes as $item): ?>

			      									<option value="<?php echo $item['class_id'] ?>"><?php echo $item['name'] ?></option>

			      									<?php endforeach; ?>
                                                </select>
										    </div>

										  </form>


											<p style="color:red;"><?php echo isset($_fee_structure['msg'])?$_fee_structure['msg']:'';?></p>
										
									</div>

									<table class="table table-bordered table-striped table-hover" id="example" >
										<thead>
											<tr>
												<th class="center">Subject</th>
												<th class="center">Saturday</th>
												<th class="center">Sunday</th>
												<th class="center">Monday</th>
												<th class="center">Tuesday</th>
												<th class="center">Wednesday</th>
												<th class="center">Thursday</th>
												<th class="center">Friday</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($subjects as $subject) : ?>
											<tr>
												<td><?php echo $subject['name'] ?></td>
												<?php  for ($day=0; $day <7 ; $day++): ?>
													<td>
														<?php echo $this->routine_model->get_routine_time_start_by_class_day_subject($this->input->get('class_id'),$day,$subject['subject_id']); ?>

														--

														<?php echo $this->routine_model->get_routine_time_end_by_class_day_subject($this->input->get('class_id'),$day,$subject['subject_id']); ?>
															
													</td>
												<?php  endfor; ?>
											</tr>
											<?php endforeach; ?>	
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



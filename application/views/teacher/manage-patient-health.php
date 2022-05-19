
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Appointment History</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo site_url(); ?>vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>vendor/themify-icons/themify-icons.min.css">
		<link href="<?php echo site_url(); ?>vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo site_url(); ?>vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo site_url(); ?>vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo site_url(); ?>vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo site_url(); ?>vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo site_url(); ?>vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo site_url(); ?>vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/styles.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/plugins.css">
		<link rel="stylesheet" href="<?php echo site_url(); ?>assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body>
		<div id="app">
<?php include('sidebar.php');?>
			<div class="app-content">


					<?php include('header.php');?>

				<div class="main-content" >
					<div class="wrap-content container" id="container">

						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Doctor  | Manage Patient Health</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Doctor </span>
									</li>
									<li class="active">
										<span>Manage Patient Health</span>
									</li>
								</ol>
							</div>
						</section>

						<div class="container-fluid container-fullw bg-white">


									<div class="row">
								<div class="col-md-12">

									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">#</th>
												<th class="hidden-xs">Patient  Name</th>
												<th>Specialization</th>
												<th>Consultancy Fee</th>
												<th>Appointment Date / Time </th>
												<th>Current Status</th>
												<th>Action</th>

											</tr>
										</thead>
										<tbody>
<?php
$cnt=1;
foreach($reports as $row)
{
?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['fullName'];?></td>
												<td><?php echo $row['doctorSpecialization'];?></td>
												<td><?php echo $row['consultancyFees'];?></td>
												<td><?php echo $row['appointmentDate'];?> / <?php echo
												 $row['appointmentTime'];?>
												</td>
												<td><?php echo $row['LDCholesterol'];?></td>
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
													<a type="button"  data-toggle="modal" data-target="#myModal<?php echo $cnt;?>">Details</a><br>

													<a href="<?php echo site_url(); ?>doctor/send_patient/<?php echo $row['reportId'];?>" type="button">Send to Patient</a><br>

													<a href="<?php echo site_url(); ?>doctor/edit_patient_health/<?php echo $row['reportId'];?>" type="button">Edit</a><br>

													<a href="<?php echo site_url(); ?>doctor/delete_patient_health/<?php echo $row['reportId'];?>" type="button" onclick="return confirm('Are you sure to delete this report??');" >Delete</a>

												</div>

												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Edit
																</a>
															</li>
															<li>
																<a href="#">
																	Share
																</a>
															</li>
															<li>
																<a href="#">
																	Remove
																</a>
															</li>
														</ul>
													</div>
												</div>
											</td>
											</tr>

											<?php
$cnt=$cnt+1;
											 }?>


										</tbody>
									</table>
								</div>

								<!--modals-->

								<?php 
								$count=1;
								foreach ($reports as $rw) {

								?>

								<div class="modal fade clearfix" id="myModal<?php echo $count;?>" role="dialog" tabindex="-1" >
							    <div class="modal-dialog">
							    
							      <!-- Modal content-->
							      <div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title">Patient's Health Details</h4>
							        </div>
							        <div class="modal-body">
							          	<table class="table ">
											<thead>
												<tr>
													<th>Field</th>
													<th>Result</th>

												</tr>
											</thead>

											<tbody>
												<tr>
													<td>MetsbolicSyndrome</td>
													<td><?php echo $rw['MetsbolicSyndrome'];?></td></tr>
												<tr>
													<td>BloodPressure</td>
													<td><?php echo $rw['BloodPressure'];?></td></tr>
												<tr>
													<td>HDCholesterol</td>
													<td><?php echo $rw['HDCholesterol'];?></td></tr>
												<tr>
													<td>LDCholesterol</td>
													<td><?php echo $rw['LDCholesterol'];?></td></tr>
												<tr>
													<td>Triglycerides</td>
													<td><?php echo $rw['Triglycerides'];?></td></tr>
												<tr>
													<td>LiverEnzyme</td>
													<td><?php echo $rw['LiverEnzyme'];?></td></tr>
												<tr>
													<td>BodyMass</td>
													<td><?php echo $rw['BodyMass'];?></td></tr>
												<tr>
													<td>AbnormalCircumference</td>
													<td><?php echo $rw['AbnormalCircumference'];?></td></tr>
												<tr>
													<td>PhysicalCondition</td>
													<td><?php echo $rw['PhysicalCondition'];?></td></tr>
												<tr>
													<td>Diabetes</td>
													<td><?php echo $rw['Diabetes'];?></td></tr>
											</tbody>
										</table>
							        </div>
							      </div>
							      
							    </div>
							  </div>

							  <!--end of Modal -->

											<?php
											$count=$count+1;
											 } ?>


							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="clear: right;"></div>>
	<?php include('footer.php');?>
			<!-- end: FOOTER -->

		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="<?php echo site_url(); ?>vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/modernizr/modernizr.js"></script>
		<script src="<?php echo site_url(); ?>vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo site_url(); ?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo site_url(); ?>vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/autosize/autosize.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/selectFx/classie.js"></script>
		<script src="<?php echo site_url(); ?>vendor/selectFx/selectFx.js"></script>
		<script src="<?php echo site_url(); ?>vendor/select2/select2.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="<?php echo site_url(); ?>assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="<?php echo site_url(); ?>assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
	</body>
</html>

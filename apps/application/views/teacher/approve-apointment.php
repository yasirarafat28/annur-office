
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
		<link href="<?php echo site_url(); ?>vendor/bootstrap-/bootstrap-3.standalone.min.css" rel="stylesheet" media="screen">
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
									<h1 class="mainTitle">Doctor  | Appointment History</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Doctor </span>
									</li>
									<li class="active">
										<span>Appointment History</span>
									</li>
								</ol>
							</div>
						</section>

						<div class="container-fluid container-fullw bg-white">


									<div class="row">
								<div class="col-md-12">
 <div class="row margin-top-30">
                                        <div class="col-lg-8 col-md-12">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">Approve Appointment</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <p style="color:red;"><?php echo htmlentities($_SESSION['msg1']); ?>
                                                        <?php echo htmlentities($_SESSION['msg1'] = ""); ?></p>

                                                        <?php foreach($appoinments as $row){?>
                                                    <form role="form" name="book" method="post" >

                                                        <div class="form-group">
                                                            <label for="DoctorSpecialization">
                                                                Patient Name
                                                            </label>
                                                            <input class="form-control " value="<?php echo $row['fname']?>" readonly  type="text">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="consultancyfees">
                                                                Consultancy Fees
                                                            </label>
                                                            <input class="form-control " value="<?php echo $row['consultancyFees']?>" readonly  type="text">

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="AppointmentDate">
                                                              Appointment  Date
                                                            </label>
                                                            <input class="form-control " value="<?php echo $row['appointmentDate']?>" readonly  type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="AppointmentDate">
                                                                Appointment Creation Date
                                                            </label>
                                                            <input class="form-control " value="<?php echo $row['postingDate']?>" readonly  type="text">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="Appointmenttime">

                                                                Time

                                                            </label>
                                                            <input class="form-control " value="<?php echo $row['appointmentTime']?>" readonly  type="text">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="DoctorSpecialization">
                                                                Specialization <small>(You can change!)</small>
                                                            </label>
                                                            <!--<input class="form-control " value="<?php echo $row['doctorSpecialization']?>" readonly  type="text">-->

                                                            <select class="form-control " name="specialization">
                                                            	<option>Select a Department</option>
                                                            	<?php
                                                            	foreach ($specializations as $specialization) {
                                                            	?>
																<option value="<?php echo $specialization['specilization'];?>" <?php if ($specialization['specilization']==$row['doctorSpecialization']) {
																	echo 'selected';
																}?> ><?php echo $specialization['specilization'];?></option>
                                                            	<?php
                                                           		 }
                                                            	?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="Appointmenttime">

                                                                Select Room

                                                            </label>
                                                            <select class="form-control" name="room">
                                                            	<option>Select a Room</option>
                                                            	<?php 
                                                            	foreach($rooms as $room){
                                                            		$avl_bed=$room['total_bed']-$room['booked_bed'];
                                                            		?>
                                                            	<option <?php if ($avl_bed<1) {
                                                            		echo 'disabled';
                                                            	}?> value="<?php echo $room['id'];?>"><?php echo $room['room_name']."(Available - ".$avl_bed." Beds)";?></option>
                                                            	<?php
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>

                                                        <button type="submit"  name="submit" class="btn btn-o btn-primary">
                                                            Submit
                                                        </button>
                                                    </form>

                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

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
		<script src="<?php echo site_url(); ?>vendor/bootstrap-/bootstrap-.min.js"></script>
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

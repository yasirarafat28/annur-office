<?php
if(isset($_POST['submit']))
{
	$docspecialization=$_POST['Doctorspecialization'];
$docname=$_POST['docname'];
$docaddress=$_POST['clinicaddress'];
$docfees=$_POST['docfees'];
$doccontactno=$_POST['doccontact'];
$docemail=$_POST['docemail'];
$sql=mysql_query("Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where docEmail='".$_SESSION['dlogin']."'");
if($sql)
{
echo "<script>alert('Doctor Details updated Successfully');</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctr | Edit Doctor Details</title>
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
									<h1 class="mainTitle">Doctor | Edit Doctor Details</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Doctor</span>
									</li>
									<li class="active">
										<span>Edit Doctor Details</span>
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
													<h5 class="panel-title">Edit Doctor</h5>
												</div>
												<div class="panel-body">
									<?php
foreach($doctors as $data)
{
?>
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="DoctorSpecialization">
																Doctor Specialization
															</label>
							<select name="Doctorspecialization" class="form-control" required="required">
					<option value="<?php echo htmlentities($data['specilization']);?>">
					<?php echo htmlentities($data['specilization']);?></option>
<?php
foreach($specializations as $row)
{
?>
																<option value="<?php echo htmlentities($row['specilization']);?>">
																	<?php echo htmlentities($row['specilization']);?>
																</option> <?php } ?>
															</select>
														</div>

<div class="form-group">
															<label for="doctorname">
																 Doctor Name
															</label>
	<input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorName']);?>" >
														</div>


<div class="form-group">
															<label for="address">
																 Doctor Clinic Address
															</label>
					<textarea name="clinicaddress" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
														</div>
<div class="form-group">
															<label for="fess">
																 Doctor Consultancy Fees
															</label>
		<input type="text" name="docfees" class="form-control" required="required"  value="<?php echo htmlentities($data['docFees']);?>" >
														</div>

<div class="form-group">
									<label for="fess">
																 Doctor Contact no
															</label>
					<input type="text" name="doccontact" class="form-control" required="required"  value="<?php echo htmlentities($data['contactno']);?>">
														</div>

<div class="form-group">
									<label for="fess">
																 Doctor Email
															</label>
					<input type="email" name="docemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['docEmail']);?>">
														</div> <?php } ?>

														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Update
														</button>
													</form>
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

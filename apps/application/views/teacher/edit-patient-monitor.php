<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin | Edit Patient Health</title>
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
<?php include('sidebar.php'); ?>
            <div class="app-content">

            <?php include('header.php'); ?>

                <div class="main-content" >
                    <div class="wrap-content container" id="container">
                        <section id="page-title">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1 class="mainTitle">Admin | Edit Patient Health</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li>
                                        <span>Admin</span>
                                    </li>
                                    <li class="active">
                                        <span>Edit Patient Health</span>
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
                                                    <h5 class="panel-title">Edit Patient Health</h5>
                                                </div>
                                                <div class="panel-body">

                                                    <?php
                                                    foreach($reports as $row){
                                                    ?>

                                                    <form role="form" name="adddoc" method="post">
                                                        
                                                        <div class="form-group">
                                                            <label for="roomcode">
                                                                 Patient
                                                            </label>

                                                           
                                                            <input type="text" name="patient" readonly id="room_code" value="<?php echo $row['fullName']?>" class="form-control"  placeholder="Patient Name">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="roomcode">
                                                                Metabolic Syndrome
                                                            </label>
                                                            <input type="text" name="MetsbolicSyndrome" id="room_code" value="<?php echo $row['MetsbolicSyndrome']?>" class="form-control"  placeholder="Enter Metabolic Syndrome">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="roomcode">
                                                                Blood Pressure
                                                            </label>
                                                            <input type="text" name="BloodPressure" id="room_code" value="<?php echo $row['BloodPressure']?>" class="form-control"  placeholder="Enter Metabolic Syndrome">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="roomcode">
                                                                HDC Cholesterol
                                                            </label>
                                                            <input type="text" name="HDCholesterol" id="room_code" value="<?php echo $row['HDCholesterol']?>" class="form-control"  placeholder="Enter HDC Cholesterol">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="roomcode">
                                                                LDC Cholesterol
                                                            </label>
                                                            <input type="text" name="LDCholesterol" id="room_code" value="<?php echo $row['LDCholesterol']?>" class="form-control"  placeholder="Enter LDC Cholesterol">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="roomcode">
                                                                Triglycerides
                                                            </label>
                                                            <input type="text" name="Triglycerides" id="room_code" value="<?php echo $row['Triglycerides']?>" class="form-control"  placeholder="Enter  Triglycerides">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="roomcode">
                                                                LiverEnzyme
                                                            </label>
                                                            <input type="text" name="LiverEnzyme" id="room_code" value="<?php echo $row['LiverEnzyme']?>" class="form-control"  placeholder="Enter LiverEnzyme">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="roomcode">
                                                                Body Mass
                                                            </label>
                                                            <input type="text" name="BodyMass" id="room_code" value="<?php echo $row['BodyMass']?>" class="form-control"  placeholder="Enter BodyMass">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="roomcode">
                                                                Abnormal Circumference
                                                            </label>
                                                            <input type="text" name="AbnormalCircumference" value="<?php echo $row['AbnormalCircumference']?>" id="room_code" class="form-control"  placeholder="Enter AbnormalCircumference">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="roomcode">
                                                                Physical Condition
                                                            </label>
                                                            <input type="text" name="PhysicalCondition" id="room_code" value="<?php echo $row['PhysicalCondition']?>" class="form-control"  placeholder="Enter PhysicalCondition">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="roomcode">
                                                                Diabetes
                                                            </label>
                                                            <input type="text" name="Diabetes" id="room_code" value="<?php echo $row['Diabetes']?>" class="form-control"  placeholder="Enter Diabetes">
                                                        </div>
                                                        

                                                        <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                            Update Information
                                                        </button>
                                                    </form>

                                                <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="panel panel-white">


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>

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
                                                            jQuery(document).ready(function () {
                                                                Main.init();
                                                                FormElements.init();
                                                            });
</script>

</body>
</html>

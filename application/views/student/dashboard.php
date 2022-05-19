<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User  | Dashboard</title>
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
                                    <h1 class="mainTitle">User | Dashboard</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li>
                                        <span>User</span>
                                    </li>
                                    <li class="active">
                                        <span>Dashboard</span>
                                    </li>
                                </ol>
                            </div>
                        </section>

                        <div class="container-fluid container-fullw bg-white">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="panel panel-white no-radius text-center">
                                        <div class="panel-body">
                                            <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
                                            <h2 class="StepTitle">My Profile</h2>
                                            <p class="links cl-effect-1">
                                          <a href="<?php echo site_url(); ?>patient/edit_profile">
                                          Update Profile
                                          </a>
                                          </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="panel panel-white no-radius text-center">
                                        <div class="panel-body">
                                            <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                                            <h2 class="StepTitle">My Appointments</h2>
                                            <p class="links cl-effect-1">
                                                <a href="<?php echo site_url(); ?>patient/appointment_history">
                                                    Update Profile
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="panel panel-white no-radius text-center">
                                        <div class="panel-body">
                                            <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                                            <h2 class="StepTitle"> Book My Appointment</h2>
                                            <p class="links cl-effect-1">
                                          <a href="<?php echo site_url(); ?>patient/book_appointment">
                                          Book Appointment
                                          </a>
                                          </p>
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

    </body>
</html>

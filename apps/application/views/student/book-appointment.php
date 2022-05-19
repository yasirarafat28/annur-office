<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User  | Book Appointment</title>
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
        <script>
            function getdoctor(val) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>patient/get_doctor",
                    data: 'specilizationid=' + val,
                    success: function (data) {
                        $("#doctor").html(data);
                    }
                });
            }
        </script> <script>
            function getschedule(val) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>patient/get_doctor",
                    data: 'd_for_s=' + val,
                    success: function (data) {
                        $("#apptimes").html(data);
                    }
                });
            }
        </script>

        <script>
            function getfee(val) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>patient/get_doctor",
                    data: 'doctor=' + val,
                    success: function (data) {
                        $("#fees").html(data);
                        $("#apptime").html(data);
                    }
                });
            }


            function submitForm() {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url(); ?>patient/book_action",
                    data: {'Doctorspecialization': $('#Doctorspecialization').val(), 'doctor': $('#doctor').val(), 'fees': $('#fees').val(), 'appdate': $('#appdate').val(),
                        'apptime': $('#apptime').val()},
                    success: function (msg) {
                        $('#Doctorspecialization').val('');
                        $('#doctor').val('');
                        $('#fees').val('');
                        $('#appdate').val('');
                        $('#apptime').val('');
                        alert(msg);
                    }
                });
            }
        </script>

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
                                    <h1 class="mainTitle">User | Book Appointment</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li>
                                        <span>User</span>
                                    </li>
                                    <li class="active">
                                        <span>Book Appointment</span>
                                    </li>
                                </ol>
                        </section>

                        <div class="container-fluid container-fullw bg-white">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="row margin-top-30">
                                        <div class="col-lg-8 col-md-12">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">Book Appointment</h5>
                                                </div>
                                                <div class="panel-body">
                                                    <p style="color:red;"><?php echo htmlentities($_SESSION['msg1']); ?>
                                                        <?php echo htmlentities($_SESSION['msg1'] = ""); ?></p>
                                                    <form role="form" name="book" method="post" >

                                                        <div class="form-group">
                                                            <label for="DoctorSpecialization">
                                                                Doctor Specialization
                                                            </label>
                                                            <select name="Doctorspecialization" id="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
                                                                <option value="">Select Specialization</option>
                                                                <?php
                                                                foreach ($specilizations as  $row ) {
                                                                    ?>
                                                                    <option value="<?php echo htmlentities($row['specilization']); ?>">
                                                                        <?php echo htmlentities($row['specilization']); ?>
                                                                    </option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="doctor">
                                                                Doctors
                                                            </label>
                                                            <select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);getschedule(this.value);" required="required">
                                                                <option value="">Select Doctor</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="consultancyfees">
                                                                Consultancy Fees
                                                            </label>
                                                            <select name="fees" class="form-control" id="fees"  readonly>

                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="AppointmentDate">
                                                                Date
                                                            </label>
                                                            <input class="form-control datepicker" id="appdate" name="appdate"  type="text" required="required">
                                                        </div>

                                                        <div class="form-group">
                                                            <div  id="apptimes"></div>
                                                            <label for="Appointmenttime">

                                                                Time

                                                            </label>
                                                            <input class="form-control timepicker" name="apptime"  id="apptime" type="time" required="required">
                                                        </div>

                                                        <button type="button" onclick="submitForm();" name="submit" class="btn btn-o btn-primary">
                                                            Submit
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

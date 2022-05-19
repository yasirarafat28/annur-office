<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Doctor | Message</title>
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
                                    <h1 class="mainTitle">Doctor  | Message</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li>
                                        <span>Doctor </span>
                                    </li>
                                    <li class="active">
                                        <span>Message</span>
                                    </li>
                                </ol>
                            </div>
                        </section>

                        <div class="container-fluid container-fullw bg-white">


                            <div class="row">
                                <div class="col-md-12">

                                    <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                        <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                    <table class="table table-hover" id="sample-table-1">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th class="hidden-xs">Name</th>
                                                <th>Email</th>
                                                <th>Message</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cnt = 1;
                                            foreach ( $contacts as $row) {
                                                ?>

                                                <tr>
                                                    <td class="center"><?php echo $cnt; ?>.</td>
                                                    <td class="hidden-xs"><?php echo $row['name']; ?></td>
                                                    <td class="hidden-xs"><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['msg']; ?></td>
                                                    </td>
                                                    <td >
                                                        <div class="visible-md visible-lg hidden-sm hidden-xs">


                                                            <a href="javascript:" onClick="deleteRow(<?php echo $row['id'] ?>)"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
                                                        </div>
                                                    </td>

                                                </tr>

                                                <?php
                                                $cnt = $cnt + 1;
                                            }
                                            ?>


                                        </tbody>
                                    </table>
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
    function deleteRow(id) {
        if (confirm('Are you sure you want to delete?') == true) {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url(); ?>doctor/delete_message/",
                data: {'id': id},
                success: function (msg) {
                    alert(msg);
                    document.location = "<?php echo site_url(); ?>doctor/message";
                }
            });
        }
    }
        </script>

    </body>
</html>

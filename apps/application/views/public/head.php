<!doctype html>
<html lang="en">

<head>
    <title><?php echo $this->setting->current_setting_name(); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
        crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo site_url(); ?>css/custom.css">
    <script src="<?php echo site_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
        crossorigin="anonymous"></script>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .nav-item:hover{
            background-color: #4c5d46;
        }
        .nav-link
        {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row" style="border-bottom: 2px solid #dddddd; background-image: linear-gradient(to bottom, #fff, #bbb);">
            <div id="header bg-success" class="col">
                <div class="col-sm-3">
                    <!--<div class="text-center">
                        <h1 style="font-size: 26px;"><?php echo $this->setting->current_setting_name(); ?></h1>
                    </div>-->

                    <img src="<?php echo site_url().$this->setting->current_setting_logo() ?>" style="height: 120px; width: 120;" >
                </div>
                <div class="col-sm-9">
                    <div class="row mb-3">
                        <div class="col-sm-6 text-teal">
                            <i class="fa fa-phone"></i> <?php echo $this->setting->current_setting_phone(); ?> &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-envelope"></i> <?php echo $this->setting->current_setting_email(); ?>

                        </div>
                        <div class="col-sm-6 text-right text-teal">
                            <?php echo date("l, jS F, Y ") ?>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <ul class="navbar-nav w-100 nav-justified">
                            <li class="nav-item">
                                <a class="nav-link text-dark text-bold" href="<?php echo site_url(); ?>home">Home</a>
                            </li>
                            <li class="nav-item">


                                <a class="nav-link text-dark text-bold" href="<?php echo site_url(); ?>home/aboutus">About us</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark text-bold " href="<?php echo site_url(); ?>home/contactus">Contact us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark text-bold" href="<?php echo site_url(); ?>home/addmission">Admission</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark text-bold " href="<?php echo site_url(); ?>home/academic">Academic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark text-bold " href="<?php echo site_url(); ?>home/news">News</a>
                            </li>
                            <li class="nav-item">

                                <a class="nav-link text-dark text-bold" href="<?php echo site_url(); ?>home/notice">Notice Board</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark text-bold" href=""  data-toggle="modal" data-target="#modal-login">Login Area</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>        

        <div class="row bg-dark text-white">
            <marquee>
                <?php 

                foreach($this->notice_model->get_all_notice() as $notice): ?>
                <p style="font-size: : 20px;"><?php echo $notice['notice'];?></p>
                <?php endforeach;?>
            </marquee>
        </div>



        <!--Login  Modal -->
        <div class="modal fade" id="modal-login">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">

                    <form method="POST" action="<?php echo site_url(); ?>login" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">                        
                        <div class="form-group ">
                            <label for="name" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input class="form-control" name="username" type="text">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="name" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input class="form-control" name="password" type="password">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="name" class="col-md-4 control-label">Login Type</label>
                            <div class="col-md-6">
                                
                                <select name="login_level" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option disabled="" value="student">Student</option>
                                    <option disabled="" value="teacher">Teacher</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-8">
                                <input class="btn btn-primary btnusercreate btnper" type="submit" name="login" value="Login">
                            </div>
                        </div>

                    </form>
                  </div>                    
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>

            <!--modal end-->

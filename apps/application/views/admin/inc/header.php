
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $panel_name.' | '.$page_name; ?></title>
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
		<style type="text/css">
			thead tr{
				background-color: #473737;
			}
			#example{
				box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
			}
			.dt-buttons, .dataTables_filter{
				margin-bottom: 15px;
			}

			.dt-button{
				width: 100px;
				height:40px;
			}

			.dataTables_wrapper .dataTables_filter input{
				width: 300px;
				height:40px;
			}


			.main-navigation-menu{
				background-color: #473737;
			}	
		</style>



		
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
	</head>
	<body>
		<div id="app">
		<?php require_once('sidebar.php');
		?>

			<div class="app-content">	
				<header class="navbar navbar-default navbar-static-top">
					<!-- start: NAVBAR HEADER -->
					<div class="navbar-header">
						<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
							<i class="ti-align-justify"></i>
						</a>
						<a class="navbar-brand" href="#">

						
							<h2 style="padding-top:2% "><?php echo $this->setting->current_setting_name(); ?></h2>
						</a>
						<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
							<i class="ti-align-justify"></i>
						</a>
						<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<i class="ti-view-grid"></i>
						</a>
					</div>
					<!-- end: NAVBAR HEADER -->
					<!-- start: NAVBAR COLLAPSE -->
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-right">
							<!-- start: MESSAGES DROPDOWN -->    
								<li  style="padding-top:2%; text-align: center; ">
								<h1><?php echo $this->setting->current_setting_title(); ?></h1>
							</li>


							<li class="dropdown current-user">
								<a href class="dropdown-toggle" data-toggle="dropdown">
									<img src="<?php echo site_url(); ?>assets/images/avatar-1.jpg" alt="Peter"> 
									<span class="username"><?php echo $this->login->logged_user()->name; ?><i class="ti-angle-down"></i></i></span>
								</a>
								<ul class="dropdown-menu dropdown-dark">

									<li>
										<a href="">
											<?php echo $this->login->logged_user()->email; ?>
										</a>
									</li>
									<li>
										<a href="<?php echo site_url(); ?>admin/login/logout">
											Log Out
										</a>
									</li>
								</ul>
							</li>
							<!-- end: USER OPTIONS DROPDOWN -->
						</ul>
						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
						<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
							<div class="arrow-left"></div>
							<div class="arrow-right"></div>
						</div>
					</div>
				</header>
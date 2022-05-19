
        <?php  $this->load->view('admin/inc/header.php');?>?>

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

                        <div class="container-fluid container-fullw bg-lblue">
                            <div class="container">
                                <div class="col-md-12 align-middle">                                   
                                    <div class="row margin-top-30">
                                        <div class="col-md-12">
                                            <div class="panel panel-white col-md-8 align-middle " style="box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title"><?php echo $page_name; ?></h5>
                                                </div>
                                                <div class="panel-body">

                                                <?php foreach ($settings as $setting) 
                                                {
                                                
                                                ?>

                                                <form method="POST" action="<?php echo site_url() ?>admin/settings/update/<?php echo $setting['system_id'] ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                                                    
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Institution Name</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="system_name" type="text" id="name" value="<?php echo $setting['system_name'] ?>">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Institution Moto</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="system_title" type="text" id="name" value="<?php echo $setting['system_title'] ?>">
                                                              
                                                        </div>
                                                    </div>
                                                   <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Phone Number</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="phone" type="phone" id="name" value="<?php echo $setting['phone'] ?>">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Address</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="address" type="text" id="name" value="<?php echo $setting['address'] ?>">
                                                              
                                                        </div>
                                                    </div>
                                                     <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Email</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="email" type="email" id="name" value="<?php echo $setting['email'] ?>">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Board</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="board" type="text" id="name" value="<?php echo $setting['board'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">District</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="district" type="text" id="name" value="<?php echo $setting['district'] ?>">
                                                              
                                                        </div>
                                                    </div>
                                                     <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">City</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="city" type="text" id="name" value="<?php echo $setting['city'] ?>">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Institution Code</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="ins_code" type="number" id="name" value="<?php echo $setting['ins_code'] ?>">
                                                              
                                                        </div>
                                                    </div>

                                                     <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Language</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="language" type="text" id="name" value="<?php echo $setting['language'] ?>">
                                                              
                                                        </div>
                                                    </div>
                                                     <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Currency</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="currency" type="text" id="name" value="<?php echo $setting['currency'] ?>">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Academic Year</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="session_id">
                                                                <option  value="male">Select a Session</option>
                                                                <?php foreach ($sessions as $session) { ?>
                                                                <option  value ="<?php echo $session['session_id'] ?>" <?php echo $session['session_id']==$setting['session_id']?'selected':'' ?> ><?php echo $session['name'] ?></option>
                                                            	<?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>



                                                    

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Logo</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="logo" type="file" id="name">                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-offset-4 col-md-4">
                                                            <input class="btn btn-primary" type="submit" value="Upgrade">
                                                        </div>
                                                    </div>

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
        </div>
    </div>

    <?php  $this->load->view('admin/inc/footer.php');?>


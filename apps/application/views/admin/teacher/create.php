
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

                        <div class="container-fluid container-fullw bg-lblue">
                            <div class="container">
                                <div class="col-md-12 align-middle">                                   
                                    <div class="row margin-top-30">
                                        <div class="col-md-12">
                                            <div class="panel panel-white col-md-12 align-middle " style="box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title"><?php echo $page_name; ?></h5>
                                                </div>
                                                <div class="panel-body">

                                                <form method="POST" action="<?php echo site_url() ?>admin/teachers/store" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                                                                                                        

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Teacher Name </label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="name" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Designation</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="designation" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Birthday</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="birthday" type="date" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Gender</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="gender">
                                                                <option  value="male">Male</option>
                                                                <option  value ="female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Blood Group</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="blood_group" type="text" id="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Phone Number</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="phone" type="phone" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Present Address</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="present_address" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Email</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="email" type="email" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Father Name</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="father" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Mother Name</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="mother" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Permanent Address</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="permanent_address" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">National ID</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="nid" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                     <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Marital Status</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="marital_status">
                                                                <option  value="married">Married</option>
                                                                <option  value ="unmarried">Unmarried</option>
                                                                <option  value ="divorcer">Divorcer</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">User Name</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" autocomplete="off" name="username" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Password</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" autocomplete="off" name="password" type="password" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    





                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Photo</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="photo" type="file" id="name">                                                              
                                                        </div>
                                                    </div>



                                                    
                                                <table class="table">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Edu. Qualification</th>
                                                        <th>Year</th>
                                                        <th>Institution Name</th>
                                                        <th>Board</th>
                                                        <th>Result</th>
                                                    </tr>
                                                    <?php 
                                                    for($i=1;$i<=5;$i++){
                                                    ?>
                                                    <tr>
                                                        <th><?php echo $i;?></th>
                                                        <th><input class="form-control" type="text" name="e_qualification[]"></th>
                                                        <th><input class="form-control" type="text" name="e_year[]"></th>
                                                        <th><input class="form-control" type="text" name="e_institute[]"></th>
                                                        <th><input class="form-control" type="text" name="e_board[]"></th>
                                                        <th><input class="form-control" type="text" name="e_result[]"></th>
                                                    </tr>
                                                    <?php } ?>
                                                    
                                                </table>

                                                <table class="table">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Designation</th>
                                                        <th>Institution Name</th>
                                                        <th>Duration</th>
                                                    </tr>
                                                    <?php 
                                        for($i=1;$i<=5;$i++){
                                        ?>
                                        <tr>
                                            <th><?php echo $i;?></th>
                                            <th><input class="form-control" type="text" name="exp_designation[]"></th>
                                            <th><input class="form-control" type="text" name="exp_institute[]"></th>
                                            <th><input class="form-control" type="text" name="exp_duration[]"></th>
                                        </tr>
                                        <?php } ?>
                                                    
                                                </table>
                                                    
                                                    <div class="form-group">
                                                        <div class="col-md-offset-4 col-md-4">
                                                            <input class="btn btn-primary" type="submit" value="Create">
                                                        </div>
                                                    </div>

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
        </div>
    </div>

    <?php  $this->load->view('admin/inc/footer.php');?>


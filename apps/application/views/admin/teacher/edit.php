
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

                                                    <?php foreach ($teacher as $item) : ?>

                                                <form method="POST" action="<?php echo site_url() ?>admin/teachers/update/<?php echo $item['teacher_id'] ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                                                                                                        

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Teacher Name </label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="name" value="<?php echo $item['name'] ?>" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Designation</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="designation" value="<?php echo $item['designation'] ?>" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Birthday</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="birthday" value="<?php echo $item['birthday'] ?>"type="date" id="name">
                                                              
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
                                                            <input class="form-control" name="blood_group" value="<?php echo $item['blood_group'] ?>" type="text" id="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Phone Number</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="phone" value="<?php echo $item['phone'] ?>" type="phone" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Present Address</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="present_address" value="<?php echo $item['present_address'] ?>" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Email</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="email" value="<?php echo $item['email'] ?>" type="email" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Father Name</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="father" value="<?php echo $item['father'] ?>" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Mother Name</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="mother" value="<?php echo $item['mother'] ?>" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Permanent Address</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="permanent_address" value="<?php echo $item['permanent_address'] ?>" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">National ID</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="nid" value="<?php echo $item['nid'] ?>" type="text" id="name">
                                                              
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
                                                            <input class="form-control" autocomplete="off" name="username" value="<?php echo $item['username'] ?>" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Password</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" autocomplete="off" name="password" value="<?php echo $item['password'] ?>"type="password" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    





                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Photo</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="photo" value="<?php echo $item['photo'] ?>" type="file" id="name">                                                              
                                                        </div>
                                                    </div>

                                                    <?php 

                                                    $edu_qualification_1[0]=explode("=>",$item['edu_qualification_1']);
                                                    $edu_qualification_1[1]=explode("=>",$item['edu_qualification_2']);
                                                    $edu_qualification_1[2]=explode("=>",$item['edu_qualification_3']);
                                                    $edu_qualification_1[3]=explode("=>",$item['edu_qualification_4']);
                                                    $edu_qualification_1[4]=explode("=>",$item['edu_qualification_5']);
                                                    
                                                    $experience_1[0]=explode("=>",$item['experience_1']);
                                                    $experience_1[1]=explode("=>",$item['experience_2']);
                                                    $experience_1[2]=explode("=>",$item['experience_3']);
                                                    $experience_1[3]=explode("=>",$item['experience_4']);
                                                    $experience_1[4]=explode("=>",$item['experience_5']);
             ?>

                                                    
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
                                                    for($i=0;$i<5;$i++){
                                                    ?>
                                                    <tr>
                                                        <th><?php echo $i;?></th>
                                                        <th><input class="form-control" type="text" name="e_qualification[]" value="<?php echo $edu_qualification_1[$i][0]?>"></th>
                                                        <th><input class="form-control" type="text" name="e_year[]" value="<?php echo $edu_qualification_1[$i][1]?>"></th>
                                                        <th><input class="form-control" type="text" name="e_institute[]" value="<?php echo $edu_qualification_1[$i][2]?>"></th>
                                                        <th><input class="form-control" type="text" name="e_board[]" value="<?php echo $edu_qualification_1[$i][3]?>"></th>
                                                        <th><input class="form-control" type="text" name="e_result[]" value="<?php echo $edu_qualification_1[$i][4]?>"></th>
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
                                        for($i=0;$i<5;$i++){
                                        ?>
                                        <tr>
                                            <th><?php echo $i;?></th>
                                            <th><input class="form-control" type="text" name="exp_designation[]" value="<?php echo $experience_1[$i][0]?>"></th>
                                            <th><input class="form-control" type="text" name="exp_institute[]" value="<?php echo $edu_qualification_1[$i][1]?>"></th>
                                            <th><input class="form-control" type="text" name="exp_duration[]" value="<?php echo $edu_qualification_1[$i][2]?>"></th>
                                        </tr>
                                        <?php } ?>
                                                    
                                                </table>
                                                    
                                                    <div class="form-group">
                                                        <div class="col-md-offset-4 col-md-4">
                                                            <input class="btn btn-primary" type="submit" value="Upgrade">
                                                        </div>
                                                    </div>

                                                </form>

                                            <?php endforeach; ?>
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



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

                        <div class="container-fluid container-fullw bg-white">
                            <div class="container">
                                <div class="col-md-8 align-middle">                                   
                                    <div class="row margin-top-30">
                                        <div class="col-md-12">
                                            <div class="panel panel-white " style="box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                                                <div class="panel-heading">
                                                    <!--<h5 class="panel-title"><?php echo $page_name; ?></h5>-->
                                                </div>
                                                <div class="panel-body">
                                                <?php foreach ($student as $row): ?>

                                                    <form method="POST" action="<?php echo site_url() ?>admin/students/update/<?php echo $row ['student_id'] ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                                                        <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Class</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="class_id">
                                                                <option disabled="disabled">Select Class</option>
                                                                <?php foreach ($classes as $item) : ?>
                                                                <option value="<?php echo $item['class_id']; ?>" <?php if ($item['class_id'] ==$row['class_id']) { echo "selected";} ?> ><?php echo $item['name']; ?></option>
                                                              <?php endforeach; ?>
                                                            </select>
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Roll Number</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="roll" type="text" id="name" value="<?php echo $row ['roll'] ?>">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Name(English)</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="name_english" type="text" id="name" value="<?php echo $row ['name_english'] ?>">
                                                              
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Name(Bangla)</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="name_bangla" type="text" id="name" value="<?php echo $row ['name_bangla'] ?>">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Father Name</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="father_name" type="text" id="name" value="<?php echo $row ['father_name'] ?>">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Mother Name</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="mother_name" type="text" id="name" value="<?php echo $row ['mother_name'] ?>">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Birthday</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="birthday" type="date" id="name" value="<?php echo $row ['birthday'] ?>">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Gender</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="gender">
                                                                <option  value="male" >Male</option>
                                                                <option  value ="female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Blood</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="blood" type="text" id="name" value="<?php echo $row ['blood'] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Phone</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="phone" type="phone" id="name" value="<?php echo $row ['phone'] ?>">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Present Address</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="present_address" type="text" id="name" value="<?php echo $row ['present_address'] ?>">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Permanent Address</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="permanent_address" type="text" id="name" value="<?php echo $row ['permanent_address'] ?>">
                                                              
                                                        </div>
                                                    </div>



                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Email</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="email" type="email" id="name" value="<?php echo $row ['email'] ?>">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">National ID</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="nid" type="text" id="name" value="<?php echo $row ['nid'] ?>">
                                                              
                                                        </div>
                                                    </div>


                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Birth Registration</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="birth_registration" type="text" id="name" value="<?php echo $row ['birth_registration'] ?>">
                                                              
                                                        </div>
                                                    </div>


                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Responsible Teacher</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="responsible_teacher">
                                                                <option disabled="disabled" selected="selected">Select Teacher</option>
                                                                <?php foreach ($teachers as $item) : ?>

                                                                <option value="<?php echo $item['teacher_id']; ?>" <?php if ($item['teacher_id'] ==$row['responsible_teacher']) { echo "selected";} ?>><?php echo $item['name']; ?></option>

                                                              <?php endforeach; ?>
                                                            </select>
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Password</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="password" type="password" id="name" value="<?php echo $row ['password'] ?>">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Photo</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="photo" type="file" id="name" value="<?php echo $row ['photo'] ?>">                                                              
                                                        </div>
                                                    </div>
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



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
                                            <div class="panel panel-white col-md-8 align-middle " style="box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title"><?php echo $page_name; ?></h5>
                                                </div>
                                                <div class="panel-body">

                                                <form method="POST" action="<?php echo site_url() ?>admin/hrm_leave_setup/store" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Class</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="class_id">
                                                                <option disabled="disabled">Select Class</option>
                                                                <?php foreach ($classes as $item) : ?>
                                                                <option value="<?php echo $item['class_id']; ?>"><?php echo $item['name']; ?></option>
                                                              <?php endforeach; ?>
                                                            </select>
                                                              
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Teacher Name</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="staff_id">
                                                                <option  value="male">Male</option>
                                                                <option  value ="female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Casual Leave</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="casual_leave" type="number" id="name">
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Sick Leave</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="sick_leave" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Earned Leave</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="earned_leave" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Maternity Leave</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="maternity_leave" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>



                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Leave Without Pay</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="leave_without_pay" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Other Leave</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="other_leave" type="number" id="name">
                                                              
                                                        </div>
                                                    </div>


                                                    
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


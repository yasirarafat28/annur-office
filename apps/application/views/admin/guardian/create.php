
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

                                                <form method="POST" action="<?php echo site_url() ?>admin/students/store" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

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
                                                        <label for="name" class="col-md-4 control-label">Guardian Name</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="name" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Profession</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="profession" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Relation</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="relation" type="text" id="name">
                                                              
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
                                                            <input class="form-control" name="address" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Email</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="email" type="email" id="name">
                                                              
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Password</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="password" type="password" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Photo</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="photo" type="file" id="name">                                                              
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


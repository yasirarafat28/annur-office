
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

                                                <form method="POST" action="<?php echo site_url() ?>admin/income/store" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Devision</label>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="devision">
                                                                <option  value="madrasah" disabled="disabled" selected="selected">Select a Disvision</option>
                                                                <option  value="madrasah">Madrasah</option>
                                                                <option  value ="masjid">Masjid</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Title</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="title" type="text" id="name">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Amount</label>
                                                        <div class="col-md-6">
                                                            <input class="form-control" name="incoming" type="namber" id="name" step="any">
                                                              
                                                        </div>
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="name" class="col-md-4 control-label">Note</label>
                                                        <div class="col-md-6">
                                                            <textarea class="form-control" name="note" type="text" id="name"></textarea>
                                                              
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


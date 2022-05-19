<?php $this->load->view('public/head.php');?>
<div class="row">

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
    <div class="col-4 pt-5">

        <legend>Information</legend>
        <div class="text-dark">
            <h4><b><?php echo $this->setting->current_setting_name(); ?></b></h4>
            <p><?php echo $this->setting->current_setting_address(); ?></p>
            <p>Phone:<?php echo $this->setting->current_setting_phone(); ?></p>
            <p>Email: <span><?php echo $this->setting->current_setting_email(); ?></span></p>

        </div>
    </div>
    <div class="col-4">
        <div class="pt-5">

            <legend>Submit an Inquiry</legend>
            <form class="form-horizontal"  accept-charset="UTF-8"  method="POST" action="<?php echo site_url() ?>inquiry/store">
                <div class="form-group">
                    <label for="InputName">Your Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required>

                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Your Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">

                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Your Phone</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" required>

                    </div>
                </div>
                <div class="form-group">
                    <label for="InputMessage">Message</label>
                    <div class="input-group">
                        <textarea name="message" id="message" class="form-control" rows="5" required></textarea>

                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-offset-4 col-md-8">
                        <input class="btn btn-primary btnusercreate btnper" type="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
        </form>
    </div>
    <div class="col-4  p-5">
        <legend>Additional Information</legend>
        <div class="p-5">

            <?php foreach ($content as $key => $value): ?>

                <?php echo $value['description'] ?>
                
            <?php endforeach ?>
            
        </div>
    </div>
</div>

<?php $this->load->view('public/footer.php');?>

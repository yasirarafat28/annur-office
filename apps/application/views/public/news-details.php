
<?php $this->load->view('public/head.php');?>

    <?php foreach ($news as $key => $value): ?>

    <div class="row pt-5 text-center">
        <legend><?php echo $value['title'] ?></legend>
    </div>

    <div class="row p-5">
        <div class="devs_history_body">


            <div class="history-message">
                <img src="<?php echo site_url().$value['photo'] ?>"class="img-responsive" alt="">               
            </div>
            <h3><?php echo $value['title'] ?></h3>
            <div class="text-justify">
                <?php echo $value['description'] ?>                
            </div>

                
        </div>

        <!--<div id="history_widget" class="col-md-3 col-lg-3 history-widget text-center">
            <div class="devs-item">
                <div class="devs-well">
                    <img src="https://www.bubt.edu.bd/assets/frontend/images/mill_3.jpg" alt="">
                    <a href="https://www.bubt.edu.bd/home/achievement_description/30">
                        <p class="devs-acchievement-desc">Mill Visit Activities</p>
                    </a>
                </div>
            </div>
        </div>-->
    </div>
    <?php endforeach ?>



<?php $this->load->view('public/footer.php');?>
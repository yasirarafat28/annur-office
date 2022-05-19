
<?php $this->load->view('public/head.php');?>



    <div class="row">
        <div class="col-12 pt-5 text-center">
            <legend><h2>Madrasha News</h2></legend>
        </div>
        <div class="col-md-12 pt-5">
            <div class="blog-item">
                <?php foreach ($news as $key => $row): ?>
                <div class="col-md-4 col-sm-4 mb-5"  style="height: 476px">
                    <div class="col-xs-12 col-md-12 col-sm-12 blog_wrap nopadding">
                    	<div class="blog-sec-margin">
                            <img src="<?php echo site_url().$row['photo'] ?>" style="height: 100%; width: 340px;" class="img-responsive" alt="">
                        </div>
                        <div ><b>Published : <?php echo date("h:i a  d-M, Y  ",strtotime($row['created_at'])) ?></b></div>
                        <div class="devs-blogdiscrip">
                            <h3>
                                <a href="<?php echo site_url() ?>home/news_details/<?php echo $row['news_id'] ?>"><?php echo $row['title']  ?></a>
                            </h3>
                            <p class="text-justify">
                                <?php echo  substr(strip_tags($row['description']), 0, 490)?>

                            </p>
                        </div>
                        <div>
                        	<a href="<?php echo site_url() ?>home/news_details/<?php echo $row['news_id'] ?>" class="btn btn-primary">Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>

    </div>



<?php $this->load->view('public/footer.php');?>
<?php $this->load->view('public/head.php');?>
        <div class="row">
            <div class="col m-0 p-0">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="<?php echo site_url(); ?>images/madrash-1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="<?php echo site_url(); ?>images/madrash-2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="<?php echo site_url(); ?>images/madrash-3.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

      <div class="row" style="background-image: linear-gradient(to bottom, #ddd, #fff);">
        <div class="col-sm-4 p-5 text-center text-success">
          <p class="size-h1 no-margin "><span class="count" style="font-size: 40px;">10+</span></p>
          <p class="text-primary" style="font-size: 24px"><span>Classes</span></p>
        </div>
        <div class="col-sm-4 p-5 text-center text-success">
          <p class="size-h1 no-margin "><span class="count" style="font-size: 40px;">30+</span></p>
          <p class="text-primary" style="font-size: 24px"><span>Teachers</span></p>
          
        </div>
        <div class="col-sm-4 p-5 text-center text-success">
          <p class="size-h1 no-margin "><span class="count" style="font-size: 40px;"> 350+</span></p>
          <p class="text-primary" style="font-size: 24px"><span>Students</span></p>
          
        </div>
      </div>



    <div class="row mt-3 text-center pt-3">

        <legend><h2>Madrasha News</h2></legend>

        <div class="col-md-12">
            <div class="blog-item">
              <?php foreach ($news as $key => $row): ?>
                <div class="col-md-4 col-sm-4 mb-5" style="height: 476px">
                    <div class="col-xs-12 col-md-12 col-sm-12 blog_wrap nopadding">
                        <div class="blog-sec-margin">
                            <img src="<?php echo site_url().$row['photo'] ?>" style="height: 100%; width: 340px;" class="img-responsive" alt="">
                        </div>
                        <div class="text-left" ><b>Published : <?php echo date("h:i a  d-M, Y  ",strtotime($row['created_at'])) ?></b></div>
                        <div class="text-left">
                            <h4>
                                <a href="<?php echo site_url() ?>home/news_details/<?php echo $row['news_id'] ?>"><?php echo $row['title']  ?></a>
                            </h4>
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
        <div class="col-sm-12 text-center">
            <a href="<?php echo site_url() ?>home/news" class="btn btn-warning">View More</a>
        </div>
    </div>


        <div class="clear"> </div>

       <?php $this->load->view('public/footer.php');?>

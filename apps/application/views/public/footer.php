   <!--<div class="row mt-5">
            <div class="footer">
                <div class="text-center">
                    <span>
                        <i>Copyright © 2017 Bright Smile</i>
                    </span>
                </div>
            </div>
        </div>-->

        <div class="row mt-1 p-3" style="background-image: linear-gradient(to bottom, #fff, #bbb);">
          
            <div class="col-sm-6 text-center">
              <legend>Information</legend>
    					<h3><strong><?php echo $this->setting->current_setting_name(); ?></strong></h3>
    					<p> ঠিকানা  :  <?php echo $this->setting->current_setting_address(); ?></p>
    					<p> মোবাইল  : <?php echo $this->setting->current_setting_phone(); ?> </p>
    					<p> ইমেইল : <?php echo $this->setting->current_setting_email(); ?></p>

    					<a href="#" class="fa fa-facebook social"></a>
    					<a href="#" class="fa fa-twitter social"></a>
    					<a href="#" class="fa fa-linkedin social"></a>
    					<a href="#" class="fa fa-youtube social"></a>
    					<a href="#" class="fa fa-skype social"></a>
    					<a href="#" class="fa fa-android social"></a>
            </div>
            <div class="col-sm-3">
              <legend>Quick Access </legend>
              <div class="list-group">
                <a href="<?php echo site_url() ?>" class="list-group-item"><i class="fa fa-external-link"></i> Home</a>
                <a href="<?php echo site_url() ?>home/aboutus" class="list-group-item"><i class="fa fa-external-link"></i> About us</a>
                <a href="<?php echo site_url() ?>home/contactus" class="list-group-item"><i class="fa fa-external-link"></i> Contact us</a>
                <a href="<?php echo site_url() ?>home/academic" class="list-group-item"><i class="fa fa-external-link"></i> Academic Information</a>
                <a href="<?php echo site_url() ?>home/addmission" class="list-group-item"><i class="fa fa-external-link"></i> Admission Information</a>
                <a href="<?php echo site_url() ?>home/news" class="list-group-item"><i class="fa fa-external-link"></i> Campus News</a>
                <a href="<?php echo site_url() ?>home/notice" class="list-group-item"><i class="fa fa-external-link"></i> Noticeboard Updates</a>
              </div>
            </div>
            <div class="col-sm-3">
              <legend>Reference </legend>
              <div class="list-group">
                <a href="http://mrislamiclibrary.com/" target="_blank" class="list-group-item"><i class="fa fa-external-link"></i> MR Islamic Library</a>
                <a href="http://softntechnology.com" target="_blank" class="list-group-item"><i class="fa fa-external-link"></i> Software and Technology</a>
              </div>
            </div>

        </div>
        <div class="row mt-1 text-center pl-5 bg-dark">
			     <p class="text-center text-white"> <a style="color: #ddd;" href="<?php echo site_url(); ?>" class="text-center"><strong><?php echo $this->setting->current_setting_name(); ?></strong></a>   © <?php echo date("Y") ?> All Right Reserved. Designed and Developed by: <strong><a style="color: #ddd;" href="http://www.softntechnology.com" target="_blank">SoftNtechnology.Com</a></strong></p>
        </div>
</div>

<style>
.list-group-item{
  padding: 3px;
  border: none;
  background-color: transparent;
}

.social {
  padding: 5px;
  font-size: 20px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}

.fa-pinterest {
  background: #cb2027;
  color: white;
}

.fa-snapchat-ghost {
  background: #fffc00;
  color: white;
  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
}

.fa-skype {
  background: #00aff0;
  color: white;
}

.fa-android {
  background: #a4c639;
  color: white;
}
</style>
</body>
</html>

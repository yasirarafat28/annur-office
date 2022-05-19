
<?php $this->load->view('public/head.php');?>


<div class="row pt-5 text-center">
    <legend>NoticeBoard</legend>
</div>

<div class="row p-5">



    <?php foreach ($all_notice as $item): ?>
    <button class="accordion"><?php echo $item['notice_title']; ?></button>

    <div class="panel border-dark">
      <p><?php echo $item['notice']; ?></p>
      <p><b>Published : <?php echo date("h:i a  d-M, Y  ",strtotime($item['created_at'])) ?></b></p>
    </div>

<?php endforeach; ?>

</div>


    <style>
.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}
.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
</style>


<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>



<?php $this->load->view('public/footer.php');?>
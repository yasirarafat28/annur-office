
<?php $this->load->view('public/head.php');?>
<div>
	<div class="row mt-5 text-center">
		<legend>Addmission</legend>
	</div>
    <div class="row mt-3 p-5 pt-0">
        <div class="col">

        	<?php foreach ($content as $key => $value): ?>
        		<?php echo $value['description'] ?>
        		
        	<?php endforeach ?>
        </div>
    </div>



<?php $this->load->view('public/footer.php');?>
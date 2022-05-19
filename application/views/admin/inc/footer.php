
<footer>
	<div class="footer-inner">
		<div class="pull-left">
			&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> <?php echo $this->setting->current_setting_name(); ?></span>. <span>Copyright © 2018 Software & Technology</span>
		</div>
		<div class="pull-right">
			<span class="go-top"><i class="ti-angle-up"></i></span>
		</div>
	</div>
</footer>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="<?php echo site_url(); ?>vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/modernizr/modernizr.js"></script>
		<script src="<?php echo site_url(); ?>vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="<?php echo site_url(); ?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo site_url(); ?>vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/autosize/autosize.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/selectFx/classie.js"></script>
		<script src="<?php echo site_url(); ?>vendor/selectFx/selectFx.js"></script>
		<script src="<?php echo site_url(); ?>vendor/select2/select2.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo site_url(); ?>vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="<?php echo site_url(); ?>assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="<?php echo site_url(); ?>assets/js/form-elements.js"></script>

		 <!-- include summernote css/js-->
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">

	    <link href="https://rawgit.com/tylerecouture/summernote-list-styles/master/summernote-list-styles.css" rel="stylesheet">

	    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>
	    <script src="https://rawgit.com/tylerecouture/summernote-list-styles/master/summernote-list-styles.js"></script>
	    <script>
		    $(document).ready(function() {
		        $('.summernote').summernote({
		            height: 220,

		            toolbar: [
		                ['style', ['bold', 'italic', 'underline', 'clear','font']],
					    ['font', ['strikethrough', 'superscript', 'subscript']],
					    ['fontname', ['fontname']],
					    ['fontsize', ['fontsize']],
					    ['color', ['color']],
		                ['para', ['ul', 'ol', 'listStyles', 'paragraph']],
		                ['misc', ['codeview']],
		    			['height', ['height']]
		            ]
		        });
		    });

		</script>


	    <!-- Summernote End -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>

		<!--datatable Start-->

	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!--<script type="text/javascript" src="{{ asset('js/jquery-datatable-custom.js') }}"></script>-->

    <script type="text/javascript">
		$(document).ready(function() {
		  $('#example').DataTable( {
		    "bFilter": true,
		    "pageLength": 20,
		    dom: 'Bfrtip',
		    buttons: [
		              {
		              extend: 'excelHtml5',
		              text: '<i class="fa fa-file-excel-o"></i> Excel',
		              titleAttr: 'Export to Excel',
		              exportOptions: {
		              columns: ':not(:last-child)',
		              }
		              },
		              {
		              extend: 'csvHtml5',
		              text: '<i class="fa fa-file-text-o"></i> CSV',
		              titleAttr: 'CSV',
		              exportOptions: {
		              columns: ':not(:last-child)',
		              }
		              },
		              {
		              extend: 'pdfHtml5',
		              text: '<i class="fa fa-file-pdf-o"></i> PDF',
		              titleAttr: 'PDF',
		              exportOptions: {
		              columns: ':not(:last-child)',
		              },
		              },
		              {
		              extend: 'print',
		              exportOptions: {
		              columns: ':visible'
		              },
		              customize: function(win) {
		              $(win.document.body).find( 'table' ).find('td:last-child, th:last-child').remove();
		              }
		              }
		            ],


		    columnDefs: [ {
		      targets: -1,
		      visible: true
		    } ]
		  } );
		} );
    </script>

    <!--Datatable end-->

	</body>
	<style>
		
	.main-navigation-menu{
		background-color: #473737;
	}	
	</style>
</html>

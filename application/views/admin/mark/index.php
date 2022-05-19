
				<?php $this->load->view('admin/inc/header.php');?>

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

						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<div>

	          							<form class="form-inline" method="GET">
										    <div class="form-group">
										      <a  data-toggle="modal" data-target="#modal-create" href="" class=" btn btn-primary form-control" title="Add New teacher" style="border-radius: 0px"><i class="fa fa-plus" aria-hidden="true"></i> Add New Income</a>
										    </div>


										    <div class="form-group">
			      								<select class="form-control" name="division">
                                        			<option  value="madrasah" disabled="disabled" selected="selected">Select a Disvision</option>
                                                    <option <?php if(isset($_GET['division'])){ echo $_GET['division']=='madrasah'? 'selected':''  ; } ?>  value="madrasah">Madrasah</option>
                                                    <option <?php if(isset($_GET['division'])){ echo $_GET['division']=='masjid'? 'selected':''; }?> value ="masjid">Masjid</option>
                                                </select>
										    </div>
										    <div class="form-group">
			      								<input class="form-control" name="date_from" type="date" value="<?php echo isset($_GET['date_from'])? $_GET['date_to']:'' ; ?>">
										    </div>

										    <div class="form-group">
			      								<input class="form-control" name="date_to" type="date" value="<?php echo isset($_GET['date_to'])? $_GET['date_to']:'' ?>">
										    </div>

										    <div class="form-group">
			      								<button class="form-control" type="submit" form="search">Search</button>
										    </div>
										  </form>


											<p style="color:red;"><?php echo isset($_SESSION['msg'])?$_SESSION['msg']:'';?></p>
										
									</div>

									<table class="table table-bordered table-striped table-hover  dataTable" id="example" >
										<thead>
											<tr>
												<th class="center">#</th>
												<th>TxID</th>
												<th>Division</th>
												<th>Title</th>
												<th>Amount</th>
												<th>Action</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$cnt=1;
											foreach($incomes as $row)
											{
											?>
											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo strtoupper($row['txid']);?></td>
												<td><?php echo ucfirst($row['division']);?></td>
												<td class="hidden-xs"><?php echo $row['title'];?></td>
												<td><?php echo $row['incoming'];?></td>
												</td>
												<td >
													<!--Row Delete Start -->
													<a href="<?php echo site_url(); ?>admin/mark/delete/<?php echo $row['transaction_id'];?>" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="Remove"><i class="fa fa-times fa fa-white"></i></a>

													<!--Row Delete End -->

													<!-- Row Edit Start-->

													<a  data-toggle="modal" data-target="#modal-edit<?php echo $row['transaction_id'];?>"  href="" class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="Edit"><i class="fa fa-pencil"></i></a>


										            <!-- Modal -->
										            <div class="modal fade" id="modal-edit<?php echo $row['transaction_id'];?>">
										              <div class="modal-dialog">
										                <div class="modal-content">
										                  <div class="modal-header">
										                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										                      <span aria-hidden="true">&times;</span></button>
										                    <h4 class="modal-title">Update User</h4>
										                  </div>
										                  <div class="modal-body">
										     
									                        <form method="POST" action="<?php echo site_url(); ?>admin/mark/update/<?php echo $row['transaction_id'];?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">


			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">TxId</label>
			                                                        <div class="col-md-6">
								                                    	<p class="form-control"><?php echo strtoupper($row['txid']); ?></p>
			                                                              
			                                                        </div>
			                                                    </div>

									                            
									                            <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Division</label>
			                                                        <div class="col-md-6">
			                                                            <select class="form-control" name="division">

                                                                			<option  value="madrasah" disabled="disabled" selected="selected">Select a Disvision</option>
			                                                                <option  value="madrasah" <?php $row['division']=='madrasah'?'selected':'' ?> >Madrasah</option>
			                                                                <option  value ="masjid" <?php $row['division']=='masjid'?'selected':'' ?>>Masjid</option>
			                                                            </select>
			                                                        </div>
			                                                    </div>

			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Title</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="title" type="text" id="name" value="<?php echo $row['title']; ?>">
			                                                              
			                                                        </div>
			                                                    </div>

			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Amount</label>
			                                                        <div class="col-md-6">
			                                                            <input class="form-control" name="incoming" type="namber" id="name" step="any" value="<?php echo $row['incoming']; ?>">
			                                                              
			                                                        </div>
			                                                    </div>

			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Note</label>
			                                                        <div class="col-md-6">
			                                                            <textarea class="form-control" name="note" type="text" id="name"><?php echo $row['note']; ?></textarea>
			                                                              
			                                                        </div>
			                                                    </div>

								                                <div class="form-group">
								                                    <div class="col-md-offset-4 col-md-8">
								                                        <input class="btn btn-primary btnusercreate btnper" type="submit" value="Update">
								                                    </div>
								                                </div>

									                            </form>
									                      </div>                    
									                    </div>
									                    <!-- /.modal-content -->
									                  </div>
									                  <!-- /.modal-dialog -->
									                </div>

									                <!--Row Edit End-->


									                <!--Row View Start-->


													<a  data-toggle="modal" data-target="#modal-view<?php echo $row['transaction_id'];?>" class="btn btn-success btn-xs tooltips" tooltip-placement="top" title="View"><i class="fa fa-eye"></i></a>

										            <!-- Modal -->
										            <div class="modal fade" id="modal-view<?php echo $row['transaction_id'];?>">
										              <div class="modal-dialog">
										                <div class="modal-content">
										                  <div class="modal-header">
										                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										                      <span aria-hidden="true">&times;</span></button>
										                    <h4 class="modal-title">View Income</h4>
										                  </div>
										                  <div class="modal-body">
										     
									                        <form method="POST" action="" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">TxID</label>
			                                                        <div class="col-md-6">
								                                    	<p class="form-control"><?php echo strtoupper($row['txid']); ?></p>
			                                                              
			                                                        </div>
			                                                    </div>

								                                <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Division</label>
			                                                        <div class="col-md-6">
								                                    	<p class="form-control"><?php echo $row['division'] ?></p>
			                                                        </div>
			                                                    </div>

			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Title</label>
			                                                        <div class="col-md-6">
								                                    	<p class="form-control"><?php echo $row['title'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>

			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Amount</label>
			                                                        <div class="col-md-6">
								                                    	<p class="form-control"><?php echo $row['incoming'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>

			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Note</label>
			                                                        <div class="col-md-6">
								                                    	<p class="form-control"><?php echo $row['note'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>

								                                <div class="form-group ">
								                                    <label for="password" class="col-md-4 control-label">Status</label>
								                                    <div class="col-md-6">
								                                    	<p class="form-control"><?php echo $row['status']==1? 'Active' :'Inactive' ?></p>
								                                        
								                                    </div>
								                                </div>

			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Created Date</label>
			                                                        <div class="col-md-6">
								                                    	<p class="form-control"><?php echo $row['created_at'] ?></p>
			                                                              
			                                                        </div>
			                                                    </div>

			                                                    <div class="form-group ">
			                                                        <label for="name" class="col-md-4 control-label">Last Updated</label>
			                                                        <div class="col-md-6">
								                                    	<p class="form-control"><?php echo $row['updated_at'] ?></p>

									                        </form>
									                      </div>                    
									                    </div>
									                    <!-- /.modal-content -->
									                  </div>
									                  <!-- /.modal-dialog -->
									                </div>


									                <!--Row View End-->
												</td>
												</td>
											</tr>

											<?php
												$cnt=$cnt+1;
											 }

											 ?>


										</tbody>
									</table>



						            <!-- Modal -->
						            <div class="modal fade" id="modal-create">
						              <div class="modal-dialog">
						                <div class="modal-content">
						                  <div class="modal-header">
						                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                      <span aria-hidden="true">&times;</span></button>
						                    <h4 class="modal-title">Submit Mark</h4>
						                  </div>
						                  <div class="modal-body">
						     
						                        <form method="POST" action="<?php echo site_url(); ?>admin/mark/store/" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                                                        <div class="form-group ">
                                                            <label for="name" class="col-md-4 control-label">Class</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control" name="class_id"  onchange="get_exam_by_class(this.value)" id="class_id">
                                                                    <option disabled="disabled">Select Class</option>
                                                                    <?php foreach ($classes as $item) : ?>
                                                                    <option value="<?php echo $item['class_id']; ?>"><?php echo $item['name']; ?></option>
                                                                  <?php endforeach; ?>
                                                                </select>
                                                                  
                                                            </div>
                                                         </div>
                                                        <div class="form-group ">
                                                            <label for="name" class="col-md-4 control-label">Exam Name</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control" name="exam_id"  onchange="get_exam_subject_by_exam(this.value)" id="exam_id">
                                                                </select>
                                                                  
                                                            </div>
                                                         </div>

                                                        <div class="form-group ">
                                                            <label for="name" class="col-md-4 control-label">Subject</label>
                                                            <div class="col-md-6">
                                                                <select class="form-control" name="subject_id"  onchange="get_mark_submit_form( $('#class_id').val() )" id="subject_id">
                                                                </select>
                                                                  
                                                            </div>
                                                         </div>


                                                        <div id="mark-submit-form"></div>

						                        </form>
						                      </div>                    
						                    </div>
						                    <!-- /.modal-content -->
						                  </div>
						                  <!-- /.modal-dialog -->
						                </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
<script>
    function get_mark_submit_form(class_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url(); ?>admin/ajax_function/get_mark_submit_form",
            data: 'class_id=' + class_id,
            success: function (data) {
                $("#mark-submit-form").html(data);
            }
        });
    }
</script>


<script>
    function get_exam_by_class(class_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url(); ?>admin/ajax_function/get_exam_by_class",
            data: 'class_id=' + class_id,
            success: function (data) {
                $("#exam_id").html(data);
            }
        });
    }
</script>


<script>
    function get_exam_subject_by_exam(exam_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url(); ?>admin/ajax_function/get_exam_subject_by_exam",
            data: 'exam_id=' + exam_id,
            success: function (data) {
                $("#subject_id").html(data);
            }
        });
    }
</script>

	<?php  $this->load->view('admin/inc/footer.php');?>?>



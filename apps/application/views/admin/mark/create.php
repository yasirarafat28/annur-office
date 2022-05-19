
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
                                            <div class="panel panel-white col-md-12 align-middle " style="box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title"><?php echo $page_name; ?></h5>
                                                </div>
                                                <div class="panel-body">

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
                                                                <select class="form-control" name="subject_id"  onchange="get_mark_submit_form( $('#class_id').val(), $('#exam_id').val(), this.value )" id="subject_id">
                                                                </select>
                                                                  
                                                            </div>
                                                         </div>


                                                        <div id="mark-submit-form"></div>

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

            
<script>
    function get_mark_submit_form(class_id,exam_id,subject_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url(); ?>admin/ajax_function/get_mark_submit_form",
            data:'class_id='+class_id+'&exam_id='+exam_id+'&subject_id='+subject_id,
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

    <?php  $this->load->view('admin/inc/footer.php');?>



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

                                                    <?php foreach ($examination as $row) : ?>

                                                    <form method="POST" action="<?php echo site_url(); ?>admin/examination/store/" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">



                                                        <div class="form-group ">
                                                            <label for="name" class="col-md-4 control-label">Examination Title</label>
                                                            <div class="col-md-6">
                                                                <p class="form-control"><?php echo $row['title']; ?></p>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="name" class="col-md-4 control-label">Examination Description</label>
                                                            <div class="col-md-6">
                                                                <p class="form-control"><?php echo $row['description']; ?></p>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="name" class="col-md-4 control-label">Class</label>
                                                            <div class="col-md-6">
                                                                <p class="form-control"><?php echo $row['class_name']; ?></p>
                                                                
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <table class="table table-bordered table-striped table-hover">
                                                            <thead>
                                                                <th>Subject Name</th>
                                                                <th>Exam Date</th>
                                                                <th>Exam Duration</th>
                                                                <th>Full Mark</th>
                                                                <th>Pass Mark</th>
                                                            </thead>
                                                            <tbody>


                                                        <?php
                                                        foreach ($examination_details as $item):
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $item['subject_name'] ?></td>
                                                            <td>
                                                                <?php echo $item['exam_date'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $item['exam_duration'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $item['total_marks'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $item['pass_marks'] ?>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                        endforeach;
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                    </form>

                                                <?php endforeach; ?>
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
        </div>
    </div>
<script>
    function get_exam_form(class_id) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url(); ?>admin/ajax_function/get_exam_form",
            data: 'class_id=' + class_id,
            success: function (data) {
                $("#exam-form").html(data);
            }
        });
    }
</script>

    <?php  $this->load->view('admin/inc/footer.php');?>


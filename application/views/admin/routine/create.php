
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

                        <div class="container-fluid container-fullw bg-white">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>

                                        <form class="form-inline" method="GET">

                                            <div class="form-group">
                                                <select class="form-control " name="class_id" onchange="this.form.submit()" id="class_id">
                                                    <?php foreach ($classes as $item): ?>

                                                    <option value="<?php echo $item['class_id'] ?>"><?php echo $item['name'] ?></option>

                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                          </form>


                                            <p style="color:red;"><?php echo isset($_fee_structure['msg'])?$_fee_structure['msg']:'';?></p>
                                        
                                    </div>

                                    <form method="POST" action="<?php echo site_url(); ?>admin/routine/store">
                                        
                                                    <input hidden="hidden" type="text" name="class_id" value="<?php echo $this->input->get('class_id'); ?>">

                                    <table class="table table-bordered table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th class="center">Subject</th>
                                                <th class="center">Saturday</th>
                                                <th class="center">Sunday</th>
                                                <th class="center">Monday</th>
                                                <th class="center">Tuesday</th>
                                                <th class="center">Wednesday</th>
                                                <th class="center">Thursday</th>
                                                <th class="center">Friday</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($subjects as $subject) : ?>
                                            <tr>
                                                <td><?php echo $subject['name'] ?></td>
                                                <td>
                                                    <input hidden="hidden" type="text" name="day[]" value="0">
                                                    <input hidden="hidden" type="number" name="subject_id[0][]" value="<?php echo $subject['subject_id'] ?>">
                                                    <input class="form-group" type="time" name="fromtime[0][]">
                                                    <small style="text-align: center;">to</small>
                                                    <input class="form-group"  type="time" name="totime[0][]"">
                                                </td>
                                                <td>
                                                    <input hidden="hidden" type="text" name="day[]" value="1">
                                                    <input hidden="hidden" type="number" name="subject_id[1][]" value="<?php echo $subject['subject_id'] ?>">
                                                    <input class="form-group" type="time" name="fromtime[1][]">
                                                    <small style="text-align: center;">to</small>
                                                    <input class="form-group"  type="time" name="totime[1][]"">
                                                </td>
                                                <td>
                                                    <input hidden="hidden" type="text" name="day[]" value="2">
                                                    <input hidden="hidden" type="number" name="subject_id[2][]" value="<?php echo $subject['subject_id'] ?>">
                                                    <input class="form-group" type="time" name="fromtime[2][]">
                                                    <small style="text-align: center;">to</small>
                                                    <input class="form-group"  type="time" name="totime[2][]"">
                                                </td>
                                                <td>
                                                    <input hidden="hidden" type="text" name="day[]" value="3">
                                                    <input hidden="hidden" type="number" name="subject_id[3][]" value="<?php echo $subject['subject_id'] ?>">
                                                    <input class="form-group" type="time" name="fromtime[3][]">
                                                    <small style="text-align: center;">to</small>
                                                    <input class="form-group"  type="time" name="totime[3][]"">
                                                </td>
                                                <td>
                                                    <input hidden="hidden" type="text" name="day[]" value="4">
                                                    <input hidden="hidden" type="number" name="subject_id[4][]" value="<?php echo $subject['subject_id'] ?>">
                                                    <input class="form-group" type="time" name="fromtime[4][]">
                                                    <small style="text-align: center;">to</small>
                                                    <input class="form-group"  type="time" name="totime[4][]"">
                                                </td>
                                                <td>
                                                    <input hidden="hidden" type="text" name="day[]" value="5">
                                                    <input hidden="hidden" type="number" name="subject_id[5][]" value="<?php echo $subject['subject_id'] ?>">
                                                    <input class="form-group" type="time" name="fromtime[5][]">
                                                    <small style="text-align: center;">to</small>
                                                    <input class="form-group"  type="time" name="totime[5][]"">
                                                </td>
                                                <td>
                                                    <input hidden="hidden" type="text" name="day[]" value="6">
                                                    <input hidden="hidden" type="number" name="subject_id[6][]" value="<?php echo $subject['subject_id'] ?>">
                                                    <input class="form-group" type="time" name="fromtime[6][]">
                                                    <small style="text-align: center;">to</small>
                                                    <input class="form-group"  type="time" name="totime[6][]"">
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="8">
                                                    <div class="form-group">
                                                        <div class="col-md-offset-4 col-md-4">
                                                            <input class="btn btn-primary" type="submit" onclick="return confirm('Are you sure?');" value="Setup Routine">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>    
                                        </tbody>
                                    </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    function get_session_list(val)
    {
        $.ajax({
            type:"POST",
            url: '<?php echo site_url(); ?>admin/ajax_function/get_session_list',
            data:'class_id='+val,
            success: function(data){
                $('#session_id').html(data);
            }
        });
    }
</script>

<script type="text/javascript">
    function get_exam_list_by_session_class(session_id,class_id)
    {
        $.ajax({
            type:"POST",
            url: '<?php echo site_url(); ?>admin/ajax_function/get_exam_list_by_session_class',
            data:'session_id='+session_id+'&class_id='+class_id,
            success: function(data){
                $('#exam_id').html(data);
            }
        });
    }
</script>
    <?php  $this->load->view('admin/inc/footer.php');?>?>



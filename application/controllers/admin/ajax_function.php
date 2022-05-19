<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ajax_aunction extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');
        session_start();
        $this->load->model('login');
        $this->login->not_logged_redirect();
        $this->load->model('setting');   
        $this->load->model('mark_model');

    }



    public function get_student_list_by_class()
    {

        if ($this->input->post()) 
        {
            $class_id   =   $this->input->post('class_id');

            $students=  $this->db->get_where('student',array('class_id'=>$class_id,'session_id'=>$this->setting->current_session_id()))->result_array();
            ?>
            <option value="" disabled="disabled" selected="selected">Select a Student</option>

            <?php
            foreach ($students as $row) {
            ?>
            <option value=" <?php echo $row['student_id']; ?>"> <?php echo $row['name_bangla']; ?></option>

            <?php
            }

        }
        else
        {
            echo '';
        }

    }
    public function get_class()
    {

        if ($this->input->post()) 
        {
            //$token   =   $this->input->post('token');

            $classes=  $this->db->get_where('class',array('status'=>1))->result_array();
            ?>
            <option value="" disabled="disabled" selected="selected">Select a Student</option>

            <?php
            foreach ($classes as $row) {
            ?>
            <option value=" <?php echo $row['class_id']; ?>"> <?php echo $row['name']; ?></option>

            <?php
            }

        }
        else
        {
            echo '';
        }

    }

    public function get_exam_by_class()
    {

        if ($this->input->post()) 
        {
            $class_id   =   $this->input->post('class_id');

            $exams=  $this->db->get_where('exam',array('class_id'=>$class_id, 'status'=>1,'session_id'=>$this->setting->current_session_id() ))->result_array();
            ?>
            <option value="" disabled="disabled" selected="selected">Select an Exam</option>

            <?php
            foreach ($exams as $row) {
            ?>
            <option value="<?php echo $row['exam_id']; ?>"> <?php echo $row['title']; ?></option>

            <?php
            }

        }
        else
        {
            echo '';
        }

    }

    public function get_exam_subject_by_exam()
    {

        if ($this->input->post()) 
        {
            $exam_id   =   $this->input->post('exam_id');

            $this->db->select('*');
            $this->db->from('exam_details');
            $this->db->join('subject','subject.subject_id=exam_details.subject_id');
            $this->db->where('exam_details.exam_id',$exam_id);
            $subjects   =   $this->db->get()->result_array();

            ?>
            <option value="" disabled="disabled" selected="selected">Select an Subject</option>

            <?php
            foreach ($subjects as $row) {
            ?>
            <option value=" <?php echo $row['subject_id']; ?>"> <?php echo $row['name']; ?></option>

            <?php
            }

        }
        else
        {
            echo '';
        }

    }

    public function get_month()
    {

        if ($this->input->post()) 
        {
            $class_id   =   $this->input->post('class_id');
            ?>
            <option value="" disabled="disabled" selected="selected">Select a Month</option>
            <option value="january">January</option>
            <option value="february">February</option>
            <option value="march">March</option>
            <option value="april">April</option>
            <option value="may">May</option>
            <option value="june">June</option>
            <option value="july">July</option>
            <option value="august">August</option>
            <option value="september">September</option>
            <option value="october">October</option>
            <option value="november">November</option>
            <option value="december">December</option>

            <?php

        }
        else
        {
            echo '';
        }

    }

    public function get_session_list()
    {

        if ($this->input->post()) 
        {
            $sessions=    $this->db->get_where('session',array('status'=>1))->result_array();
            ?>
            <option value="" readonly selected="">Promoted to Session</option>
            <?php
            foreach ($sessions as $item):
            ?>
            
                <option value="<?php echo $item['session_id'] ?>"><?php echo $item['name'] ?></option>

            <?php
            endforeach;
        }
    }

    public function get_exam_list_by_session_class()
    {

        if ($this->input->post('session_id') && $this->input->post('class_id')) 
        {
            $exams=    $this->db->get_where('exam',array('status'=>1,'session_id'=>$this->input->post('session_id'),'class_id'=>$this->input->post('class_id')))->result_array();
            ?>
            <option value="" readonly selected="">Select an Examination</option>
            <?php
            foreach ($exams as $item):
            ?>
            
                <option value="<?php echo $item['exam_id'] ?>"><?php echo $item['title'] ?></option>

            <?php
            endforeach;
        }
    }






    public function get_fee_form()
    {

        if ($this->input->post()) 
        {
            $student_id   =   $this->input->post('student_id');
            ?>
            
            <div class="form-group ">
                <label for="name" class="col-md-4 control-label">Admission Fee</label>
                <div class="col-md-6">
                    <input class="form-control" name="addmission_fee" type="number" id="name" val>
                      
                </div>
            </div>
           <div class="form-group ">
                <label for="name" class="col-md-4 control-label">Tuition Fee</label>
                <div class="col-md-6">
                    <input class="form-control" name="tution_fee" type="number" id="name">
                      
                </div>
            </div>
           <div class="form-group ">
                <label for="name" class="col-md-4 control-label">Service Fee</label>
                <div class="col-md-6">
                    <input class="form-control" name="service_fee" type="number" id="name">
                      
                </div>
            </div>
           <div class="form-group ">
                <label for="name" class="col-md-4 control-label">Breakfast Fee</label>
                <div class="col-md-6">
                    <input class="form-control" name="breakfast_fee" type="number" id="name">
                      
                </div>
            </div>
           <div class="form-group ">
                <label for="name" class="col-md-4 control-label">Meal Fee</label>
                <div class="col-md-6">
                    <input class="form-control" name="meal_fee" type="number" id="name">
                      
                </div>
            </div>
           <div class="form-group ">
                <label for="name" class="col-md-4 control-label">Habitation Fee</label>
                <div class="col-md-6">
                    <input class="form-control" name="habitation_fee" type="number" id="name">
                      
                </div>
            </div>
           <div class="form-group ">
                <label for="name" class="col-md-4 control-label">Exam Fee</label>
                <div class="col-md-6">
                    <input class="form-control" name="exam_fee" type="number" id="name">
                      
                </div>
            </div>
           <div class="form-group ">
                <label for="name" class="col-md-4 control-label">Other Fee</label>
                <div class="col-md-6">
                    <input class="form-control" name="other_fee" type="number" id="name">
                      
                </div>
            </div>
           <div class="form-group ">
                <label for="name" class="col-md-4 control-label">Fine</label>
                <div class="col-md-6">
                    <input class="form-control" name="fine" type="number" id="name">
                      
                </div>
            </div>
           <div class="form-group ">
                <label for="name" class="col-md-4 control-label">Remarks</label>
                <div class="col-md-6">
                    <textarea class="form-control" name="remark" type="text" id="name"></textarea> 
                      
                </div>
            </div>
           <div class="form-group ">
                <label for="name" class="col-md-4 control-label">Reference</label>
                <div class="col-md-6">
                    <input class="form-control" name="  reference_number" type="number" id="name">
                      
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-offset-4 col-md-8">
                    <input class="btn btn-primary btnfee_structurecreate btnper" type="submit" value="Create">
                </div>
            </div>

            <?php

        }
        else
        {
            echo '';
        }

    }

    /*

    public function get_attendence_status()
    {
        
            ?>
            <option>abc</option>
            <?php
    }

    */



    public function get_attendence_form()
    {

        if ($this->input->post()) 
        {
            ?>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>Roll Number</th>
                    <th>Name</th>
                    <th>Status</th>
                </thead>
                <tbody>


            <?php
            $students = $this->db->get_where('student',array('class_id'=>$this->input->post('class_id')))->result_array();
            foreach ($students as $row):
            ?>
            <tr>
                <td><?php echo $row['roll'] ?></td>
                <td><?php echo $row['name_bangla'] ?></td>
                <td>
                    <input type="number" hidden="hidden" name="student_id[]" value="<?php echo $row['student_id'] ?>">

                    <select class="form-control" name="status[]" id="student_id-create" required="required">
                        <option value="2">Absent</option>
                        <option value="1" selected="">Present</option>
                    </select>

                </td>
            </tr>

                <?php
                endforeach;
                ?>
            </tbody>
        </table>


        <div class="form-group">
            <div class="col-md-offset-4 col-md-8">
                <input class="btn btn-primary btnusercreate btnper" type="submit" value="Create" onclick="return confirm('Are you Sure?')">
            </div>
        </div>

            <?php

        }

    }




    public function get_staff_attendence_form()
    {

        if ($this->input->post()) 
        {
            ?>

                <div class="form-group">
                    <div class="col-md-offset-4 col-md-8">
                        <input class="btn btn-success" type="submit" value="Attend Now">
                    </div>
                </div>

            <?php

        }

    }


    public function get_exam_form()
    {

        if ($this->input->post()) 
        {
            ?>

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
            $subjects = $this->db->get_where('subject',array('class_id'=>$this->input->post('class_id')))->result_array();
            foreach ($subjects as $row):
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td>
                    <input  type="number" hidden="hidden" name="subject_id[]" value="<?php echo $row['subject_id'] ?>">
                    <input class="form-control"  type="date"  name="exam_date[]"  required="required">

                </td>
                <td>
                    <input class="form-control"  type="text"  name="exam_duration[]">

                </td>
                <td>
                    <input class="form-control"  type="number"  name="total_mark[]"  required="required">

                </td>
                <td>
                    <input class="form-control"  type="number" name="pass_mark[]" required="required">

                </td>
            </tr>

                <?php
                endforeach;
                ?>
            </tbody>
        </table>


        <div class="form-group">
            <div class="col-md-offset-4 col-md-8">
                <input class="btn btn-primary btnusercreate btnper" type="submit" value="Create">
            </div>
        </div>

            <?php

        }
    }




    public function get_mark_submit_form()
    {

        if ($this->input->post()) 
        {
            ?>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>Roll Number</th>
                    <th>Student Name</th>
                    <th>Obtained Mark</th>
                    <th>Remark</th>
                </thead>
                <tbody>


                    <input  type="number" hidden="hidden" name="class_id" value="<?php echo $this->input->post('class_id') ?>">
                    <input  type="number" hidden="hidden" name="exam_id" value="<?php echo $this->input->post('exam_id') ?>">


            <?php
            $students = $this->db->get_where('student',array('class_id'=>$this->input->post('class_id'),'session_id'=> $this->setting->current_session_id() ))->result_array();
            foreach ($students as $row):
            ?>
            <tr>
                <td><?php echo $row['roll'] ?></td>
                <td><?php echo $row['name_bangla'] ?></td>
                <td>
                    <input  type="number" hidden="hidden" name="student_id[]" value="<?php echo $row['student_id'] ?>">

                    <input class="form-control"  type="number"  name="mark_obtained[]" max="<?php echo $this->mark_model->get_exam_full_mark_by_subject_id_exam_id($this->input->post('subject_id'), $this->input->post('exam_id')); ?>">

                </td>
                <td>
                    <textarea class="form-control"  type="text"  name="comment[]"></textarea>

                </td>
            </tr>

                <?php
                endforeach;
                ?>
            </tbody>
        </table>


        <div class="form-group">
            <div class="col-md-offset-4 col-md-8">
                <input class="btn btn-primary btnusercreate btnper" type="submit" value="Create">
            </div>
        </div>

            <?php

        }

    }




    public function get_mark_edit_form()
    {

        if ($this->input->post()) 
        {
            ?>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>Roll Number</th>
                    <th>Student Name</th>
                    <th>Obtained Mark</th>
                    <th>Remark</th>
                </thead>
                <tbody>


                    <input  type="number" hidden="hidden" name="class_id" value="<?php echo $this->input->post('class_id') ?>">
                    <input  type="number" hidden="hidden" name="exam_id" value="<?php echo $this->input->post('exam_id') ?>">


            <?php



            $session_id     =   $this->setting->current_session_id();
            $this->db->select('*');
            $this->db->from('mark');
            $this->db->join('student','student.student_id=mark.student_id');
            $this->db->where('mark.session_id',$session_id);
            $this->db->where('mark.class_id',$this->input->post('class_id'));
            $this->db->where('mark.exam_id',$this->input->post('exam_id'));
            $this->db->where('mark.subject_id',$this->input->post('subject_id'));
            $marks = $this->db->get()->result_array();

            foreach ($marks as $row):
            ?>
            <tr>
                <td><?php echo $row['roll'] ?></td>
                <td><?php echo $row['name_bangla'];?></td>
                <td>
                    <input  type="number" hidden="hidden" name="mark_id[]" value="<?php echo $row['mark_id'] ?>">


                    <input class="form-control"  type="number"  name="mark_obtained[]" min="0" max="<?php echo  $row['mark_total']; ?>" value="<?php echo  $row['mark_obtained']; ?>">

                </td>
                <td>
                    <textarea class="form-control"  type="text"  name="comment[]"><?php echo  $row['comment']; ?></textarea>

                </td>
            </tr>

                <?php
                endforeach;
                ?>
            </tbody>
        </table>


        <div class="form-group">
            <div class="col-md-offset-4 col-md-8">
                <input class="btn btn-primary btnusercreate btnper" type="submit" value="Upgrade">
            </div>
        </div>

            <?php

        }

    }


}


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

                        <div class="container-fluid container-fullw bg-white">
                            <div class="container">
                                <div class="col-md-12 align-middle">                                   
                                    <div class="row margin-top-30">
                                        <div class="col-md-12">
                                            <div class="panel panel-white " style="box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title"><?php echo $page_name; ?></h5>
                                                </div>
                                                <div class="panel-body">

                                                    <?php foreach ($payments as $payment) {
                                                        ?>

                                                    <div id="print_area">
                                                        <div style="float: left; width: 45%; border: 1px solid #4c5d45;padding: 1% 2% 1% 2%;">
                                                            
                                                            <div>
                                                                <div style="float:left;">
                                                                    <img style="max-height: 60px;max-width: 60px;" alt="" src="#">
                                                                </div>
                                                                <div style="">
                                                                    <p style="text-align: center"><strong><?php echo 'sfjkhdf';?></strong></p>
                                                                    <p style="line-height: 3px;font-size: 14px;text-align: center"><?php echo 'sdfds';?></p>
                                                                </div>
                                                            </div>
                                                            <div style="clear: left;"></div>
                                                            
                                                            <p style="text-align: center;line-height: 3px;font-size: 18px;">Money Receipt</p>
                                                            <p style="text-align: center;line-height: 5%;">Student Copy</p>
                                                            
                                                            <div style="float: left;">
                                                                <p style="line-height: 5%;">Receipt No.</p>
                                                                <p style="line-height: 5%;">Ref.</p>
                                                                <p style="line-height: 5%;">Payment Date</p>
                                                                <p style="line-height: 5%;">Month</p>
                                                            </div>
                                                            
                                                            <div style="float: right;">
                                                                <p style="line-height: 5%; font-size: 14px;"><?php echo "Student Name : ".$payment['student_name'];?></p>
                                                                <p style="line-height: 5%; font-size: 14px;"><?php echo "Class : ".$payment['class_name'];?></p>
                                                                <p style="line-height: 5%; font-size: 14px;"><?php echo "Roll Number".$payment['roll'];?></p>
                                                            </div>
                                                            <div style="clear: both;"></div>
                                                            
                                                            <div>
                                                                <table style="width: 100%; margin-left: auto; margin-right: auto;">
                                                                    <tr >
                                                                        <td style="border: 2px solid #4c5d45;"><strong>Description </strong></td>
                                                                        <td style="border: 2px solid #4c5d45;"><strong>Taka </strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>ADDMISSION_FEE_FORM</td>
                                                                        <td><?php echo $payment['addmission_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>TUTION_FEE_FORM</td>
                                                                        <td><?php echo $payment['tution_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>SERVICE_FEE_FORM</td>
                                                                        <td><?php echo $payment['service_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>BREAKFAST_FEE_FORM</td>
                                                                        <td><?php echo $payment['breakfast_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Meal Fee</td>
                                                                        <td><?php echo $payment['meal_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Habitation Fee</td>
                                                                        <td><?php echo $payment['habitation_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Exam Fee</td>
                                                                        <td><?php echo $payment['exam_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Other Fee</td>
                                                                        <td><?php echo $payment['other_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Fine</td>
                                                                        <td><?php echo $payment['fine'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Remark</td>
                                                                        <td><?php echo $payment['remark'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Calculator</td>
                                                                        <td  style="border: 1px solid #4c5d45;"><?php echo $payment['paid_amount'];?></td>
                                                                    </tr>                               
                                                                </table>
                                                                
                                                            </div>
                                                                
                                                            
                                                            <div>
                                                                <div style="float: left">
                                                                    <p>Authority Signature</br>..............................</p>
                                                                
                                                                </div>
                                                                <div style="float: right">
                                                                    <p>Student Signature</br>..............................</p>
                                                                
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                        
                                                        <div style="float: right; width: 45%; border: 1px solid #4c5d45;padding: 1% 2% 1% 2%;">
                                                            <div>
                                                                <div style="float:left;">
                                                                    <img style="max-height: 60px;max-width: 60px;" alt="" src="#">
                                                                </div>
                                                                <div style="">
                                                                    <p style="text-align: center"><strong>dfgdfg</strong></p>
                                                                    <p style="line-height: 3px;font-size: 14px;text-align: center">dfgdfg</p>
                                                                </div>
                                                            </div>
                                                            <div style="clear: left;"></div>
                                                            
                                                            <p style="text-align: center;line-height: 3px;font-size: 18px;">Money Receipt</p>
                                                            <p style="text-align: center;line-height: 5%;">Official Copy</p>
                                                            
                                                            <div style="float: left;">
                                                                <p style="line-height: 5%;"><?php echo RECEIPT_NO_FORM."&ensp;:&ensp;".$payment['payment_id'];?></p>
                                                                <p style="line-height: 5%;"><?php echo REFERENCE_FORM."&ensp;:&ensp;".$payment['reference_number'];?></p>
                                                                <p style="line-height: 5%;"><?php echo PAID_DATE_FORM."&ensp;:&ensp;".$payment['paid_date'];?></p>
                                                                <p style="line-height: 5%;"><?php echo PAYMENT_MONTH_FORM."&ensp;:&ensp;".$payment['payment_month'];?></p>
                                                            </div>
                                                            
                                                            <div style="float: right;">
                                                                <p style="line-height: 5%; font-size: 14px;"><?php echo NAME_FORM."&ensp;:&ensp;".$payment['student_name'];?></p>
                                                                <p style="line-height: 5%; font-size: 14px;"><?php echo CLASS_MENU."&ensp;:&ensp;".$payment['class_name'];?></p>
                                                                <p style="line-height: 5%; font-size: 14px;"><?php echo ROLL_NUMBER_FORM."&ensp;:&ensp;".$payment['roll'];?></p>
                                                            </div>
                                                            <div style="clear: both;"></div>
                                                            
                                                            <div>
                                                                <table style="width: 100%; margin-left: auto; margin-right: auto;">
                                                                    <tr >
                                                                        <td style="border: 2px solid #4c5d45;"><strong><?php echo DESCRIPTION_FORM;?> </strong></td>
                                                                        <td style="border: 2px solid #4c5d45;"><strong><?php echo TAKA_FORM;?> </strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo ADDMISSION_FEE_FORM;?></td>
                                                                        <td><?php echo $payment['addmission_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo TUTION_FEE_FORM;?></td>
                                                                        <td><?php echo $payment['tution_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo SERVICE_FEE_FORM;?></td>
                                                                        <td><?php echo $payment['service_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo BREAKFAST_FEE_FORM;?></td>
                                                                        <td><?php echo $payment['breakfast_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo MEAL_FEE_FORM;?></td>
                                                                        <td><?php echo $payment['meal_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo HABITATION_FEE_FORM;?></td>
                                                                        <td><?php echo $payment['habitation_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo EXAM_FEE_FORM;?></td>
                                                                        <td><?php echo $payment['exam_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo OTHER_FEE_FORM;?></td>
                                                                        <td><?php echo $payment['other_fee'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo FINE_FORM;?></td>
                                                                        <td><?php echo $payment['fine'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo COMMENT_FORM;?></td>
                                                                        <td><?php echo $payment['remark'];?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><?php echo CALCULATOR_FORM;?></td>
                                                                        <td  style="border: 1px solid #4c5d45;"><?php echo $payment['paid_amount'];?></td>
                                                                    </tr>                               
                                                                </table>
                                                                
                                                            </div>
                                                                
                                                            
                                                            <div>
                                                                <div style="float: left">
                                                                    <p>Authority Signature</br>..............................</p>
                                                                
                                                                </div>
                                                                <div style="float: right">
                                                                    <p>Student Signature</br>..............................</p>
                                                                
                                                                </div>
                                                            </div>
                                                            
                                                        
                                                        </div>
                                                
                                                </div>

                                            <?php } ?>
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

    <?php  $this->load->view('admin/inc/footer.php');?>


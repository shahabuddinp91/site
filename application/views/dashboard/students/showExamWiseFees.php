<style >
    .extraTR{
        margin-bottom: 10px;
    }
</style>
<?php
foreach ($stdAcademicInfo as $single):

endforeach;
?>

<section class="stdacademicinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="stdinfoaca">
                    <div class="container">
                        <div class="row">
                            <p class="samereporttitle">General Information</p>
                        </div>
                        <div class="row">
                            <div class="generalinfo">
                                <div class="col-md-4">
                                    <table class="table aca_table">
                                        <tr>
                                            <td>Student's ID</td>
                                            <td>:</td>
                                            <td><?php echo $single->student_id; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Student's Name</td>
                                            <td>:</td>
                                            <td><?php echo $single->student_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Roll No</td>
                                            <td>:</td>
                                            <td><?php echo $single->roll_no; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table aca_table">
                                        <tr>
                                            <td>Class</td>
                                            <td>:</td>
                                            <td name="clsname"><?php echo $single->class_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Section</td>
                                            <td>:</td>
                                            <td><?php echo $single->section_name; ?></td>
                                        </tr>
                                    </table>                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="examwiseresult">
                                <p class="samereporttitle">Exam Wise Financial Report</p>
                                <?php echo form_open('Frontpage/stdexamwiseFinance', array('class' => '')); ?>
                                <table class="" >
                                    <tr>
                                        <td>Select Exam</td>
                                        <td>:</td>
                                        <td>
                                            <select class="form-control" name="examlist">
                                                <option value="">Select One</option>
                                                <?php
                                                foreach ($allexamlist as $singleexam):
                                                    ?>
                                                    <option value="<?php echo $singleexam->exam_id; ?>"><?php echo $singleexam->exam_name; ?></option>
                                                    <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="submit" name="submit" value="Submit" class="btn btn-success subbtn">
                                        </td>
                                    </tr>
                                </table>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="subjectResult col-md-6">
                                <?php if ($allFinance) { ?>
                                    <table class="table subtbl">
                                        <tr>
                                            <th>Fees Name</th>
                                            <th>Amount</th>

                                        </tr>
                                        <?php
                                        foreach ($allFinance as $singleSub):
                                            ?>
                                            <tr>
                                                <td><?php echo $singleSub->fees_name; ?></td>
                                                <td><?php echo $singleSub->amount; ?></td>
                                            </tr>

                                            <?php
                                        endforeach;
                                    }else {
                                        echo '<h4 class="notFound">Data Not Found!';
                                    }
                                    ?>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <p class="" style="width: 280px; text-align: center; background: #ddd; color: #003bb3; font-size: 18px; ">Payment Status</p>
                                <?php 
//                                                                    print_r($paymentStatus); die();
                                                                    foreach ($paymentStatus as $single):
                                                                        
                                                                    endforeach;
                                ?>
                                <?php if($paymentStatus){?>
                                <table class="">
                                    <tr class="extraTR" style="margin: 5px;">
                                        <td width="30%">Total Amount</td>
                                        <td width="10%">:</td>
                                        <td width="40%"><?php echo $single->totalAmount; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Paid Amount</td>
                                        <td width="10%">:</td>
                                        <td width="40%"><?php echo $single->paidAmount; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Due Amount</td>
                                        <td width="10%">:</td>
                                        <td width="40%"><?php echo $single->dueAmount; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Payment Status</td>
                                        <td width="10%">:</td>
                                        <td width="40%"><?php echo $single->status; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Payment Date</td>
                                        <td width="10%">:</td>
                                        <td width="40%"><?php echo $single->created; ?></td>
                                    </tr>
                                </table>
                                <?php }else
                                {
                                    echo '<h4 class="notFound">Data not found!</h4>';
                                }
                                    ?>
                            </div>

                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// echo $getClassID.', ' .$rollNo.', ' .$examid;
//echo '<pre>';
//print_r($stdAcademicInfo);
//echo '</pre>';
?>
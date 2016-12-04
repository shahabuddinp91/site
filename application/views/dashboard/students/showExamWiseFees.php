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
    <!--                                            <th>Total Amount</th>
                                            <th>Paid Amount</th>-->

                                        </tr>
                                        <?php
                                        foreach ($allFinance as $singleSub):
                                            ?>
                                            <tr>
                                                <td><?php echo $singleSub->fees_name; ?></td>
                                                <td><?php echo $singleSub->amount; ?></td>
        <!--                                                <td><?php echo $singleSub->totalAmount; ?></td>
                                                <td><?php echo $singleSub->paidamount; ?></td>-->

                                            </tr>

                                            <?php
                                        endforeach;
                                    }else {
                                        echo '<h4>Data Not Found!';
                                    }
                                    ?>
<!--                                    <tr> 
                                        <td>Total Amount</td>
                                        <td><?php echo $singleSub->totalAmount; ?></td>
                                        <td>Paid Amount</td>
                                        <td><?php echo $singleSub->paidamount; ?></td>
                                    </tr>-->
                                </table>
                            </div>
                            <div class="subjectResult col-md-6">
                                <?php if ($allFinance) { ?>
                                    <table class="table subtbl">
                                        <tr>
                                            <th>Fees Date</th>
                                            <th>Total Amount</th>
                                            <th>Paid Amount</th>

                                        </tr>
                                        <?php
                                        foreach ($allFinance as $singleSub):
                                            ?>
                                            <tr>
                                                <td><?php echo $singleSub->month; ?></td>
                                                <td><?php echo $singleSub->totalAmount; ?></td>
                                                <td><?php echo $singleSub->paidamount; ?></td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    }else {
                                        echo '<h4>Data Not Found!';
                                    }
                                    ?>
<!--                                    <tr> 
                                        <td>Total Amount</td>
                                        <td><?php echo $singleSub->totalAmount; ?></td>
                                        <td>Paid Amount</td>
                                        <td><?php echo $singleSub->paidamount; ?></td>
                                    </tr>-->
                                </table>
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
echo '<pre>';
print_r($stdAcademicInfo);
echo '</pre>';
?>
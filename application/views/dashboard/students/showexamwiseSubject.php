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
                                <p class="samereporttitle">Exam Wise Grading Report</p>
                                <?php echo form_open('Frontpage/stdexamwisesubject', array('class' => '')); ?>
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
                                            <input type="submit" name="submit" value="Submit" class="btn btn-primary subbtn">
                                        </td>
                                    </tr>
                                </table>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="subjectResult">
                                <?php if ($allmarks) { ?>
                                    <table class="table subtbl" >
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Marks</th>
                                            <th>Grade</th>
                                            <th>Point</th>

                                        </tr>
                                        <?php
                                        foreach ($allmarks as $singleSub):
                                            ?>
                                            <tr>
                                                <td><?php echo $singleSub->subject_name; ?></td>
                                                <td><?php echo $singleSub->marks; ?></td>
                                                <td><?php echo $singleSub->letter_grade; ?></td>

                                                <td><?php echo $singleSub->grade_point; ?></td>

                                            </tr>
                                            <?php
                                        endforeach;
                                    }else {
                                        echo '<h4>Data Not Found!';
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section>
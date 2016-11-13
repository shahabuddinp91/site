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
                            <p class="samereporttitle">Exam Wise Grading Report</p>
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
                                            <td><?php echo $single->class_name; ?></td>
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
                            <div class="firstterminal">
                                <p class="samereporttitle">First Terminal Exam Information</p>
                                <div class="col-md-6">
                                    <table class="table first_termi_table">
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Marks</th>
                                            <th>Grade</th>
                                            <th>Point</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo $single->subject_name; ?></td>
                                            <td><?php echo $single->marks; ?></td>
                                            <td><?php echo $single->letter_grade; ?></td>
                                            <td><?php echo $single->grade_point; ?></td>
                                        </tr>
                                    </table>   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="secondterminal">
                                <p class="samereporttitle">Second Terminal Exam Information</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="thirdterminal">
                                <p class="samereporttitle">Third Terminal Exam Information</p>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section>
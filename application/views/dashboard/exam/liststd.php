<section class="examsectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="exam">
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-danger text-center">Manage Marks Sutdents</div>
                    <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
                    <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
                    <p class="msg"><?php echo validation_errors(); ?></p>
                    <form method="post" action="../Dashboard/manageMarksstd">
                        <div class="col-sm-2">
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#classname").change(function () {
                                        var classval = $(this).val();
                                        //                                alert(classval);
                                        $.get("ajax_sectionidexam/" + classval, function (sec) {
                                            $('.sectionfld').html(sec);
                                            $('#hiddensection').val(sec);
                                            //                                        $('.subjectfld').html(r);
                                            //                                        alert(r);
                                        });
                                        $.get("ajax_subjectidexam/" + classval, function (sub) {
                                            $('.subjectfld').html(sub);
                                            $('#hiddensubject').val(sub);
                                            //                                       alert(sub);
                                        });
                                    });
                                });
                            </script>
                            <div class="classfld">

                                <span class="text-center">Class</span>
                                <?php //echo form_dropdown('classname', $allclass, set_value('classname'), array('class' => 'form-control classname')); ?>
                                <select name="classname" id="classname" class="form-control">
                                    <option value="">Select One</option>
                                    <?php foreach ($allclass as $allclassrec) { ?>
                                    <option value="<?php echo $allclassrec->class_id; ?>"><?php echo $allclassrec->class_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="sectionfld">
                                <span class="text-center">Section</span><br>
                                <select name="sectionid" id="sectionid" class="form-control">
                                    <option >Select One</option>
                                </select>
                            </div>
                            <input type="hidden" name="hiddensection" id="hiddensection"/>
                        </div>
                        <div class="col-sm-2">
                            <div class="subjectfld">
                                <span class="text-center">Subject</span><br>
                                <select name="subjectid" id="subjectid" class="form-control">
                                    <option>Select One</option>
                                </select>
                            </div>
                            <input type="hidden" name="hiddensubject" id="hiddensubject"/>
                        </div>
                        <div class="col-sm-2">
                            <div class="managemarks">
                                <input type="submit" class="btn btn-success managebtn" value="Manage Marks">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="classwisestd" id="classwisestd">
                <hr><hr>
                <?php // echo "<pre/>"; ?>
                <?php
                // print_r($allstd); 
                //echo "Class id: ".$cid; 
                ?>
                <?php //echo form_open('', array('class' => 'form-horizontal'));  ?>
                <form method="post" action="../Dashboard/marksaddProcess" class="form-horizontal">
                    <div class="col-sm-2">
                        <div class="examfld">
                            <span class="text-center">Exam</span>
                            <?php //echo form_dropdown('examname', $allexamlist, set_value('examname'), array('class' => 'form-control examname')); ?>
                            <select name="examid" id="examid" class="form-control">
                                <option value="">Select One</option>
                                <?php foreach ($allexamlist as $examsingle) { ?>
                                <option value="<?php echo $examsingle->exam_id; ?>"><?php echo $examsingle->exam_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <tr class="right">
                        <div class="addmarks">
                            <input type="submit" class="btn btn-primary" id="addmarks" value="Add Marks" tabindex="2">
                        </div>
                        </tr>
                        <?php if($allstd){?>
                        <tr>
                            <th>Sl No</th>
                            <th>Name</th>
                            <th>Roll No</th>
                            <th>Marks</th>
                            <th>LG</th>
                            <th>GP</th>
                            <!--<th>Action</th>-->
                        </tr>
                        <?php
                        $sl = 0;
                        foreach ($allstd as $single):
                        $sl++;
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><input type="text" name="stdname[]" class="stdinfo form-control" id="stdname" value="<?php echo $single->student_name; ?>" readonly="1"></td>
                            <td><input type="text" name="stdrollno[]" class="stdrollinfo form-control" id="stdrollno" value="<?php echo $single->roll_no; ?>" readonly=""></td>
                        <input type="hidden" class="hidestdid" name="hidestdid[]" id="hidestdid" value="<?php echo $single->student_id; ?>">
                        <input type="hidden" class="hideclsid" name="hideclsid[]" id="hideclsid" value="<?php echo $single->class_id; ?>">
                        <input type="hidden" class="hidesecid" name="hidesecid[]" id="hidesecid" value="<?php echo $single->section_id; ?>">
                        <input type="hidden" class="hidesubid" name="hidesubid[]" id="hidesubid" value="<?php echo $single->subject_id; ?>">

                        <td>
                            <input type="text" name="marks[]" class="form-control samemark" id="marks" tabindex="1">
                        </td>
                        <td>
                            <input type="text" name="lg[]" class="form-control samemark lg" id="lg" readonly="1">
                        </td>
                        <td>
                            <input type="text" name="gp[]" class="form-control samemark gp" id="gp" readonly="1">
                        </td>

                        </tr>
                        <?php
                        endforeach;
                        }
                        ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
//    its for result processing
    var total;
    var subject;
    var fail = false;
    $("#classwisestd, table").on("blur", "#marks", function () {
        fail = false;
        var mark = $(this).val();
        if (mark > 100 || mark < 0)
        {
            alert("Number Not Supported!");
            return;
        }
        var lettergrade = calculationlg(mark);
        var gradepoint = calculationgp(lettergrade);
        //alert(letterGrade);
        $(this).parent().parent().find(".lg").val(lettergrade);
        $(this).parent().parent().find(".gp").val(gradepoint);


    });

    function calculationlg(marks) {
        if (marks >= 80) {
            return "A+";
        } else if (marks >= 70) {
            return "A";
        } else if (marks >= 60) {
            return "A-";
        } else if (marks >= 50) {
            return "B";
        } else if (marks >= 40) {
            return "C";
        } else if (marks >= 33) {
            return "D";
        } else {
            return "F";
        }
    }
    function calculationgp(lgrade) {
        if (lgrade == "A+")
            return 5.00;
        if (lgrade == "A")
            return 4.00;
        if (lgrade == "A-")
            return 3.50;
        if (lgrade == "B")
            return 3.00;
        if (lgrade == "C")
            return 2.50;
        if (lgrade == "D")
            return 2.00;
        if (lgrade == "F")
            return 0.00;
    }

</script>

